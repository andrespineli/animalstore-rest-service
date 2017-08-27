<?php

namespace App\Validations;

class LoginValidation
{

    public static $clinicLoginValidation = [
        'user_name' => 'required|max:255',
        'password'  => 'required|max:255'
    ];

}
