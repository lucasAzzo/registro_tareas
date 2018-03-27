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
use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\Requerimiento;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * Description of RequerimientoType
 *
 * @author Lucas
 */
class RequerimientoType extends AbstractType {
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                
                ->add('codigo', TextType::class)
                ->add('idArea', EntityType::class, array(
                    'placeholder' => 'Seleccione una opción',
                    'class' => 'AppBundle:Area',
                    'attr' => array('class' => 'browser-default'),   
                    'choice_label' => 'area',
                    'label' => 'Área'));
                
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Requerimiento::class,
            'attr' => array('novalidate' => ''),
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'appbundle_requerimiento';
    }
    
}
