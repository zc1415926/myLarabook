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
        return $user->statuses()->with('user')->latest()->get();
    }

    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();
    }
}