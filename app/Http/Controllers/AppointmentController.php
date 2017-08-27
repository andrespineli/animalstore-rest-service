<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

    public function getAppointments()
    {
        $appointments = Clinic::find(\Auth::user()->id)->appointment()->paginate();
        return $appointments;
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
        $data = $request->all();
        $data['clinic_id'] = \Auth::user()->id;
        $appointment = Appointment::create($data);
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
