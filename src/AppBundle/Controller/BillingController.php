<?php
// src/AppBundle/Controller/BillingController.php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\BillingType;
use AppBundle\Entity\Billing;

class BillingController extends Controller
{

	public function newBillingAction()
	{
		$billing = new Billing();
		$form = $this->createForm(BillingType::class, $billing);
		//creo una clase de formulario billing; $billing me sirve para
		//para que el formulario sepa que clase almacena los datos (AppBundle/Entity/Billing)

		return $this->render('Billing/billing.html.twig', array(
            'form' => $form->createView(),
            ));
	}

}