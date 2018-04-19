<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Inscription;
use AppBundle\Entity\Obtention;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $item = $this->getDoctrine()->getRepository(Obtention::class)->find(2);
        return $this->render('AppBundle:Default:index.html.twig', array("item"=>$item));
    }

    /**
     * @Route("/resultat/{idE}", name="test")
     */
    public function testAction($idE)
    {
        $obtention = $this->getDoctrine()->getRepository(Obtention::class)->getObtention($idE);

        $inscription = $this->getDoctrine()->getRepository(Inscription::class)->getInscription($idE);

        //return new Response(var_dump($inscription));
        return $this->render("AppBundle:Default:result.html.twig", array("results"=>$obtention, "inscription"=>$inscription));
    }

    /**
     * @Route("/get/{idE}", name="get_result")
     */
    public function getAction($idE)
    {
        return new Response("/resultat/".$idE);
    }
}
