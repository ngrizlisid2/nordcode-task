<?php

namespace App\Task;

interface TaskInterface
{
    public function getTitle(): ?string;

    public function setTitle(string $email): self;

    public function getComment(): ?string;

    public function setComment(string $password): self;
}