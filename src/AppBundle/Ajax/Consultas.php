<?php

namespace AppBundle\Ajax;

use \Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of Consultas
 *
 * @author Lucas
 */
class Consultas extends Controller {

    /**
     * @Route("/consulta_area_requerimiento", name="consulta_area_requerimiento")
     * @Method("POST")
     */
    public function areaPorRequerimiento(Request $request) {

        $id = $request->get('id');

        $em = $this->getDoctrine()->getManager();
        $arreglo = array();
        if (empty($id)) {
            $areas = $em->getRepository('AppBundle:Area')->findAll();
            foreach ($areas as $area) {
                $arreglo[$area->getIdArea()] = $area->getArea();
            }
        } else {
            $area = $em->getRepository('AppBundle:Requerimiento')->find($id)->getIdArea();
            $arreglo[$area->getIdArea()] = $area->getArea();
        }

        return new JsonResponse($arreglo);
    }
    
    
    /**
     * @Route("/consulta_tareas_usuario", name="consulta_tareas_usuario")
     * 
     */
    public function tareasPorUsuario(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $tareas = $em->getRepository('AppBundle:Tarea')->findByArrayResult($this->get('security.token_storage')->getToken()->getUser()->getId());

        return new JsonResponse(array('data' => $tareas));
    }
    
    
    /**
     * @Route("/consulta_requerimientos", name="consulta_requerimientos")
     * 
     */
    public function requerimientos(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $requerimientos = $em->getRepository('AppBundle:Requerimiento')->findByArrayResult();

        return new JsonResponse(array('data' => $requerimientos));
    }

}
