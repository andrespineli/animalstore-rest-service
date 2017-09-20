<?php

namespace App\Policies;

use App\Models\Clinic;
use App\Models\Animal;


class AnimalPolicy
{
    /**
     * Determine if the given animal_type can be updated by the clinic.
     *
     * @param  \App\Models\Clinic  $clinic
     * @param  \App\Models\Animal  $animal
     * @return bool
     */

    public function getBudgetAppointmentSheet(Clinic $clinic, Animal $animal)
    {
        return $clinic->id === $animal->clinic_id;
    }

    public function getPrintablesSheet(Clinic $clinic, Animal $animal)
    {
        return $clinic->id === $animal->clinic_id;
    }

    public function findAnimalById(Clinic $clinic, Animal $animal)
    {
        return $clinic->id === $animal->clinic_id;
    }

    public function updateAllAnimalFields(Clinic $clinic, Animal $animal)
    {
        return $clinic->id === $animal->clinic_id;
    }

    public function updateSomeAnimalFields(Clinic $clinic, Animal $animal)
    {
        return $clinic->id === $animal->clinic_id;
    }

    public function removeAnimal(Clinic $clinic, Animal $animal)
    {
        return $clinic->id === $animal->clinic_id;
    }

}
