<?php

namespace App\Validations;

class AnimalBreedValidation
{

  public static $animalBreedValidation = [
        'type_id' => 'required|integer|max:11|exists:animal_type,id',
        'name' => 'required|max:255',
        'notes' => 'required|max:1000'

    ];

    public static $animalBreedValidationPatch = [          
        'type_id' => 'integer|max:11|exists:animal_type,id',
        'name' => 'max:255',
        'notes' => 'max:1000'
    ];



  }
