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
 * Description of TipoRequerimiento
 *
 * @author Lucas
 * @ORM\Table(name="tipo_requerimiento")
 * @ORM\Entity
 */
class TipoRequerimiento {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo_requerimiento", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="tipo_requerimiento_id_tipo_requerimiento_seq", allocationSize=1, initialValue=1)
     */
    private $idTipoRequerimiento;
    
    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=10, nullable=false)
     */
    private $codigo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="detalle", type="string", length=255, nullable=false)
     */
    private $detalle;
    
    /**
     * @var \AppBundle\Entity\TipoGeneral
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TipoGeneral")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_general", referencedColumnName="id_tipo_general")
     * })
     */
    private $idTipoGeneral;
    
    
    public function getIdTipoRequerimiento() {
        return $this->idTipoRequerimiento;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getDetalle() {
        return $this->detalle;
    }

    public function getIdTipoGeneral() {
        return $this->idTipoGeneral;
    }

    public function setIdTipoRequerimiento($idTipoRequerimiento) {
        $this->idTipoRequerimiento = $idTipoRequerimiento;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setDetalle($detalle) {
        $this->detalle = $detalle;
    }

    public function setIdTipoGeneral(\AppBundle\Entity\TipoGeneral $idTipoGeneral) {
        $this->idTipoGeneral = $idTipoGeneral;
    }
    
    public function __toString() {
        return $this->codigo . ' - ' . $this->detalle;
    }


    
}
