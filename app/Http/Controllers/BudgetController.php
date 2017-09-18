<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Validations\BudgetValidation;
use App\Models\Clinic;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;

class BudgetController extends Controller
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

    public function getBudgets()
    {
        $budgets = Clinic::find(\Auth::user()->id)->budget()->paginate();
        return $budgets;
    }

    public function findBudgetById($budgetId)
    {
        $budget = Budget::findOrFail($budgetId);
        $this->authorize('findBudgetById', $budget);
        return $budget;
    }

    public function createBudget(Request $request)
    {
        $this->validate($request, BudgetValidation::$budgetValidation);
        $budget = Budget::create($request->all());
        return $budget;
    }

    public function updateAllBudgetFields(Request $request, $budgetId)
    {
        $this->validate($request, BudgetValidation::$budgetValidation);
        $budget = Budget::findOrFail($budgetId);
        $this->authorize('updateAllBudgetFields', $budget);
        $budget->update($request->all());
        return $budget;
    }

    public function removeBudget($budgetId)
    {
        $budget = Budget::findOrFail($budgetId);
        $this->authorize('removeBudget', $budget);
        $budget->delete();
        return response('', 204);
    }
}
