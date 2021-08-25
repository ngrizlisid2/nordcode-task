<?php


namespace App\UserLogin;

use App\Entity\UserLogin;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\ParameterBag;

class UserLoginChecker
{
    /**
     * @var $cookies ParameterBag
     */
    private $cookies;

    /**
     * @var $doctrine ManagerRegistry
     */
    private $doctrine;

    public function __construct($cookies, $doctrine)
    {
        $this->cookies = $cookies;
        $this->doctrine = $doctrine;
    }

    public function checkLoggedInUser()
    {
        $login = $this->getLoggedInUserId();
        if ($login !== null) {
            return true;
        }
        return false;
    }

    public function getLoggedInUserId(): ?UserLogin
    {
        if ($this->cookies->has('session_id')) {//check if user is logged in
            $login = $this->doctrine
                ->getRepository(UserLogin::class)
                ->findOneBy([
                    'session_id' => $this->cookies->get('session_id'),
                    'deleted' => 0,
                ]);
            if ($login !== null) {
                /**
                 * @var UserLogin $login
                 */
                return $login;
            }
        }
        return null;
    }

}