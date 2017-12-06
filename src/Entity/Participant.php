<?php

/**
 * Created by PhpStorm.
 * User: kevin.diaz
 * Date: 06/12/17
 * Time: 08:58
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="participants")
 */
class Participant {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * @var Participant
     * @ORM\OneToOne(targetEntity="participants")
     */
    private $target;
    /**
     * @ORM\Column(type="boolean")
     */
    private $enable;

}