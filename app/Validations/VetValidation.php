<?php

namespace App\Validations;

class VetValidation
{

  public static $vetValidation = [
        'name' => 'required|max:255',
        'document_number_cpf' => 'nullable|max:11',
        'document_number_crmv' => 'nullable|max:11',
        'state' => 'nullable|max:2',
        'email' => 'nullable|max:255'
    ];

//    public static $vetValidationPatch = [
//        'name' => 'max:255',
//        'document_number' => 'nullable|max:14',
//        'email' => 'max:255'
//    ];

  }
