<?php

namespace App\Policies;

use App\Models\Clinic;
use App\Models\AnimalType;


class AnimalTypePolicy
{
    /**
     * Determine if the given animal_type can be updated by the clinic.
     *
     * @param  \App\Models\Clinic  $clinic
     * @param  \App\Models\AnimalType  $animalType
     * @return bool
     */
    public function findAnimalTypeById(Clinic $clinic, AnimalType $animalType)
    {
        return $clinic->id === $animalType->clinic_id;
    }

    public function findBreedsByTypeId(Clinic $clinic, AnimalType $breedsByTypeId)
    {
        return $clinic->id === $breedsByTypeId->clinic_id;
    }

    public function updateAllAnimalTypeFields(Clinic $clinic, AnimalType $animalType)
    {
        return $clinic->id === $animalType->clinic_id;
    }

    public function updateSomeAnimalTypeFields(Clinic $clinic, AnimalType $animalType)
    {
        return $clinic->id === $animalType->clinic_id;
    }

    public function removeAnimalType(Clinic $clinic, AnimalType $animalType)
    {
        return $clinic->id === $animalType->clinic_id;
    }

}
