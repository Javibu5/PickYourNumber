<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 2019-02-19
 * Time: 20:00
 */

namespace App\Factory;


use App\Entity\Client;
use App\Entity\Turn;

class TurnFactory
{
    public function createTurn(int $number , string $email)
    {
        $client = Client::withEmail($email);
        $turn = new Turn();
        $turn->setNumber($number);
        $turn->setCreatedAt(new \DateTime());
        $turn->setClient($client);

        return $turn;
    }

}