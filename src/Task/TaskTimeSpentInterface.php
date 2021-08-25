<?php

namespace App\Task;

interface TaskTimeSpentInterface
{
    public function getTimeSpent(): ?int;

    public function setTimeSpent(int $time_spent): self;
}