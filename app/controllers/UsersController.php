<?php

use Larabook\Users\UserRepository;

class UsersController extends \BaseController {

	protected $userRepository;

	function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->userRepository->getPaginated(24);
		return View::make('users.index')->withUsers($users);

	}


}
