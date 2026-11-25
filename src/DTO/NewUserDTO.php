<?php

namespace App\DTO;

final class NewUserDTO
{
    public function __construct(
        public string $firstname,
        public string $lastname,
        public string $email,
        public ?bool $gender = false
    ) {}
}
