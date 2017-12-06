<?php

/**
 * Created by PhpStorm.
 * User: kevin.diaz
 * Date: 06/12/17
 * Time: 09:13
 */
namespace App\Participant;

use Composer\EventDispatcher\Event;

class ParticipantEvent extends Event{

    private $participant;

    /**
     * ParticipantEvent constructor.
     * @param $participant
     */
    public function __construct($participant)
    {
        $this->participant = $participant;
    }

    /**
     * @return mixed
     */
    public function getParticipant()
    {
        return $this->participant;
    }

}