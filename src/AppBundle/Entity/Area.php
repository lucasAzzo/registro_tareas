<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Description of Area
 *
 * @author Lucas
 * @ORM\Table(name="area")
 * @ORM\Entity
 */
class Area {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_area", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="area_id_area_seq", allocationSize=1, initialValue=1)
     */
    private $idArea;
    
    /**
     * @var string
     *
     * @ORM\Column(name="area", type="string", length=100, nullable=false)
     */
    private $area;
    
    public function getIdArea() {
        return $this->idArea;
    }

    public function getArea() {
        return $this->area;
    }

    public function setIdArea($idArea) {
        $this->idArea = $idArea;
    }

    public function setArea($area) {
        $this->area = $area;
    }
    
    public function __toString() {
        return $this->area;
    }


    
}
