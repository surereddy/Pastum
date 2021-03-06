<?php

/*
 * This file is part of the Pastum package.
 *
 * (c) Michael H. Arieli <excelwebzone@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pastum\Component\PAMI\Message\Event\Factory;

use Pastum\Component\PAMI\Message\Event\UnknownEvent;
use Pastum\Component\PAMI\Message\Message;

/**
 * This factory knows which event to return according to a given raw message
 * from ami.
 */
class EventFactory
{
    /**
     * This is our factory method.
     *
     * @param string $message Literall message as received from ami
     *
     * @return \Pastum\Component\PAMI\Message\Event\EventMessage
     */
    public static function createFromRaw($message)
    {
        $eventStart = strpos($message, 'Event: ') + 7;

/*
        if ($eventStart > strlen($message)) {
            return new UnknownEvent($message);
        }
*/

        $eventEnd = strpos($message, Message::EOL, $eventStart);
        if ($eventEnd === false) {
            $eventEnd = strlen($message);
        }

        $name = substr($message, $eventStart, $eventEnd - $eventStart);
        $className = '\\Pastum\\Component\\PAMI\\Message\\Event\\'.$name.'Event';

        if (class_exists($className, true)) {
            return new $className($message);
        }

        return new UnknownEvent($message);
    }
}
