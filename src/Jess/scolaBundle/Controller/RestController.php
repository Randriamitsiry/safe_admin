<?php
/**
 * Created by PhpStorm.
 * User: gabriel
 * Date: 3/30/18
 * Time: 2:29 PM
 */

namespace Jess\scolaBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Jess\scolaBundle\Entity\Etudiant;
use Jess\scolaBundle\Form\EtudiantType;
use PHPUnit\Framework\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/*
 * @Rest\Route("/student")
 */
class RestController extends FOSRestController
{
    /*
     * Recuperer tous les étudiants de la bdd
     * @return JsonResponse
     */
    public function indexAction()
    {
        $data = [];
        $items = $this->getDoctrine()->getRepository(Etudiant::class)->findAll();
        foreach ($items as $item) {
            $data[] = [
                "id" => $item->getId(),
                "nom" => $item->getNom()
            ];
        }

        $view = View::create($data);
        $view->setFormat("json");
        //return $items;
        //après avoir declarer le listener de view dans la section fos_rest, on peut retourner directement le view
        return $this->handleView($view);
        //return new JsonResponse($data);
    }

    /**
     * @Rest\Get("/students/{id}")
     */
    public function getAction($id)
    {
        /*
         * @var Etudiant
         */
        $etudiant = $this->getDoctrine()->getRepository(Etudiant::class)->find($id);
        if (!$etudiant) {
            return new JsonResponse(["message" => "ID non-trouvé"], Response::HTTP_NOT_FOUND);
        }
        $data[] = [
            "id" => $etudiant->getId(),
            "nom" => $etudiant->getNom()
        ];

        return new JsonResponse($data);
    }

    /**
     * ajouter un nouvel étudiant
     * @Rest\View()
     * @Rest\Post("/students")
     */
    public function postEtudiantAction(Request $request)
    {
        $etudiant = new Etudiant();
        if ($request) {
            $etudiant->setNom($request->get("nom"))
                ->setAdresse($request->get("adresse"))
                ->setTelephone($request->get("telephone"));
            $em = $this->getDoctrine()->getManager();
            $em->persist($etudiant);
            $em->flush();

            return new JsonResponse(["ok" => "Successsfully added"]);
        }

        return new JsonResponse(["non-ok" => $request->isSecure()]);
    }

    /**
     * supprimer un étudiant
     * @Rest\View()
     * @Rest\Delete("/delete/{id}")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $etudiant = $em->getRepository(Etudiant::class)->find($id);
        if ($etudiant) {
            try {
                $em->remove($etudiant);
                $em->flush();

                return new JsonResponse(["message" => "delete ok"]);
            } catch (Exception $exception) {
                return new Response($exception->getMessage());
            }
        } else {
            return new JsonResponse(["message" => "Cannot find student"]);
        }
    }
}
