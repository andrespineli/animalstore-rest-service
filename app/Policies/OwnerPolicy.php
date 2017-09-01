<?php

namespace App\Policies;

use App\Models\Clinic;
use App\Models\Owner;


class OwnerPolicy
{
    /**
     * Determine if the given animal_type can be updated by the clinic.
     *
     * @param  \App\Models\Clinic  $clinic
     * @param  \App\Models\Owner  $owner
     * @return bool
     */
    public function findOwnerById(Clinic $clinic, Owner $owner)
    {
        return $clinic->id === $owner->clinic_id;
    }

    public function updateAllOwnerFields(Clinic $clinic, Owner $owner)
    {
        return $clinic->id === $owner->clinic_id;
    }

    public function updateSomeOwnerFields(Clinic $clinic, Owner $owner)
    {
        return $clinic->id === $owner->clinic_id;
    }

    public function removeOwner(Clinic $clinic, Owner $owner)
    {
        return $clinic->id === $owner->clinic_id;
    }

}
