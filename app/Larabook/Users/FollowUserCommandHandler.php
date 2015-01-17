<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-17
 * Time: 下午2:36
 */

namespace Larabook\Users;


use Laracasts\Commander\CommandHandler;

class FollowUserCommandHandler implements CommandHandler{

    protected $userRepo;

    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = $this->userRepo->findById($command->userId);
        $this->userRepo->follow($command->userIdToFollow, $user);

        return $user;
    }


}