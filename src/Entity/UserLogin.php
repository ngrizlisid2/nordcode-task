<?php

namespace App\Entity;

use App\Repository\UserLoginRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Cookie;

/**
 * @ORM\Entity(repositoryClass=UserLoginRepository::class)
 */
class UserLogin
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $session_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $deleted;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getSessionId(): ?string
    {
        return $this->session_id;
    }

    public function setSessionId(string $session_id): self
    {
        $this->session_id = $session_id;

        return $this;
    }

    public function getDeleted(): ?int
    {
        return $this->deleted;
    }

    public function setDeleted(int $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function generateSessionId()
    {
        return substr(sha1(rand()), 0, 10);
    }

    public function setUserCookies()
    {
        setcookie('session_id', $this->getSessionId(), strtotime('+ 30 days'));
    }
}
