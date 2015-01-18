<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-18
 * Time: 下午9:29
 */

namespace views\statuses;


use Eloquent;

class Comment extends Eloquent{

    protected $fillable = ['user_id', 'status_id', 'body'];

    public function owner()
    {
        return $this->belongsTo('Larabook\Users\User', 'user_id');
    }
}