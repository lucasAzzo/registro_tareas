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
 * Description of Tarea
 *
 * @author Lucas
 * @ORM\Table(name="tarea")
 * @ORM\Entity
 */
class Tarea {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tarea", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\SequenceGenerator(sequenceName="tarea_id_tarea_general_seq", allocationSize=1, initialValue=1)
     */
    private $idTarea;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tarea", type="string", length=255, nullable=false)
     */
    private $tarea;
    
    /**
     * @var \AppBundle\Entity\TipoRequerimiento
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TipoRequerimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_requerimiento", referencedColumnName="id_tipo_requerimiento")
     * })
     */
    private $idTipoRequerimiento;
    
    /**
     * @var \AppBundle\Entity\Requerimiento
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Requerimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_requerimiento", referencedColumnName="id_requerimiento")
     * })
     */
    private $idRequerimiento;
    
    /**
     * @var \AppBundle\Entity\Area
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Area")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_area", referencedColumnName="id_area")
     * })
     */
    private $idArea;
    
    /**
     * @var string
     *
     * @ORM\Column(name="hora_inicio", type="time", nullable=false)
     */
    private $horaInicio;
    
    /**
     * @var string
     *
     * @ORM\Column(name="hora_fin", type="time", nullable=true)
     */
    private $horaFin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="hora_invertida", type="time", nullable=true)
     */
    private $horaInvertida;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;
    
    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;
    
    public function getIdTarea() {
        return $this->idTarea;
    }

    public function getTarea() {
        return $this->tarea;
    }

    public function getIdTipoRequerimiento(){
        return $this->idTipoRequerimiento;
    }

    public function getIdRequerimiento(){
        return $this->idRequerimiento;
    }

    public function getIdArea(){
        return $this->idArea;
    }

    public function getHoraInicio() {
        return $this->horaInicio;
    }

    public function getHoraFin() {
        return $this->horaFin;
    }

    public function getHoraInvertida() {
        return $this->horaInvertida;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setIdTarea($idTarea) {
        $this->idTarea = $idTarea;
    }

    public function setTarea($tarea) {
        $this->tarea = $tarea;
    }

    public function setIdTipoRequerimiento(\AppBundle\Entity\TipoRequerimiento $idTipoRequerimiento) {
        $this->idTipoRequerimiento = $idTipoRequerimiento;
    }

    public function setIdRequerimiento(\AppBundle\Entity\Requerimiento $idRequerimiento) {
        $this->idRequerimiento = $idRequerimiento;
    }

    public function setIdArea(\AppBundle\Entity\Area $idArea) {
        $this->idArea = $idArea;
    }

    public function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }

    public function setHoraFin($horaFin) {
        $this->horaFin = $horaFin;
    }

    public function setHoraInvertida($horaInvertida) {
        $this->horaInvertida = $horaInvertida;
    }

    public function setFecha(\DateTime $fecha) {
        $this->fecha = $fecha;
    }
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario(\AppBundle\Entity\User $idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    
    
    




}
