<?php
/**
 * Created by PhpStorm.
 * User: Javier
 * Date: 2019-02-19
 * Time: 19:31
 */

namespace App\Message;


class AskNumberByEmail
{
    /**
     * @var string
     */
    private $email;

    public function __construct(string $email)
    {

        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }


}