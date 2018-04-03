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

}
