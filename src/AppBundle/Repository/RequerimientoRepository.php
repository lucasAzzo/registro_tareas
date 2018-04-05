<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Repository;

/**
 * Description of RequerimientoRepository
 *
 * @author Lucas
 */
class RequerimientoRepository extends \Doctrine\ORM\EntityRepository {
    
    public function findByArrayResult() {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select("requerimiento.idRequerimiento as id,requerimiento.codigo, area.area");
        $qb->from('AppBundle:Requerimiento', 'requerimiento');
        $qb->join('AppBundle:Area', 'area', 'WITH','requerimiento.idArea = area.idArea');
        return $qb->getQuery()->getArrayResult();
    }
    
}
