<?php
/**
 * Created by PhpStorm.
 * User: jess
 * Date: 23/04/18
 * Time: 08:42
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Entity\Etudiants;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class ContactController extends Controller
{
    /**
     * @Route("/send/message", name="send_message")
     * @return Response
     * @param Request
     * @Method("POST")
     */
    public function sendAction(Request $request)
    {
        $mailer = $this->get("mailer");
        try {
            $contact = new Contact();
            $contact->setNom($request->request->get("nom"));
            $contact->setMessage($request->request->get("message"));
            $contact->setEmail($request->request->get("email"));
            $contact->setSubject($request->request->get("subject"));
            $idE = $request->request->get("etudiant");
            if($idE) {
                $etudiant = $this->getDoctrine()->getRepository(Etudiants::class)->find($idE);
                $contact->setEtudiant($etudiant);
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $message = (new \Swift_Message("Message de contact"));
            $header = $message->embed(\Swift_Image::fromPath("img/head.png"));
            $message->setFrom($request->request->get("email"))
                ->setTo("tsiryjessgabriel@gmail.com")
                ->setBody(
                    $this->renderView(
                        "emails/contact_message.html.twig", array("contact"=>$contact, "header"=>$header)
                    ), "text/html"
                );
            $mailer->send($message);

            return new Response("OKAY");
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}