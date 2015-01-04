<?php

namespace Larabook\Registration;
/**
 * Created by PhpStorm.
 * User: ZC
 * Date: 2014/12/25
 * Time: 12:58
 */

class RegisterUserCommand {

    public $username;
    public $email;
    public $password;

    function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }


}