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
 * Description of Requerimiento
 *
 * @author Lucas
 * @ORM\Table(name="requerimiento")
 * @ORM\Entity
 */
class Requerimiento {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_requerimiento", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="requerimiento_id_requerimiento_seq", allocationSize=1, initialValue=1)
     */
    private $idRequerimiento;
    
    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=100, nullable=false)
     */
    private $codigo;
    
    /**
     * @var \AppBundle\Entity\Area
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_area", referencedColumnName="id_area")
     * })
     */
    private $idArea;
    
    public function getIdRequerimiento() {
        return $this->idRequerimiento;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setIdRequerimiento($idRequerimiento) {
        $this->idRequerimiento = $idRequerimiento;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    
    public function getIdArea(){
        return $this->idArea;
    }

    public function setIdArea(\AppBundle\Entity\Area $idArea) {
        $this->idArea = $idArea;
    }




    
}
