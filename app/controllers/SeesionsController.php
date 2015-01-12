<?php

use Larabook\Forms\SignInForm1;
use Laracasts\Flash\Flash;

class SeesionsController extends \BaseController {

	/**
	 * @var SignInForm
	 */
	private $signInForm;

	function __construct(SignInForm1 $signInForm)
	{
		$this->beforeFilter('guest', ['except' => 'destroy']);
		$this->signInForm = $signInForm;
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$formData = Input::only('email', 'password');
		$this->signInForm->validate($formData);

		if(Auth::attempt($formData))
		{
			Flash::message('Welcome back!');
			return Redirect::intended('/statuses');
		}
	}

	public function destroy()
	{
		Auth::logout();

		Flash::message('You have now been logged out.');

		return Redirect::home();
	}
}
