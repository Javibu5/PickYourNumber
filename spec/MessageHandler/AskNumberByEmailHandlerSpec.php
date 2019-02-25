<?php

namespace spec\App\MessageHandler;

use App\Entity\Turn;
use App\Factory\TurnFactory;
use App\Message\AskNumberByEmail;
use App\MessageHandler\AskNumberByEmailHandler;
use App\Repository\TurnRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AskNumberByEmailHandlerSpec extends ObjectBehavior{

    public function let(TurnRepository $turnRepository , TurnFactory $factory)
    {
        $this->beConstructedWith($turnRepository , $factory);

    }

    public function it_gives_number_to_client(
        TurnRepository $turnRepository , AskNumberByEmail $command, TurnFactory $factory,
        Turn $turn
    )
    {
        $command->getEmail()->willReturn('javi@email.com');

        $turnRepository->getLastTodayNumber()->willReturn(4);
        $factory->createTurn(4+1, 'javi@email.com')->willReturn($turn)->shouldBeCalled();

        $turnRepository->add($turn)->shouldBeCalled();



        $this($command);
    }



}