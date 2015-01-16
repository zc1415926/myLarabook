<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Flash\Flash;

class RegistrationController extends BaseController {

	private $registrationForm;

	function __construct(RegistrationForm $registrationForm)
	{
		//$this->$registrationForm = $registrationForm;
		$this->registrationForm = $registrationForm;

		$this->beforeFilter('guest');
	}

	public function create()
	{
		return View::make('registration.create');
	}

	public function store()
	{
		$this->registrationForm->validate(Input::all());

		$user = $this->execute(RegisterUserCommand::class);//php 5.5

		Auth::login($user);

		Flash::overlay('Glad to have you as a new Larabook member!', 'Welcome!');

		return Redirect::home();
	}
}
