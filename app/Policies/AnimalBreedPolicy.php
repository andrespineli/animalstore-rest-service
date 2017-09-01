<?php

namespace App\Policies;

use App\Models\Clinic;
use App\Models\AnimalBreed;


class AnimalBreedPolicy
{
    /**
     * Determine if the given animal_type can be updated by the clinic.
     *
     * @param  \App\Models\Clinic  $clinic
     * @param  \App\Models\AnimalBreed  $animalBreed
     * @return bool
     */
    public function findAnimalBreedById(Clinic $clinic, AnimalBreed $animalBreed)
    {
        return $clinic->id === $animalBreed->clinic_id;
    }

    public function updateAllAnimalBreedFields(Clinic $clinic, AnimalBreed $animalBreed)
    {
        return $clinic->id === $animalBreed->clinic_id;
    }

    public function updateSomeAnimalBreedFields(Clinic $clinic, AnimalBreed $animalBreed)
    {
        return $clinic->id === $animalBreed->clinic_id;
    }

    public function removeAnimalBreed(Clinic $clinic, AnimalBreed $animalBreed)
    {
        return $clinic->id === $animalBreed->clinic_id;
    }

}
