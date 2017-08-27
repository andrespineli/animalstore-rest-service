<?php

namespace App\Policies;

use App\Models\Clinic;
use App\Models\AnimalType;


class ClinicPolicy
{
    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return bool
     */
    public function findAnimalTypeById($clinic, $animalTyp)
    {
        return $clinic->id === $animalType->clinic_id;
    }
}
