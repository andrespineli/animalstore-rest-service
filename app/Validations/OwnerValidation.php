<?php

namespace App\Validations;

class OwnerValidation
{

  public static $ownerValidation = [
        'name' => 'required|max:255',
        'document_number_cpf' => 'nullable|max:14',
        'document_number_rg' => 'nullable|max:14',
        'gender' => 'required|boolean',
        'birth_date' => 'required|date',
        'email' => 'required|max:255',
        'phone_number' => 'required|max:11',
        'cell_number' => 'required|min:11|max:11',
        'address' => 'required|max:255',
        'city' => 'required|max:60',
        'state' => 'required|max:2',
        'postal_code' => 'required|max:11'
    ];

    public static $ownerValidationPatch = [        
        'name' => 'max:255',
        'document_number_cpf' => 'nullable|max:14',
        'document_number_rg' => 'nullable|max:14',
        'gender' => 'boolean',
        'birth_date' => 'date',
        'email' => 'max:255',
        'phone_number' => 'max:11',
        'cell_number' => 'min:11|max:11',
        'address' => 'max:255',
        'city' => 'max:60',
        'state' => 'max:2',
        'postal_code' => 'max:11'
    ];

  }
