<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-18
 * Time: 上午2:08
 */

namespace Larabook\Users;


trait FollowableTrait {

    public function followedUsers()
    {
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')->withTimestamps();
    }

    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');
        return in_array($this->id, $idsWhoOtherUserFollows);
    }

}