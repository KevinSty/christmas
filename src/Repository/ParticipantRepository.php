<?php

/**
 * Created by PhpStorm.
 * User: kevin.diaz
 * Date: 06/12/17
 * Time: 09:22
 */
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ParticipantRepository extends EntityRepository{
    public function findEnabled(){
        $this->createQueryBuilder("participant")
            ->where("participant.enable = enable")
            ->leftJoin("participant.target", "target")
            ->setParameter("enable => true")
            ->getQuery()
            ->getResult();
    }
}