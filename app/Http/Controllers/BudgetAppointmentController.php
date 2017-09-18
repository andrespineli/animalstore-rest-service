<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

    public function getBudgetsAppointments()
    {
        $budgetsAppointments = Clinic::find(\Auth::user()->id)->budgetAppointment()->paginate();
        return $budgetsAppointments;
    }

    public function findBudgetAppointmentById($budgetAppointmentId)
    {
        $budgetAppointment = Budget::findOrFail($budgetAppointmentId);
        $this->authorize('findBudgetAppointmentById', $budgetAppointment);
        return $budgetAppointment;
    }

    public function createBudgetAppointment(Request $request)
    {
        $this->validate($request, BudgetAppointmentValidation::$budgetAppointmentValidation);
        $budgetAppointment = BudgetAppointment::create($request->all());
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
