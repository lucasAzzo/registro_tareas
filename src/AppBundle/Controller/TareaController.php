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
use AppBundle\Entity\Tarea;
use AppBundle\Form\TareaType;

/**
 * Description of TareaController
 *
 * @author Lucas
 */
class TareaController extends Controller {
    
    /**
     * @Route("/tareas", name="tarea_index")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("GET")
     */
    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        
        $usr= $this->get('security.token_storage')->getToken()->getUser();
        
        $tareas = $em->getRepository(Tarea::class)->findBy(['idUsuario' => $usr],['fecha' => 'DESC', 'horaInicio' => 'DESC']);
        
        return $this->render('tarea/index.html.twig', [
                    'tareas' => $tareas,
        ]);
    }
    
    /**
     * @Route("/tareas/new", name="tarea_new")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("GET")
     */
    public function newAction(Request $request) {
        $tarea = new Tarea();

        $formulario = $this->createForm(
                TareaType::class, $tarea, array('action' => $this->generateUrl('tarea_create'), 'method' => 'POST')
        );

        return $this->render('tarea/new_edit.html.twig', [
                    'formulario' => $formulario->createView(),
        ]);
    }

    /**
     * @Route("/tareas/create", name="tarea_create")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("POST")
     */
    public function createAction(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $tarea = new Tarea();
        $formulario = $this->createForm(
                TareaType::class, $tarea, array('action' => $this->generateUrl('tarea_create'),
            'method' => 'POST')
        );
        
        $formulario->handleRequest($request);
        
        if ($formulario->isSubmitted() && $formulario->isValid()) {

            $tarea->setIdUsuario($this->get('security.token_storage')->getToken()->getUser());
            
            $hora_invertida = new \DateTime('2018-05-05 '.$tarea->getHoraFin()->diff($tarea->getHoraInicio())->format('%H:%I:%S'));
            $tarea->setHoraInvertida($hora_invertida);
            
            $em->persist($tarea);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', 'Se ha creado la tarea : "' . $tarea->getTarea() . '" satisfactoriamente.');
            return $this->redirectToRoute('tarea_index');
        }

        return $this->render('tarea/new_edit.html.twig', [
                    'formulario' => $formulario->createView(),
        ]);
    }

    /**
     * @Route("/tareas/edit/{_id_tarea}", name="tarea_edit")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("GET")
     */
    public function editAction(Request $request, $_id_tarea) {
        $em = $this->getDoctrine()->getManager();

        $tarea = $em->getRepository(Tarea::class)->find($_id_tarea);

        $formulario = $this->createForm(
                TareaType::class, $tarea, array('action' => $this->generateUrl('tarea_update', array('_id_tarea' => $_id_tarea)),
            'method' => 'PUT')
        );

        return $this->render('tarea/new_edit.html.twig', [
                    'formulario' => $formulario->createView(),
        ]);
    }

    /**
     * @Route("/tareas/update/{_id_tarea}", name="tarea_update")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("PUT")
     */
    public function updateAction(Request $request, $_id_tarea) {
        $em = $this->getDoctrine()->getManager();
        $tarea = $em->getRepository(Tarea::class)->find($_id_tarea);

        $formulario = $this->createForm(
                TareaType::class, $tarea, array('action' => $this->generateUrl('tarea_update', array('_id_tarea' => $_id_tarea)),
            'method' => 'PUT'));
        $formulario->handleRequest($request);

        if ($formulario->isSubmitted() && $formulario->isValid()) {

            $tarea->setIdUsuario($this->get('security.token_storage')->getToken()->getUser());
            
            $hora_invertida = new \DateTime('2018-05-05 '.$tarea->getHoraFin()->diff($tarea->getHoraInicio())->format('%H:%I:%S'));
            $tarea->setHoraInvertida($hora_invertida);
            
            $em->persist($tarea);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', 'Se ha editado la tarea : "' . $tarea->getTarea() . '" satisfactoriamente.');
            return $this->redirectToRoute('tarea_index');
        }

        return $this->render('tarea/new_edit.html.twig', [
                    'formulario' => $formulario->createView(),
        ]);
    }

    /**
     * @Route("/tareas/delete/{_id_tarea}", name="tarea_delete")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction(Request $request, $_id_tarea) {
        
        $em = $this->getDoctrine()->getManager();
        $tarea = $em->getRepository(Tarea::class)->find($_id_tarea);
        
        $em->remove($tarea);
        $em->flush();
        
        $request->getSession()->getFlashBag()->add('success', 'Se ha eliminado la tarea : "' . $tarea->getTarea() . '" satisfactoriamente.');
        return $this->redirectToRoute('tarea_index');
    }
    
    
    
}
