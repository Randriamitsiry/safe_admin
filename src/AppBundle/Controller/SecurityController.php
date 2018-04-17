<?php

/**
 * Created by PhpStorm.
 * User: querdos
 * Date: 02/01/16
 * Time: 14:11
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SecurityController extends Controller {
    /**
     * @Route("/login", name="login_route")
     * @Template("UserBundle:security:login.html.twig")
     *
     * @param Request $request
     * @return Response
     */
    public function loginAction(Request $request) {
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirect('/admin');
        }

        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return new Response($this->renderView("AppBundle:Security:login.html.twig", array( 'last_username' => $lastUsername,
            'error'         => $error,
            'title' => "Connexion"))
        );
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction() {
        //
    }

    /**
     * @Route("/logout")
     */
    public function logoutAction()
    {
        $this->get('security.token_storage')->setToken(null);
        $this->get('request')->getSession()->invalidate();
        return $this->redirect("/");
    }
}