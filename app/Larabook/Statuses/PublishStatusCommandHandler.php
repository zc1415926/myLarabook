<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-11
 * Time: 下午8:24
 */

namespace Larabook\Statuses;


use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class PublishStatusCommandHandler implements CommandHandler{

    use DispatchableTrait;
    protected  $statusRepository;

    function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $status = Status::publish($command->body);

        $status = $this->statusRepository->save($status, $command->userId);

        $this->dispatchEventsFor($status);
        return $status;
    }
}