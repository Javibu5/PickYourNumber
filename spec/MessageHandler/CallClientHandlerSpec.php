<?php

namespace spec\App\MessageHandler;

use App\Entity\Client;
use App\Entity\Turn;
use App\Factory\MessageFactory;
use App\Message\CallClient;
use App\MessageHandler\CallClientHandler;
use Monolog\Handler\MailHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CallClientHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CallClientHandler::class);
    }

    function let(MessageFactory $factory)
    {
        $this->beConstructedWith($factory);
    }

    function it_can_send_email_Client_with_his_number(CallClient $command , MessageFactory $factory , Turn $turn)
    {
        $command->getTurn()->willReturn($turn);
        $factory->createEmail($turn)->shouldBeCalled();
        $this($command);
    }
}
