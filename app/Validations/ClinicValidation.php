<?php

namespace App\Validations;

use Illuminate\Http\Request;

class ClinicValidation
{


    public static $clinicValidationCreate = [
        'name' => 'required|max:255',
        'user_name' => 'required|unique:clinic,user_name',
        'document_number' => 'nullable|max:14',
        'password' => 'required|max:255',
        'password_confirmation' => 'required|same:password|max:255',
        'email' => 'required|email|max:255',
        'cloud_path' => 'nullable|max:255',
        'my_dump_path' => 'nullable|max:255',
    ];

    public static $clinicValidation = [
        'name' => 'required|max:255',
        'document_number' => 'nullable|max:14',
        'email' => 'required|max:255',
        'cloud_path' => 'nullable|max:255',
        'my_dump_path' => 'nullable|max:255',
    ];

    public static $clinicValidationPatch = [
        'name' => 'max:255',
        'document_number' => 'nullable|max:14',
        'email' => 'max:255',
        'cloud_path' => 'nullable|max:255',
        'my_dump_path' => 'nullable|max:255',
    ];

    public static function clinicValidationUserName($clinicId)
    {
        return [
            'user_name' => 'required|unique:clinic,user_name,'.$clinicId,
            'password' => 'required|max:255'
        ];
    }

    public static function clinicValidationPassword($clinicId)
    {
        return [
            'password' => 'required|max:255',
            'password_new' => 'required|max:255',
            'password_confirmation' => 'required|same:password_new|max:255'
        ];
    }


  }
