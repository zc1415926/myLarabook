<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-11
 * Time: 下午7:50
 */

namespace Larabook\Statuses;


use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;

class Status extends \Eloquent{

    use EventGenerator;

    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }

    public static function publish($body)
    {
        $status = new static(compact('body'));
        $status->raise(new StatusWasPublished($body));

        return $status;
    }

    public function comments()
    {
        return $this->hasMany('Larabook\Statuses\Comment');
    }

}