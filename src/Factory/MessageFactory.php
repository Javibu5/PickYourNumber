<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 2019-03-25
 * Time: 11:15
 */

namespace App\Factory;
use App\Entity\Turn;

class MessageFactory
{
    public function createEmail(Turn $turn): ?\Swift_Message
    {
        $number = $turn->getNumber();
        $email = $turn->getClient()->getEmail();
        $message = (new \Swift_Mailer('Hello Email'))
            ->setFrom('send@example.com')
            ->setTo($email)
            ->setBody(
                $this->renderView(
                // templates/emails/registration.html.twig
                    'emails/registration.html.twig',
                    ['number' => $number]
                ),
                'text/html'
            )
        ;

        return $message;
    }


}