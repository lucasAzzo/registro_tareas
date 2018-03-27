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
                    'widget' => 'choice',
                    'html5' => false,
                    'attr' => array('class' => 'browser-default'),  
                    'days' => range(1,31),
                    'years' => range(2018,2025),
                    'label' => 'Fecha',
                ))
                ->add('tarea', TextType::class)
                ->add('idArea', EntityType::class, array(
                    'placeholder' => 'Seleccione una opción',
                    'class' => 'AppBundle:Area',
                    'attr' => array('class' => 'browser-default'),   
                    'choice_label' => 'area',
                    'label' => 'Área'))
                ->add('idRequerimiento', EntityType::class, array(
                    'placeholder' => 'Seleccione una opción',
                    'class' => 'AppBundle:Requerimiento',
                    'attr' => array('class' => 'browser-default'),   
                    'choice_label' => 'codigo',
                    'label' => 'Requerimiento'))
                ->add('idTipoRequerimiento', EntityType::class, array(
                    'placeholder' => 'Seleccione una opción',
                    'class' => 'AppBundle:TipoRequerimiento',
                    'attr' => array('class' => 'browser-default'),   
                    'label' => 'Tipo de Requerimiento'))
                ->add('horaInicio', TimeType::class,array('attr' => array('class' => 'browser-default')))
                ->add('horaFin', TimeType::class,array('attr' => array('class' => 'browser-default')))
                ->add('horaInvertida', TimeType::class,array('attr' => array('class' => 'browser-default')));
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
