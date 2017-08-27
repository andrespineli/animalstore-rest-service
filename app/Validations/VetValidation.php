<?php

namespace App\Validations;

class VetValidation
{

  public static $vetValidation = [
        'name' => 'required|max:255',
        'document_number' => 'nullable|max:14',
        'email' => 'required|max:255'
    ];

    public static $vetValidationPatch = [        
        'name' => 'max:255',
        'document_number' => 'nullable|max:14',
        'email' => 'max:255'
    ];

  }
