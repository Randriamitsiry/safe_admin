<?php
/**
 * Created by PhpStorm.
 * User: gabriel
 * Date: 4/6/18
 * Time: 12:33 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Formation;
use AppBundle\Entity\Inscription;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends BaseAdminController
{
    /**
     * @Route("/admin", name="easyadmin")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $denied = ["Users", "Etablissement", "Etudiant", "Directeur"];
        if ( in_array($request->query->get("entity"), $denied))
        {
            $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN', null, 'Vous ne pouvez pas accèdez à cette page');
        } else {
            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Vous ne pouvez pas accèdez à cette page');
        }

        return parent::indexAction($request);
    }
    /**
     * Allows applications to modify the entity associated with the item being
     * edited before persisting it.
     *
     * @param object $entity
     */
    protected function preUpdateEntity($entity)
    {
        if ($entity instanceof Formation || $entity instanceof Inscription) {
            $user = $this->get('security.token_storage')->getToken()->getUser();

            $entity->setEtablissement($user->getEtablissement());
        }

        parent::preUpdateEntity($entity);
    }

    public function exportAction()
    {
        exec("wkhtmltopdf www.google.com test.pdf");
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction()
    {
        return new Response("OK");
    }

    public function pdfAction()
    {

    }
}
