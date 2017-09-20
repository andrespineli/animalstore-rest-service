<?php

namespace App\Validations;

class BudgetAppointmentValidation
{

    public static $budgetAppointmentValidation = [
        'budget_id' => 'required|integer|max:11|exists:budget,id'
    ];
//'appointment_id' => 'required|integer|max:11|exists:appointment,id'
}
