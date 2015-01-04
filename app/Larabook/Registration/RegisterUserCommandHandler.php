<?php
/**
 * Created by PhpStorm.
 * User: ZC
 * Date: 2014/12/25
 * Time: 13:10
 */

namespace Larabook\Registration;



use Larabook\Users\User;
use Larabook\Users\UserRepository;
use Laracasts\Commander\CommandHandler;

class RegisterUserCommandHandler implements CommandHandler{

    protected $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        //dd($command);
        $user = User::register(
            $command->username,
            $command->email,
            $command->password
		);
        //dd($user);
        $this->repository->save($user);

        return $user;
    }
}