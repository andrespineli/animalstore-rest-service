<?php

namespace App\Policies;

use App\Models\Budget;
use App\Models\Clinic;


class BudgetPolicy
{
    /**
     * Determine if the given animal_type can be updated by the clinic.
     *
     * @param  \App\Models\Clinic  $clinic
     * @param  \App\Models\Vet  $vet
     * @return bool
     */
    public function findBudgetById(Clinic $clinic, Budget $budget)
    {
        return $clinic->id === $budget->clinic_id;
    }

    public function updateAllBudgetFields(Clinic $clinic, Budget $budget)
    {
        return $clinic->id === $budget->clinic_id;
    }

    public function removeBudget(Clinic $clinic, Budget $budget)
    {
        return $clinic->id === $budget->clinic_id;
    }

}
