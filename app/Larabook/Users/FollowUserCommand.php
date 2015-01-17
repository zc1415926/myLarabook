<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-17
 * Time: 下午2:36
 */

namespace Larabook\Users;


class FollowUserCommand {

    public $userId;
    public $userIdToFollow;

    function __construct($userId, $userIdToFollow)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }
}