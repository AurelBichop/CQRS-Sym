<?php

namespace App\Messenger;

use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class TransportBus
{
    use HandleTrait;

    public function __construct(
        MessageBusInterface $commandBus,
    ) {
        $this->messageBus = $commandBus;
    }

    public function transport(object $message): mixed
    {
        return $this->handle($message);
    }
}
