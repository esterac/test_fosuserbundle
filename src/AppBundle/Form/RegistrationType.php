<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('name', null, array(
            'label' => 'form.name', 
            'translation_domain' => 'FOSUserBundle'
            //con esto traduzco el campo
        ));

        $builder->add('last_name', null, array(
            'label' => 'form.last_name', 
            'translation_domain' => 'FOSUserBundle'
        ));

        $builder->remove('username');



    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}