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
		$peticion = $this->getRequest();

		$billing = new Billing();
		$form = $this->createForm(BillingType::class, $billing);
		//creo una clase de formulario billing; $billing me sirve para
		//para que el formulario sepa que clase almacena los datos (AppBundle/Entity/Billing)

		if ($peticion->getMethod() == 'POST') {
			$form->bind($peticion);

			if ($form->isValid()) {
				//enlazo la factura al usuario
				$billing->setUser($this->getUser());

				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($billing);//limbo de datos antes de la subida
				$em->flush(); //funcion que me vuelca los datos a la bd

				return $this->render('billing/infoBilling.html.twig', array('billing' => $billing));
				//cuando me vuelque los datos a la bd, me muestre una vista con los datos de la factura.
			}
		}

		return $this->render('Billing/billing.html.twig', array(
            'form' => $form->createView(),
            ));
	}

	public function editBillingAction(Billing $billing)
	//(Billing $billing):creo un objeto para que me cargue los datos de la id que paso
	{
		$peticion = $this->getRequest();

		$form = $this->createForm(BillingType::class, $billing);
		//creo una clase de formulario billing; $billing me sirve para
		//para que el formulario sepa que clase almacena los datos (AppBundle/Entity/Billing)

		if ($peticion->getMethod() == 'POST') {
			$form->bind($peticion);

			if ($form->isValid()) {
				//enlazo la factura al usuario
				$billing->setUser($this->getUser());

				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($billing);//limbo de datos antes de la subida
				$em->flush(); //funcion que me vuelca los datos a la bd

				return $this->render('billing/infoBilling.html.twig', array('billing' => $billing));
				//cuando me vuelque los datos a la bd, me muestre una vista con los datos de la factura.
			}
		}

		return $this->render('Billing/billing.html.twig', array(
            'form' => $form->createView(),
            ));
	}

}