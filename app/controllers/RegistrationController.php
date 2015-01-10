<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Core\CommandBus;
use Laracasts\Flash\Flash;

class RegistrationController extends BaseController {

	use CommandBus;

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

		extract(Input::only('username', 'email', 'password'));
		//dd($username);

		$user = $this->execute(
			//把生成User和增删改User合成一句话，Controller里没有操作数据的代码，解耦
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
