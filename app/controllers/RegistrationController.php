<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Commander\CommandBus;
use Laracasts\Flash\Flash;

class RegistrationController extends BaseController {

	private $registrationForm;
	/**
	 * @var CommandBus
	 */
	private $commandBus;

	function __construct(Commandbus $commandBus, RegistrationForm $registrationForm)
	{
		//$this->$registrationForm = $registrationForm;
		$this->registrationForm = $registrationForm;
		$this->commandBus = $commandBus;
	}

	public function create()
	{
		return View::make('registration.create');
	}

	public function store()
	{
		$this->registrationForm->validate(Input::all());

		extract(Input::only('username', 'email', 'password'));
		//dd($username);

		$user = $this->commandBus->execute(

			new RegisterUserCommand($username, $email, $password)
		);


//
//		$user = User::create(
//			Input::only('username', 'email', 'password')
//		);
//
		Auth::login($user);

		Flash::overlay('Glad to have you as a new Larabook member!', 'Welcome!');

		return Redirect::home();
	}
}
