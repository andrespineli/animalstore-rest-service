<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Validations\AppointmentValidation;
use App\Models\Clinic;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;

class AppointmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function getAnimalAppointments($animalId)
    {
        $appointments = Animal::findOrFail($animalId)->appointment()->get();
        return $appointments;
    }

    public function getAppointmentSheet($animalId, $appointmentId)
    {
        $appointmentSheet = Animal::findOrFail($animalId);
        $this->authorize('getPrintablesSheet', $appointmentSheet);
        return $appointmentSheet->select(
            'animal.clinic_id',
            'owner.name as owner',
            'owner.birth_date as owner_birth',
            'owner.document_number_cpf',
            'owner.document_number_rg',
            'owner.address',
            'owner.city',
            'owner.state',
            'animal.name as animal',
            'animal_breed.name as breed',
            'animal_type.name as type',
            'animal.color',
            'animal.food_types',
            'animal.birth_date as animal_birth',
            'animal.gender',
            'animal.weight',
            'appointment.appointment_date',
            'appointment.temperature',
            'appointment.fc',
            'appointment.physical_condition',
            'appointment.hydration',
            'appointment.vermifuge_date',
            'appointment.rabies_vaccine_date',
            'appointment.multipurpose_vaccine_date',
            'appointment.tpc',
            'appointment.fr',
            'appointment.mucosa',
            'appointment.behavior',
            'appointment.anamnesis',
            'appointment.requested_exams',
            'appointment.diagnosis',
            'appointment.treatment'
        )->join('owner', 'owner.id', '=', 'animal.owner_id')
            ->join('animal_breed', 'animal_breed.id', '=', 'animal.breed_id')
            ->join('animal_type', 'animal_type.id', '=', 'animal.type_id')
            ->join('appointment', 'animal.id', '=', 'appointment.animal_id')
            ->where('appointment.id', $appointmentId)->get();
    }


    public function findAppointmentById($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $this->authorize('findAppointmentById', $appointment);
        return $appointment;
    }

    public function createAppointment(Request $request)
    {
        $this->validate($request, AppointmentValidation::$appointmentValidation);
        $appointment = Appointment::create($request->all());
        return $appointment;
    }

    public function updateAllAppointmentFields(Request $request, $appointmentId)
    {
        $this->validate($request, AppointmentValidation::$appointmentValidation);
        $appointment = Appointment::findOrFail($appointmentId);
        $this->authorize('updateAllAppointmentFields', $appointment);
        $appointment->update($request->all());
        return $appointment;
    }

    public function updateSomeAppointmentFields(Request $request, $appointmentId)
    {
        $this->validate($request, AppointmentValidation::$appointmentValidationPatch);
        $appointment = Appointment::findOrFail($appointmentId);
        $this->authorize('updateSomeAppointmentFields', $appointment);
        $appointment->update($request->all());
        return $appointment;
    }

    public function removeAppointment($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        $this->authorize('removeAppointment', $appointment);
        $appointment->delete();
        return response('', 204);
    }
}
