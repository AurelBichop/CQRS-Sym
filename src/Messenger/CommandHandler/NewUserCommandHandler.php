<?php

namespace App\Messenger\CommandHandler;

use App\Entity\User;
use App\Messenger\Message\NewUserCommand;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class NewUserCommandHandler
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}
    public function __invoke(NewUserCommand $message)
    {
        $newUser = new User();

        $newUser->setEmail($message->getEmail())->setFirstname($message->getFirstname())->setLastname($message->getLastname())->setGender($message->isGender());

        $this->entityManager->persist($newUser);

        $this->entityManager->flush();

        return $newUser->getId();
    }
}
