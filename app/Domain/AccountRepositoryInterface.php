<?php

namespace App\Domain;

interface AccountRepositoryInterface
{
    public function reset(): void;

    public function getBalance(string $accountId): ?int;

    public function processEvent(array $payload): ?array;
}
