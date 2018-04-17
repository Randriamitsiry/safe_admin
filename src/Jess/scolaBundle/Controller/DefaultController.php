<?php

namespace Jess\scolaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class DefaultController.
 *
 * @Route("/admin")
 */
class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/default")
     */
    public function indexAction()
    {
        return $this->render('JessScolaBundle:Default:index.html.twig');
    }
}
