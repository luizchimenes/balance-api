<?php

namespace App\Application;

use App\Application\Results\EventResult;
use App\Domain\AccountRepositoryInterface;

class ProcessEvent
{
    public function __construct(private readonly AccountRepositoryInterface $accounts)
    {
    }

    public function handle(array $payload): EventResult
    {
        $result = $this->accounts->processEvent($payload);

        if ($result === null) {
            return EventResult::created([]);
        }

        return EventResult::created($result);
    }
}
