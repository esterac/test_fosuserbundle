<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller{
    /**
     * Matches /lucky/number exactly
     *
     * @Route("/lucky/number", name="number")
     */
    public function numberUsers()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
           'SELECT COUNT (u.id)
            FROM AppBundle:User u
            WHERE u.enabled = 1');

        $users = $query->getSingleScalarResult();

        return new Response('El número de usuarios es: '.$users);
    }
}
