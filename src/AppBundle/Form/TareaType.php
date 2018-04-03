<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\Tarea;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\EventSubscriber\RequerimientoFieldSubscriber;

/**
 * Description of TareaType
 *
 * @author Lucas
 */
class TareaType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('fecha', DateType::class, array(
                    'widget' => 'single_text',
                    'attr' => array('class' => 'datepicker'),  
                    'label' => 'Fecha',
                ))
                ->add('tarea', TextType::class)
                ->addEventSubscriber(new RequerimientoFieldSubscriber())
                ->add('idRequerimiento', EntityType::class, array(
                    'placeholder' => 'Seleccione una opción',
                    'attr' => array('class' => 'browser-default'),  
                    'class' => 'AppBundle:Requerimiento',
                    'required' => false,
                    //'attr' => array('class' => 'browser-default'),   
                    'choice_label' => 'codigo',
                    'label' => 'Requerimiento'))
                ->add('idTipoRequerimiento', EntityType::class, array(
                    'placeholder' => 'Seleccione una opción',
                    'attr' => array('class' => 'browser-default'),  
                    'class' => 'AppBundle:TipoRequerimiento',
                    //'attr' => array('class' => 'browser-default'),   
                    'label' => 'Tipo de Requerimiento'))
                ->add('horaInicio', TimeType::class,array('widget' => 'single_text','attr' => array('class' => 'timepicker')))
                ->add('horaFin', TimeType::class,array('widget' => 'single_text','attr' => array('class' => 'timepicker')));
                //->add('horaInvertida', TimeType::class,array('attr' => array('class' => 'browser-default')));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Tarea::class,
            'attr' => array('novalidate' => ''),
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'appbundle_tarea';
    }

}
