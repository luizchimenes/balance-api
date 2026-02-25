<?php

namespace App\Application\Results;

class EventResult
{
    public const STATUS_CREATED = 'created';
    public const STATUS_NOT_FOUND = 'not_found';

    public function __construct(
        public readonly string $status,
        public readonly array $payload
    ) {
    }

    public static function created(array $payload): self
    {
        return new self(self::STATUS_CREATED, $payload);
    }

    public static function notFound(): self
    {
        return new self(self::STATUS_NOT_FOUND, []);
    }
}
