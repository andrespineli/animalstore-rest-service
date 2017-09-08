<?php

namespace App\Policies;

use App\Models\Clinic;


class ClinicPolicy
{
    /**
     * Determine if the given animal_type can be updated by the clinic.
     *
     * @param  \App\Models\Clinic  $clinic
     * @return bool
     */


    public function clinic(Clinic $clinic)
    {
        return $clinic->id === \Auth::user()->id;
    }
}
