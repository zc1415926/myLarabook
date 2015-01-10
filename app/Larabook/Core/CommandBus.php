<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-10
 * Time: 下午10:09
 */

namespace Larabook\Core;


use App;

trait CommandBus {

    public function execute($command)
    {
        return $this->getCommandBus()->execute($command);
    }

    public function getCommandBus()
    {
        return App::make('Laracasts\Commander\CommandBus');
    }
}