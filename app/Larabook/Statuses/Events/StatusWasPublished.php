<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-11
 * Time: 下午8:30
 */

namespace Larabook\Statuses\Events;


class StatusWasPublished {

    public $body;

    function __construct($body)
    {
        $this->body = $body;
    }
}