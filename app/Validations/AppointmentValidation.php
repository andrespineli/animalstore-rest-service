<?php

namespace App\Validations;

class AppointmentValidation
{

  public static $appointmentValidation = [
        'animal_id' => 'required|integer|exists:animal,id',
        'appointment_date' => 'required|date|max:255',
        'temperature' => 'nullable|regex:/^\d*(\.\d{1})?$/|max:11',
        'fc' => 'nullable|max:255',
        'physical_condition' => 'nullable|max:255',
        'hydration' => 'nullable|max:255',
        'vermifuge_date' => 'nullable|date',
        'rabies_vaccine_date' => 'nullable|date',
        'multipurpose_vaccine_date' => 'nullable|date',
        'tpc' => 'nullable|max:255',
        'fr' => 'nullable|max:255',
        'mucosa' => 'nullable|max:255',
        'behavior' => 'nullable|max:500',
        'anamnesis' => 'nullable|max:2000',
        'requested_exams' => 'nullable|max:500',
        'diagnosis' => 'nullable|max:2000',
        'treatment' => 'nullable|max:2000'
    ];

//    public static $appointmentValidationPatch = [
//        'animal_id' => 'integer|max:11|exists:animal,id',
//        'appointment_date' => 'date|max:255',
//        'temperature' => 'regex:/^\d*(\.\d{1})?$/|max:11',
//        'fc' => 'max:255',
//        'physical_condition' => 'max:255',
//        'hydration' => 'max:255',
//        'vermifuge_date' => 'date',
//        'rabies_vaccine_date' => 'date',
//        'multipurpose_vaccine_date' => 'date',
//        'tpc' => 'max:255',
//        'fr' => 'max:255',
//        'mucosa' => 'max:255',
//        'behavior' => 'max:500',
//        'anamnesis' => 'max:2000',
//        'requested_exams' => 'max:500',
//        'diagnosis' => 'max:2000',
//        'treatment' => 'max:2000'
//    ];

  }
