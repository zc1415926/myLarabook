<?php
/**
 * Created by PhpStorm.
 * User: ZC
 * Date: 2014/12/25
 * Time: 13:24
 */

namespace Larabook\Users;




use Larabook\Users\User;

class UserRepository {

    //Persist a user
    public function save(User $user)
    {
        //dd($user);
        return $user->save();
    }

    public function getPaginated($howMany = 25)
    {
        //return User::paginate($howMany);
        //return User::simplePaginate($howMany);
        return User::orderBy('username', 'asc')->paginate($howMany);
    }

    public function findByUsername($username)
    {
        return User::with('statuses')->whereUsername($username)->first();
    }

    public function findById($id)
    {
        return User::findOrFail($id);
    }

    public function follow($userIdToFollow, User $user)
    {
        $user->followedUsers()->attach($userIdToFollow);
    }

    public function unfollow($userIdToUnfollow, User $user)
    {
        $user->followedUsers()->detach($userIdToUnfollow);
    }
}