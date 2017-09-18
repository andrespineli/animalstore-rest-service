<?php

namespace App\Policies;

use App\Models\BudgetAppointment;
use App\Models\Clinic;


class BudgetAppointmentPolicy
{
    /**
     * Determine if the given animal_type can be updated by the clinic.
     *
     * @param  \App\Models\Clinic  $clinic
     * @param  \App\Models\Vet  $vet
     * @return bool
     */
    public function findBudgetAppointmentById(Clinic $clinic, BudgetAppointment $budgetAppointment)
    {
        return $clinic->id === $budgetAppointment->clinic_id;
    }

    public function updateAllBudgetAppointmentFields(Clinic $clinic, BudgetAppointment $budgetAppointment)
    {
        return $clinic->id === $budgetAppointment->clinic_id;
    }

    public function removeBudgetAppointment(Clinic $clinic, BudgetAppointment $budgetAppointment)
    {
        return $clinic->id === $budgetAppointment->clinic_id;
    }

}
