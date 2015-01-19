<?php

use Larabook\Statuses\LeaveCommentOnStatusCommand;
use Laracasts\Commander\CommanderTrait;

class CommentsController extends \BaseController {

	use CommanderTrait;
	public function store()
	{
		$input = array_add(Input::get(), 'user_id', Auth::id());

		$this->excute(LeaveCommentOnStatusCommand::class, $input);
	}
}