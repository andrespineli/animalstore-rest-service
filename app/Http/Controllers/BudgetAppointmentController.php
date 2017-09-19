<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\BudgetAppointment;
use App\Validations\BudgetAppointmentValidation;
use App\Models\Clinic;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;

class BudgetAppointmentController extends Controller
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

    public function getBudgetsAppointments($appointmentId)
    {
        $budgetsAppointments = Appointment::find($appointmentId)
            ->budgetAppointment()
            ->join('budget', 'budget.id', '=', 'budget_appointment.budget_id')
            ->select('')
            ->get();
        return $budgetsAppointments;
    }

    public function findBudgetAppointmentById($budgetAppointmentId)
    {
        $budgetAppointment = Budget::findOrFail($budgetAppointmentId);
        $this->authorize('findBudgetAppointmentById', $budgetAppointment);
        return $budgetAppointment;
    }

    public function createBudgetAppointment(Request $request, $appointmentId)
    {
        $this->validate($request, BudgetAppointmentValidation::$budgetAppointmentValidation);
        $data = $request->all();
        $data['appointment_id'] = $appointmentId;
        $budgetAppointment = BudgetAppointment::create($data);
        return $budgetAppointment;
    }

    public function updateAllBudgetAppointmentFields(Request $request, $budgetAppointmentId)
    {
        $this->validate($request, BudgetAppointmentValidation::$budgetAppointmentValidation);
        $budgetAppointment = BudgetAppointment::findOrFail($budgetAppointmentId);
        $this->authorize('updateAllBudgetAppointmentFields', $budgetAppointment);
        $budgetAppointment->update($request->all());
        return $budgetAppointment;
    }

    public function removeBudgetAppointment($budgetAppointmentId)
    {
        $budgetAppointment = Budget::findOrFail($budgetAppointmentId);
        $this->authorize('removeBudgetAppointment', $budgetAppointment);
        $budgetAppointment->delete();
        return response('', 204);
    }
}
