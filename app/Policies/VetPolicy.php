<?php

namespace App\Policies;

use App\Models\Clinic;
use App\Models\Vet;


class VetPolicy
{
    /**
     * Determine if the given animal_type can be updated by the clinic.
     *
     * @param  \App\Models\Clinic  $clinic
     * @param  \App\Models\Vet  $vet
     * @return bool
     */
    public function findVetById(Clinic $clinic, Vet $vet)
    {
        return $clinic->id === $vet->clinic_id;
    }

    public function updateAllVetFields(Clinic $clinic, Vet $vet)
    {
        return $clinic->id === $vet->clinic_id;
    }

    public function updateSomeVetFields(Clinic $clinic, Vet $vet)
    {
        return $clinic->id === $vet->clinic_id;
    }

    public function removeVet(Clinic $clinic, Vet $vet)
    {
        return $clinic->id === $vet->clinic_id;
    }

}
