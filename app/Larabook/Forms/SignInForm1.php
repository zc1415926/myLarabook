<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-11
 * Time: 上午1:36
 */

namespace Larabook\Forms;


use Laracasts\Validation\FormValidator;

class SignInForm1 extends FormValidator{

    protected $rules = [
        'email'    => 'required|email',
        'password' => 'required',
    ];

}