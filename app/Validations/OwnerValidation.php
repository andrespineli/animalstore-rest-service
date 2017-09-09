<?php

namespace App\Validations;

class OwnerValidation
{

  public static $ownerValidation = [
        'name' => 'required|max:255',
        'document_number_cpf' => 'nullable|max:14',
        'document_number_rg' => 'nullable|max:14',
        'gender' => 'nullable|boolean',
        'birth_date' => 'nullable|date',
        'email' => 'nullable|max:255',
        'phone_number' => 'nullable|max:11',
        'cell_number' => 'nullable|min:11|max:11',
        'address' => 'nullable|max:255',
        'city' => 'nullable|max:60',
        'state' => 'nullable|max:2',
        'postal_code' => 'nullable|max:11'
    ];

//    public static $ownerValidationPatch = [
//        'name' => 'max:255',
//        'document_number_cpf' => 'nullable|max:14',
//        'document_number_rg' => 'nullable|max:14',
//        'gender' => 'boolean',
//        'birth_date' => 'date',
//        'email' => 'max:255',
//        'phone_number' => 'max:11',
//        'cell_number' => 'min:11|max:11',
//        'address' => 'max:255',
//        'city' => 'max:60',
//        'state' => 'max:2',
//        'postal_code' => 'max:11'
//    ];

  }
