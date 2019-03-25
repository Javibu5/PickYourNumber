<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 2019-02-27
 * Time: 01:56
 */

namespace App\Message;


use App\Entity\Turn;

class CallClient
{
    private $turn;

    public function __construct(Turn $turn)
    {
        $this->turn = $turn;
    }

    /**
     * @return Turn
     */
    public function getTurn(): Turn
    {
        return $this->turn;
    }


}