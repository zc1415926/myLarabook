<?php

use Larabook\Forms\PublishStatusForm;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;
use Laracasts\Flash\Flash;

class StatusesController extends \BaseController {

	protected $statusRepository;
	protected $publishStatusForm;

	function __construct(StatusRepository $statusRepository, PublishStatusForm $publishStatusForm)
	{
		$this->statusRepository = $statusRepository;
		$this->publishStatusForm = $publishStatusForm;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$statuses = $this->statusRepository->getFeedForUser(Auth::user());
		return View::make('statuses.index', compact('statuses'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//array_add: a laravel helper function
		$input = array_add(Input::all(), 'userId', Auth::id());

		$this->publishStatusForm->validate($input);
		$this->execute(PublishStatusCommand::class, $input);

		Flash::message('Your status has been updated!');

		return Redirect::back();
	}
}