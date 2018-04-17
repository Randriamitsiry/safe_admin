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
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
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
}
