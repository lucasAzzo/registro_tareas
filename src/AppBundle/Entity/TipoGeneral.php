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
 * Description of TipoGeneral
 *
 * @author Lucas
 * @ORM\Table(name="tipo_general")
 * @ORM\Entity
 */
class TipoGeneral {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo_general", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="tipo_general_id_tipo_general_seq", allocationSize=1, initialValue=1)
     */
    private $idTipoGeneral;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tipo_general", type="string", length=100, nullable=false)
     */
    private $tipoGeneral;
    
    public function getIdTipoGeneral() {
        return $this->idTipoGeneral;
    }

    public function getTipoGeneral() {
        return $this->tipoGeneral;
    }

    public function setIdTipoGeneral($idTipoGeneral) {
        $this->idTipoGeneral = $idTipoGeneral;
    }

    public function setTipoGeneral($tipoGeneral) {
        $this->tipoGeneral = $tipoGeneral;
    }


    
}
