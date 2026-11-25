<?php

namespace App\Messenger\Message;

use App\DTO\NewUserDTO;

class NewUserCommand
{
    private string $firstname;
    private string $lastname;
    private bool $gender;
    private string $email;

    public function __construct(NewUserDTO $newUserDTO
    ) {
        $this->firstname = $newUserDTO->firstname;
        $this->lastname = $newUserDTO->lastname;
        $this->gender = $newUserDTO->gender;
        $this->email = $newUserDTO->email;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function isGender(): bool
    {
        return $this->gender;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
