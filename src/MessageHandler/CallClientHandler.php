<?php

namespace App\MessageHandler;

use App\Entity\Client;
use App\Entity\Turn;
use App\Factory\MessageFactory;
use App\Message\CallClient;

class CallClientHandler
{

    /**
     * @var MessageFactory
     */
    private $factory;

    public function __construct(MessageFactory $factory)
    {
        $this->factory = $factory;
    }

    public function __invoke(CallClient $command)
    {
        $turn = $command->getTurn();

        $this->factory->createEmail($turn);

        return $this;
    }
}
