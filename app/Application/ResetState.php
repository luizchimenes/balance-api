<?php

namespace App\Application;

use App\Domain\AccountRepositoryInterface;

class ResetState
{
    public function __construct(private readonly AccountRepositoryInterface $accounts)
    {
    }

    public function handle(): void
    {
        $this->accounts->reset();
    }
}
