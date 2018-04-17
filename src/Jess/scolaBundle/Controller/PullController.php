<?php
/**
 * Created by PhpStorm.
 * User: gabriel
 * Date: 3/21/18
 * Time: 2:54 PM.
 */

namespace Jess\scolaBundle\Controller;

use Jess\scolaBundle\Entity\PullRequest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Workflow\Registry;

/**
 * Class PullController.
 *
 * @Route("/pull")
 */
class PullController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     * @return Response
     */
    public function indexAction()
    {
        $pr1 = new PullRequest();
        $pr1->setTitle('test')->setDescription('DESC1');

        $stateMachine = $this->container->get('state_machine.pull_request');
        $stateMachine->getMarking($pr1);

        $state1 = $pr1->getState();

        $stateMachine->apply($pr1, 'update');
        $next = $stateMachine->getEnabledTransitions($pr1);
        $x = $next[1]->getFroms();
        $pr1->setState($x[0]);
        $state2 = $pr1->getState();

        return new Response(var_dump($stateMachine->getEnabledTransitions($pr1)).' '.$state1.' '.$pr1->getState());
    }

    /**
     * workflow exemple 2.
     *
     * @return Response
     *
     * @Route("/registre")
     */
    public function moveAction()
    {
        $reg = new Registry();
        $pr = new PullRequest();
        $workflow = $this->container->get('state_machine.pull_request');
        $pr->setState('travis');

        if ($workflow->can($pr, 'wait_for_review')) {
            $workflow->apply($pr, 'wait_for_review');
        }

        return new Response('rep '.$workflow->can($pr, 'accept'));
    }
}
