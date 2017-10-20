<?php

// src/AppBundle/Form/BillingType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Billing;

class BillingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('number', null, array(
            	'label' => 'form.number',
            	'translation_domain' => 'FOSUserBundle'
        ));

        $builder->add('date', null, array(
            	'label' => 'form.date',
            	'translation_domain' => 'FOSUserBundle'
        ));

        $builder->add('description', null, array(
            	'label' => 'form.description',
            	'translation_domain' => 'FOSUserBundle'
        ));

        $builder->add('total', null, array(
            	'label' => 'form.total',
            	'translation_domain' => 'FOSUserBundle'
        ));

        $builder->add('save', SubmitType::class);
    }



    /**
    * {@inheritdoc}
    */
   public function configureOptions(OptionsResolver $resolver)
   {
       $resolver->setDefaults(array(
           'data_class' => 'AppBundle\Entity\Billing',//especifico donde se guardan los datos de la clase
           // 'translation_domain' => 'translation', //incluye el archivo de traducción al formulario
           'validation_groups' => array ('AppBundleBilling')
       ));
   }

   /**
    * {@inheritdoc}
    */
   public function getBlockPrefix()
   {
       return 'appbundle_billing';
   }
}

