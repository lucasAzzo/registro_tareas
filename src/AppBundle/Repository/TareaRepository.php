<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Repository;

/**
 * Description of TareaRepository
 *
 * @author Lucas
 */
class TareaRepository extends \Doctrine\ORM\EntityRepository {
    
    public function findByArrayResult($id_usuario) {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select("tarea.idTarea AS id, tarea.tarea,tipo_requerimiento.detalle AS tipoRequerimiento, requerimiento.codigo AS req, area.area, tarea.fecha,"
                . "tarea.fecha, tarea.horaInicio,"
                . "tarea.horaFin, tarea.horaInvertida");
        $qb->from('AppBundle:Tarea', 'tarea');
        $qb->join('AppBundle:TipoRequerimiento', 'tipo_requerimiento', 'WITH','tarea.idTipoRequerimiento = tipo_requerimiento.idTipoRequerimiento');
        $qb->leftJoin('AppBundle:Requerimiento', 'requerimiento', 'WITH','tarea.idRequerimiento = requerimiento.idRequerimiento');
        $qb->join('AppBundle:Area', 'area', 'WITH','tarea.idArea = area.idArea');
        $qb->where($qb->expr()->eq('tarea.idUsuario', $id_usuario));
        $qb->addOrderBy("tarea.fecha", "DESC");
        return $qb->getQuery()->getArrayResult();
    }
    
}
