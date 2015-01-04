<?php
namespace Larabook\Forms;
use Laracasts\Validation\FormValidator;


/**
 * Created by PhpStorm.
 * User: ZC
 * Date: 2014/12/19
 * Time: 10:04
 */

class RegistrationForm extends FormValidator{

    protected $rules = [
        'username' => 'required|unique:users',
        'email'    => 'required|email|unique:users',
        'password' => 'required|confirmed',
    ];

}