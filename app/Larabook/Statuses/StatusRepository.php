<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-11
 * Time: 下午8:33
 */

namespace Larabook\Statuses;


use Larabook\Users\User;

class StatusRepository {

    public function save(Status $status, $userId)
    {
        return User::findOrFail($userId)
            ->statuses()
            ->save($status);
    }

    public function getAllForUser(User $user)
    {
        return $user->statuses;
    }
}