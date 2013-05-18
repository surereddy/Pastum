<?php

/*
 * This file is part of the Pastum package.
 *
 * (c) Michael H. Arieli <excelwebzone@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pastum\Component\PAMI\Message\Action;

/**
 * MeetmeMute action message.
 */
class MeetmeMuteAction extends ActionMessage
{
    /**
     * Constructor.
     *
     * @param string $conference Conference number
     * @param string $user       User
     */
    public function __construct($conference, $user)
    {
        parent::__construct('MeetmeMute');

        $this->setKey('Meetme', $conference);
        $this->setKey('Usernum', $user);
    }
}
