<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-19
 * Time: 下午8:21
 */

namespace Larabook\Statuses;


use Eloquent;

class Comment extends Eloquent{

    protected  $fillable = ['user_id', 'status_id', 'body'];

    public function owner()
    {
        return $this->belongsTo('Larabook\Users\User', 'user_id');
    }

}