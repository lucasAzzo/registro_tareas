<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Requerimiento;
use AppBundle\Form\RequerimientoType;

/**
 * Description of RequerimientoController
 *
 * @author Lucas
 */
class RequerimientoController extends Controller {

    /**
     * @Route("/requerimientos", name="requerimiento_index")
     * @Method("GET")
     */
    public function indexAction(Request $request) {

        return $this->render('requerimiento/index.html.twig', [
        ]);
    }

    /**
     * @Route("/requerimientos/new", name="requerimiento_new")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("GET")
     */
    public function newAction(Request $request) {
        $requerimiento = new Requerimiento();

        $formulario = $this->createForm(
                RequerimientoType::class, $requerimiento, array('action' => $this->generateUrl('requerimiento_create'), 'method' => 'POST')
        );

        return $this->render('requerimiento/new_edit.html.twig', [
                    'formulario' => $formulario->createView(),
        ]);
    }

    /**
     * @Route("/requerimientos/create", name="requerimiento_create")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("POST")
     */
    public function createAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $requerimiento = new Requerimiento();
        $formulario = $this->createForm(
                RequerimientoType::class, $requerimiento, array('action' => $this->generateUrl('requerimiento_create'),
            'method' => 'POST')
        );

        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {

            $em->persist($requerimiento);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', 'Se ha creado el requerimiento : "' . $requerimiento->getCodigo() . '" satisfactoriamente.');
            return $this->redirectToRoute('requerimiento_index');
        }

        return $this->render('requerimiento/new_edit.html.twig', [
                    'formulario' => $formulario->createView(),
        ]);
    }

    /**
     * @Route("/requerimientos/edit/{_id_requerimiento}", name="requerimiento_edit")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("GET")
     */
    public function editAction(Request $request, $_id_requerimiento) {
        $em = $this->getDoctrine()->getManager();

        $requerimiento = $em->getRepository(Requerimiento::class)->find($_id_requerimiento);

        $formulario = $this->createForm(
                RequerimientoType::class, $requerimiento, array('action' => $this->generateUrl('requerimiento_update', array('_id_requerimiento' => $_id_requerimiento)),
            'method' => 'PUT')
        );

        return $this->render('requerimiento/new_edit.html.twig', [
                    'formulario' => $formulario->createView(),
        ]);
    }

    /**
     * @Route("/requerimientos/update/{_id_requerimiento}", name="requerimiento_update")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $_id_requerimiento) {
        $em = $this->getDoctrine()->getManager();
        $requerimiento = $em->getRepository(Requerimiento::class)->find($_id_requerimiento);

        $formulario = $this->createForm(
                RequerimientoType::class, $requerimiento, array('action' => $this->generateUrl('requerimiento_update', array('_id_requerimiento' => $_id_requerimiento)),
            'method' => 'PUT'));
        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {
            
            /* */
            $tareas_vinculadas = $em->getRepository('AppBundle:Tarea')->findBy(['idRequerimiento' => $requerimiento]);
            foreach ($tareas_vinculadas as $t) {
                $t->setIdArea($requerimiento->getIdArea());
                $em->persist($t);
            }

            $em->persist($requerimiento);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', 'Se ha editado el requerimiento : "' . $requerimiento->getCodigo() . '" satisfactoriamente.');
            return $this->redirectToRoute('requerimiento_index');
        }

        return $this->render('requerimiento/new_edit.html.twig', [
                    'formulario' => $formulario->createView(),
        ]);
    }

    /**
     * @Route("/requerimientos/delete/{_id_requerimiento}", name="requerimiento_delete")
     * @Security("has_role('ROLE_ADMIN')")

     */
    public function deleteAction(Request $request, $_id_requerimiento) {

        $em = $this->getDoctrine()->getManager();
        $requerimiento = $em->getRepository(Requerimiento::class)->find($_id_requerimiento);

        $tareas_vinculadas = $em->getRepository('AppBundle:Tarea')->findBy(['idRequerimiento' => $requerimiento]);

        if (!empty($tareas_vinculadas)) {
            $request->getSession()->getFlashBag()->add('error', 'No se puede eliminar el requerimiento : "' . $requerimiento->getCodigo() . '" ya que está vinculado a una o mas tareas.');
            return $this->redirectToRoute('requerimiento_index');
        }

        $em->remove($requerimiento);
        $em->flush();
        $request->getSession()->getFlashBag()->add('success', 'Se ha eliminado el requerimiento : "' . $requerimiento->getCodigo() . '" satisfactoriamente.');
        return $this->redirectToRoute('requerimiento_index');
    }

}
