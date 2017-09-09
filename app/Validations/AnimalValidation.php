<?php

namespace App\Validations;

class AnimalValidation
{
    public static $animalValidation = [
        'owner_id' =>  'required|integer|max:11|exists:owner,id',
        'vet_id' => 'required|integer|max:11|exists:vet,id',
        'type_id' => 'required|integer|max:11|exists:animal_type,id',
        'breed_id' => 'required|integer|max:11|exists:animal_breed,id',
        'name' => 'required|max:255',
        'gender' => 'nullable|boolean',
        'notes' => 'nullable|max:255',
        'food_types' => 'nullable|max:255',
        'birth_date' => 'nullable|max:255',
        'weight' => 'nullable|regex:/^\d*(\.\d{1})?$/|max:10',
        'color' => 'nullable|max:255'
    ];

//    public static $animalValidationPatch = [
//        'owner_id' => 'integer|max:11|exists:owner,id',
//        'vet_id' => 'integer|max:11|exists:vet,id',
//        'type_id' => 'integer|max:11|exists:animal_type,id',
//        'breed_id' => 'integer|max:11|exists:animal_breed,id',
//        'name' => 'max:255',
//        'gender' => 'boolean',
//        'notes' => 'max:255',
//        'food_types' => 'max:255',
//        'birth_date' => 'max:255',
//        'weight' => 'regex:/^\d*(\.\d{1})?$/|max:10',
//        'color' => 'max:255'
//    ];

  }
