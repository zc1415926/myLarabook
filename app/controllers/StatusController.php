<?php

use Larabook\Core\CommandBus;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;
use Laracasts\Flash\Flash;

class StatusController extends \BaseController {

	use Commandbus;

	protected $statusRepository;

	function __construct(StatusRepository $statusRepository)
	{
		$this->statusRepository = $statusRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$statuses = $this->statusRepository->getAllForUser(Auth::user());
		return View::make('statuses.index', compact('statuses'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//$status =
		$this->execute(new PublishStatusCommand(Input::get('body'), Auth::user()->id));

		Flash::message('Your status has been updated!');

		return Redirect::back();
	}
}
