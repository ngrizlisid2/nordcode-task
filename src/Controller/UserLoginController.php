<?php

namespace App\Controller;

use App\Email\EmailChecker;
use App\Entity\User;
use App\User\PasswordEncoder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UserLoginController extends AbstractController
{
    /**
     * @var Request $request
     */
    private $request;

    /**
     * @var $doctrine ManagerRegistry
     */
    private $doctrine;

    public function loginPage()
    {
        return $this->render('login/login_form.html.twig');
    }

    public function RegisterPage()
    {
        return $this->render('login/register_form.html.twig');
    }

    public function registerUser(Request $request)
    {
        $this->request = $request;
        $formDataOk = $this->checkFormData(true);//check form data before creating user
        if ($formDataOk['success'] == 1) {
            return $this->forward('App\Controller\UserController::registerUser', [
                'request' => $request,
            ]);
        }

        return $this->returnRegisterError($formDataOk['error_text']);
    }

    protected function returnRegisterError($errorText = null)
    {
        $this->render('login/register_form.html.twig', [
            'error_text' => $errorText ?? 'registration_failed',
        ]);
    }

    /**
     * @param bool $checkPasswords
     * @return array
     */
    private function checkFormData($checkPasswords = false): array
    {
        $formData = $this->request->request->all();
        if ($formData['email'] ?? '' !== '' && $formData['password'] ?? '' !== '') {
            if (!EmailChecker::checkValidEmail($formData['email'])) {
                return ['success' => 0, 'error_text' => 'invalid email format'];
            }
            if ($checkPasswords) {
                if ($formData['password'] != $formData['password_repeat'] ?? '') {
                    return ['success' => 0, 'error_text' => 'passwords do not match'];
                }
            }
        } else {//missing email or password
            if ($formData['email'] ?? '' !== '') {
                return ['success' => 0, 'error_text' => 'missing email'];
            }
            if ($formData['password'] ?? '' !== '') {
                return ['success' => 0, 'error_text' => 'missing password'];
            }
        }
        return ['success' => 1];
    }

    public function loginUser(Request $request)
    {
        $this->request = $request;

        $formData = $this->request->request->all();
        $formDataOk = $this->checkFormData();//check form data before creating user
        if ($formDataOk['success'] == 1) {
            $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->findOneBy([
                    'email' => $formData['email']
                ]);
            if ($user === null) {
                return $this->returnLoginError();
            }
            $userController = new UserController();
            /**
             * @var User $user
             */
            if ($user->getPassword() !== PasswordEncoder::encodePassword($this->request->request->get('password'))) {//wrong password
                return $this->returnLoginError();
            }
            $userController->loginUser($user);

            return $this->forward('App\Controller\DefaultController::index');
        } else {
            return $this->returnLoginError($formData['error_text']);
        }
    }

    protected function returnLoginError($errorText = null)
    {
        return $this->render('login/login_form.html.twig', [
            'error_text' => $errorText ?? 'wrong email or password',
        ]);
    }

}