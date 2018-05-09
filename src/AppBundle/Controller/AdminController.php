<?php
/**
 * Created by PhpStorm.
 * User: gabriel
 * Date: 4/6/18
 * Time: 12:33 PM
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Etudiants;
use AppBundle\Entity\Formation;
use AppBundle\Entity\Inscription;
use AppBundle\Entity\Niveau;
use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends BaseAdminController
{
    public static $entityname;
    /**
     * @Route("/admin", name="easyadmin")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $this::$entityname = $request->query->get("entity");
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
        if ($entity instanceof Formation || $entity instanceof Inscription || $entity instanceof Niveau) {
            $user = $this->get('security.token_storage')->getToken()->getUser();

            $entity->setEtablissement($user->getEtablissement());
        }

        parent::preUpdateEntity($entity);
    }

    public function exportAction()
    {
        $snappy = $this->get('knp_snappy.pdf');
        $items= $this->getDoctrine()->getRepository($this->entity["class"])->findAll();
        $columns = $this->getDoctrine()->getEntityManager()->getClassMetadata($this->entity["class"])->getColumnNames();

        $html = $this->renderView('AppBundle/Default/list.html.twig', array(
            "items"=>$items,
            "columns"=>$columns
        ));

        $filename = 'myFirstSnappyPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
        //return new Response($this->entity["class"]);
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
    public function createFormationListQueryBuilder($entityClass, $sortDirection, $sortField = null)
    {
        $usr= $this->get('security.token_storage')->getToken()->getUser();
        $etablissement = $usr->getEtablissement();
        $queryBuilder = $this->em->createQueryBuilder()->select('entity')->from($entityClass, 'entity')->where('entity.etablissement = :etablissement')
            ->setParameter("etablissement", $etablissement);

        if (null !== $sortField) {
            $queryBuilder->orderBy('entity.'.$sortField, $sortDirection);
        }

        return $queryBuilder;
    }
    public function createInscriptionListQueryBuilder($entityClass, $sortDirection, $sortField = null)
    {
        $usr= $this->get('security.token_storage')->getToken()->getUser();
        $etablissement = $usr->getEtablissement();
        $queryBuilder = $this->em->createQueryBuilder()->select('entity')->from($entityClass, 'entity')->where('entity.etablissement = :etablissement')
            ->setParameter("etablissement", $etablissement);

        if (null !== $sortField) {
            $queryBuilder->orderBy('entity.'.$sortField, $sortDirection);
        }

        return $queryBuilder;
    }
    public function createObtentionListQueryBuilder($entityClass, $sortDirection, $sortField = null)
    {
        $usr= $this->get('security.token_storage')->getToken()->getUser();
        $etablissement = $usr->getEtablissement();
        $queryBuilder = $this->em->createQueryBuilder()->select('entity')->from($entityClass, 'entity')
            ->join("entity.idInscription", "inscription")
            ->where('ihttps://www.bocasay.com/nscription.etablissement = :etablissement')
            ->setParameter("etablissement", $etablissement);

        if (null !== $sortField) {
            $queryBuilder->orderBy('entity.'.$sortField, $sortDirection);
        }

        return $queryBuilder;
    }
    public function createAnneeScolaireListQueryBuilder($entityClass, $sortDirection, $sortField = null)
    {
        $usr= $this->get('security.token_storage')->getToken()->getUser();
        $etablissement = $usr->getEtablissement();
        $queryBuilder = $this->em->createQueryBuilder()->select('entity')->from($entityClass, 'entity')
            ->where('entity.Etablissement = :etablissement')
            ->setParameter("etablissement", $etablissement);

        if (null !== $sortField) {
            $queryBuilder->orderBy('entity.'.$sortField, $sortDirection);
        }

        return $queryBuilder;
    }
}
