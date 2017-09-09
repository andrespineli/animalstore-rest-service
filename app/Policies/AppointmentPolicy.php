<?php

namespace App\Policies;

use App\Models\Clinic;
use App\Models\Appointment;


class AppointmentPolicy
{
    /**
     * Determine if the given animal_type can be updated by the clinic.
     *
     * @param  \App\Models\Clinic  $clinic
     * @param  \App\Models\Appointment  $appointment
     * @return bool
     */

    public function getAppointmentSheet(Clinic $clinic, Animal $animal)
    {
        return $clinic->id === $animal->clinic_id;
    }

    public function findAppointmentById(Clinic $clinic, Appointment $appointment)
    {
        return $clinic->id === $appointment->clinic_id;
    }

    public function updateAllAppointmentFields(Clinic $clinic, Appointment $appointment)
    {
        return $clinic->id === $appointment->clinic_id;
    }

    public function updateSomeAppointmentFields(Clinic $clinic, Appointment $appointment)
    {
        return $clinic->id === $appointment->clinic_id;
    }

    public function removeAppointment(Clinic $clinic, Appointment $appointment)
    {
        return $clinic->id === $appointment->clinic_id;
    }

}