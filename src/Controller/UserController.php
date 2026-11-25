<?php

namespace App\Controller;

use App\DTO\NewUserDTO;
use App\Messenger\Message\NewUserCommand;
use App\Messenger\TransportBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/user')]
final class UserController extends AbstractController
{
    public function __construct(private readonly TransportBus $transportBus) {}
    #[Route('/new', name: 'app_new_user', methods: ['POST'])]
    public function new(#[MapRequestPayload] NewUserDTO $newUserDTO): Response
    {
        $message = new NewUserCommand($newUserDTO);

        $userId = $this->transportBus->transport($message);

        dd($userId);
    }

    #[Route('/{id}', name: 'app_get_user', requirements: ['id'=>'(?!new$).+'], methods: ['GET'])]
    public function get(string $id): Response
    {

    }
}
