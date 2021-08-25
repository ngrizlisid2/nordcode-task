<?php

namespace App\Email;

interface EmailInterface
{
    public function getEmail(): ?string;

    public function setEmail(string $email): self;
}