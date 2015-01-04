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
}