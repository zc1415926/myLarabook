<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-11
 * Time: 下午8:18
 */

namespace Larabook\Statuses;


class PublishStatusCommand {

    public $body;
    public $userId;

    function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId = $userId;
    }
}