<?php namespace Larabook\Users;

use Eloquent, Hash;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventGenerator;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, FollowableTrait;

	protected $fillable = ['username', 'email', 'password'];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = Hash::make($password);
	}

	public function statuses()
	{
		return $this->hasMany('Larabook\Statuses\Status')->latest();
	}

	public static function register($username, $email, $password)
	{
		//echo "sb";
		//dd($username);
		$user = new static(compact('username', 'email', 'password'));

		$user->raise(new UserRegistered($user));

		return $user;
	}

	public function is($user)
	{
		if (is_null($user)) {
			return false;
		}

		return $this->username == $user->username;
	}

	public function comments()
	{
		return $this->hasMany('Larabook\Statuses\Comment');
	}
}