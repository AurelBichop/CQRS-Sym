<?php

namespace App\DTO;

class UserDTO
{
    public function __construct(
        public string $id,
        public string $email,
        public string $firstname,
        public string $lastname,
        public bool $gender
    ) {}
}
