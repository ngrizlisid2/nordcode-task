<?php

namespace App\User;

interface UserInterface
{
    public function getId(): ?int;

    public function getPassword(): ?string;

    public function setPassword(string $password): self;
}