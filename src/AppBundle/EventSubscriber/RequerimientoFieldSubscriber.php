<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of RequerimientoFieldSubscriber
 *
 * @author Lucas
 */
class RequerimientoFieldSubscriber implements EventSubscriberInterface {
    

    public static function getSubscribedEvents() {
        return array(
            FormEvents::PRE_SET_DATA => 'onPreSetData',
            FormEvents::SUBMIT => 'onSubmit',
        );
    }

    public function onPreSetData(FormEvent $event) {
        $event->getForm()->add('idArea', EntityType::class, array(
            'placeholder' => 'Seleccione una opción',
            'class' => 'AppBundle:Area',
            'attr' => array('class' => 'browser-default'),  
            'choice_label' => 'area',
            'label' => 'Área'));
    }

    
    public function onSubmit(FormEvent $event) {

        $requerimiento = $event->getForm()->get('idRequerimiento')->getData();
        
        if (!empty($requerimiento)) {
            
            $event->getForm()->add('idArea', EntityType::class, array(
                'class' => 'AppBundle:Area',
                'choice_label' => 'area',
                'attr' => array('class' => 'browser-default'), 
                'query_builder' => function (EntityRepository $er) use ($requerimiento) {
                    return $er->createQueryBuilder('c')
                                    ->where('c.idArea = ?1')
                                    ->setParameter(1, $requerimiento->getIdArea()->getIdArea());
                },
                'label' => 'Área'));
        }
    }

}
