<?php

namespace App\Validations;

class AppointmentValidation
{

  public static $appointmentValidation = [
        'animal_id' => 'required|integer|exists:animal,id',
        'appointment_date' => 'required|date|max:255',
        'temperature' => 'required|regex:/^\d*(\.\d{1})?$/|max:11',
        'fc' => 'required|max:255',
        'physical_condition' => 'required|max:255',
        'hydration' => 'required|max:255',
        'vermifuge_date' => 'required|date',
        'rabies_vaccine_date' => 'required|date',
        'multipurpose_vaccine_date' => 'required|date',
        'tpc' => 'required|max:255',
        'fr' => 'required|max:255',
        'mucosa' => 'required|max:255',
        'behavior' => 'required|max:500',
        'anamnesis' => 'required|max:2000',
        'requested_exams' => 'required|max:500',
        'diagnosis' => 'required|max:2000',
        'treatment' => 'required|max:2000'
    ];

    public static $appointmentValidationPatch = [
        'animal_id' => 'integer|max:11|exists:animal,id',
        'appointment_date' => 'date|max:255',
        'temperature' => 'regex:/^\d*(\.\d{1})?$/|max:11',
        'fc' => 'max:255',
        'physical_condition' => 'max:255',
        'hydration' => 'max:255',
        'vermifuge_date' => 'date',
        'rabies_vaccine_date' => 'date',
        'multipurpose_vaccine_date' => 'date',
        'tpc' => 'max:255',
        'fr' => 'max:255',
        'mucosa' => 'max:255',
        'behavior' => 'max:500',
        'anamnesis' => 'max:2000',
        'requested_exams' => 'max:500',
        'diagnosis' => 'max:2000',
        'treatment' => 'max:2000'
    ];

  }
