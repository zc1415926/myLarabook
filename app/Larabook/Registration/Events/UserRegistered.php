<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-10
 * Time: 下午3:10
 */

namespace Larabook\Registration\Events;


use Larabook\Users\User;

class UserRegistered {

    public $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }
}