<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;

class LeaveCommentOnStatusCommandHandler implements CommandHandler {

    protected  $statusRepo;

    function __construct(StatusRepository $statusRepo)
    {
        $this->statusRepo = $statusRepo;
    }


    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $comment = $this->statusRepo->leaveComment($command-user_id, $command->status_id, $body);

        return $comment;
    }

}