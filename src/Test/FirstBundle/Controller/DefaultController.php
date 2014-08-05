<?php

namespace Test\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Tests\Fixtures\Dummy;
use Test\FirstBundle\Entity\Task;
use Test\FirstBundle\Form\TaskType;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {

        $conn = $this->get('database_connection');
        $users = $conn->fetchAll('SELECT * FROM user');

        $task = new Task();

        $form = $this->createForm(new TaskType(), $task);

        $form->handleRequest($request);

//        if ($form->isValid()) {
//            // perform some action, such as saving the task to the database
//
//            return $this->render(
//                'TestFirstBundle:Default:index.html.twig',
//                array(
//                    'form' => $form->createView(),
//                )
//            );
//        }

        return $this->render(
            'TestFirstBundle:Show:index.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    public function getUser()
    {


        return ;
    }
}
