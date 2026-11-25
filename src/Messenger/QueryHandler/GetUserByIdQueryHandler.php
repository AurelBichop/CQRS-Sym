<?php

namespace App\Messenger\QueryHandler;

use App\DTO\UserDTO;
use App\Messenger\Message\UserIdQuery;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;

#[AsMessageHandler]
readonly class GetUserByIdQueryHandler
{
    public function __construct(private UserRepository $userRepository, private ObjectMapperInterface $objectMapper) {}

    public function __invoke(UserIdQuery $userIdQuery): UserDTO
    {
        $user = $this->userRepository->find($userIdQuery->getUserId());

        if(!$user)
            throw new EntityNotFoundException();

        return $this->objectMapper->map($user, UserDTO::class);
    }
}
