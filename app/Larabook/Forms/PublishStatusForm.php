<?php
/**
 * Created by PhpStorm.
 * User: zc
 * Date: 15-1-16
 * Time: 下午11:28
 */

namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator{

    protected $rules = [
        'body' => 'required',
    ];
}