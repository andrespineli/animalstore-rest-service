<?php

namespace App\Policies;

use App\Models\Clinic;
use App\Models\AnimalType;


class AnimalTypePolicy
{
    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return bool
     */
    public function findAnimalTypeById($clinic, $animalType)
    {
        return $clinic->id === $animalType->clinic_id;
    }

    public function findBreedsByTypeId($clinic, $breedsByTypeId)
    {
        return $clinic->id === $breedsByTypeId->clinic_id;
    }
}
