<?php

namespace App\Validations;

class BudgetValidation
{

    public static $budgetValidation = [
        'description' => 'required|max:255',
        'amount' => 'required|regex:/^\d*(\.\d{1})?$/|max:8'
    ];

}
