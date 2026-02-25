<?php

namespace App\Infrastructure;

use App\Domain\AccountRepositoryInterface;

class InMemoryAccountRepository implements AccountRepositoryInterface
{
    private array $balances = [];

    public function reset(): void
    {
        $this->balances = [];
    }

    public function getBalance(string $accountId): ?int
    {
        return $this->balances[$accountId] ?? null;
    }

    public function processEvent(array $payload): ?array
    {
        return null;
    }
}
