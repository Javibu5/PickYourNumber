<?php

namespace App\MessageHandler;

use App\Factory\TurnFactory;
use App\Message\AskNumberByEmail;
use App\Repository\TurnRepository;

class AskNumberByEmailHandler
{

    private $turnRepository;

    private $turnFactory;

    public function __construct(TurnRepository $turnRepository , TurnFactory $turnFactory)
    {
        $this->turnRepository=$turnRepository;

        $this->turnFactory=$turnFactory;

    }

    public function __invoke(AskNumberByEmail $command)
    {
        $lastTodayNumber = $this->turnRepository->getLastTodayNumber();
        $clientEmail = $command->getEmail();

        $turn = $this->turnFactory->createTurn($lastTodayNumber+1 , $clientEmail);

        $this->turnRepository->add($turn);

        return $turn;

    }
}
