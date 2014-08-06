<?php

namespace Blog\UserBundle\Controller;


use Blog\UserBundle\Entity\Credential;
use Blog\UserBundle\Entity\User;
use Blog\UserBundle\Form\UserCreation;
use Blog\UserBundle\Form\UserLogin;
use Blog\UserBundle\Persistence\DBUser;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function loginAction(Request $request)
    {
        $credential = new Credential();
        $form = $this->createForm(new UserLogin(), $credential);
        $form->handleRequest($request);
        if ($form->isValid()) {
            if ($this->authenticate($credential)) {
                return $this->render(
                    'BlogUserBundle:Default:index.html.twig',
                    array(
                        'name' => $credential->getLogin()
                    )
                );
            } else {
                $msg = "User or password does not exist";
                $this->get('session')->getFlashBag()->add(
                    'notice',
                    $msg
                );
            }
        }

        return $this->render(
            'BlogUserBundle:Credential:user_form.html.twig',
            array(
                'phpForm' => $form->createView(),
            )
        );
    }

    public function newAction(Request $request)
    {
        $user = new User();

        $form = $this->createForm(new UserCreation(), $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->save($user);

        }

        return $this->render(
            'BlogUserBundle:Credential:user_form.html.twig',
            array(
                'phpForm' => $form->createView(),
            )
        );
    }

    private function save(User $user)
    {
        /**
         * @var Connection
         */
        $conn = $this->get("database_connection");

        $msg = "";
        try {
            $dbUser = new DBUser($conn);
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

    private function authenticate(Credential $credential)
    {
        /**
         * @var Connection
         */
        $conn = $this->get("database_connection");

        $success = false;
        try {
            $dbUser = new DBUser($conn);
            $success = $dbUser->authenticate($credential);
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            $this->get('session')->getFlashBag()->add(
                'notice',
                $msg
            );
        }

        return $success;

    }
}
