<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserLogin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    /**
     * @var Request $request
     */
    private  $request;

    public function registerUser($request)
    {
        $this->request = $request;
        if ($this->checkExistingUser()) {//check if user by email exist
            return $this->render('login/register_form.html.twig', [
                'error_text' => 'user with email ' . $this->request->request->get('email') . ' already exists',
            ]);
        }
        $user = $this->createNewUser();
        $this->logInUser($user);

        return $this->forward('App\Controller\DefaultController::index',
            ['request' => $request]
        );
    }

    private function checkExistingUser(): bool
    {
        $email = $this->request->request->get('email');
        $existingUser = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['email' => $email]);
        if ($existingUser === null) {//no user by email exist create new
            return false;
        }
        return true;
    }

    /**
     * creates and returns new user
     */
    private function createNewUser():User
    {
        $entityManager = $this->getDoctrine()->getManager();

        //create user
        $user = new User();
        $user->setEmail($this->request->request->get('email'));
        $user->setPassword('');
        $entityManager->persist($user);
        $entityManager->flush();
        //create user

        //encode user password
        $user->setPassword($user->encodePassword($this->request->request->get('password')));
        $entityManager->persist($user);
        $entityManager->flush();
        //encode user password
        return $user;
    }

    public function loginUser(User $user)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $userLogin = new UserLogin();
        $userLogin->setUser($user);
        $userLogin->setSessionId($userLogin->generateSessionId());
        $userLogin->setDeleted(0);
        $entityManager->persist($userLogin);
        $entityManager->flush();

        $userLogin->setUserCookies();
    }
}