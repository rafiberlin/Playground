<?php

namespace Blog\UserBundle\Controller;


use Blog\UserBundle\Entity\User;
use Blog\UserBundle\Form\Credential;
use Blog\UserBundle\Persistence\DBUser;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function loginAction()
    {
        $conn = $this->get('database_connection');
        $users = $conn->fetchAll('SELECT * FROM user');
        var_dump($users);

        return $this->render('BlogUserBundle:Default:user.html.twig', array());
    }

    public function newAction(Request $request)
    {
        $user = new User();

        $form = $this->createForm(new Credential(), $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->save($user);
        }

        return $this->render(
            'BlogUserBundle:Credential:user_creation.html.twig',
            array(
                'credentialForm' => $form->createView(),
            )
        );
    }

    function save(User $user)
    {
        /**
         * @var Connection
         */
        $conn = $this->get("database_connection");
        $dbUser = new DBUser($conn);
        $msg = null;
        try {
            $dbUser->save($user);
            $msg = "User saved!";
        } catch (\Exception $e) {
            $msg = $e->getMessage();
        }

        $this->get('session')->getFlashBag()->add(
            'notice',
            $msg
        );
    }
}
