<?php

namespace App\Messenger\Message;

readonly class UserIdQuery
{
    public function __construct(private string $userId) {}

    public function getUserId(): string
    {
        return $this->userId;
    }
}
