<?php

namespace App\Task;

interface TaskDateInterface
{
    public function getDate(): ?\DateTimeInterface;

    public function setDate(\DateTimeInterface $date): self;
}