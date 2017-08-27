<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Validations\VetValidation;
use App\Models\Clinic;
use App\Models\Vet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;

class VetController extends Controller
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

    public function getVets()
    {
        $vets = Clinic::find(\Auth::user()->id)->vet()->paginate();
        return $vets;
    }

    public function findVetById($vetId)
    {
        $vet = Vet::findOrFail($vetId);
        $this->authorize('findVetById', $vet);
        return $vet;
    }

    public function createVet(Request $request)
    {
        $this->validate($request, VetValidation::$vetValidation);
        $data = $request->all();
        $data['clinic_id'] = \Auth::user()->id;
        $vet = Vet::create($data);
        return $vet;
    }

    public function updateAllVetFields(Request $request, $vetId)
    {
        $this->validate($request, VetValidation::$vetValidation);
        $vet = Vet::findOrFail($vetId);
        $this->authorize('updateAllVetFields', $vet);
        $vet->update($request->all());
        return $vet;
    }

    public function updateSomeVetFields(Request $request, $vetId)
    {
        $this->validate($request, VetValidation::$vetValidationPatch);
        $vet = Vet::findOrFail($vetId);
        $this->authorize('updateSomeVetFields', $vet);
        $vet->update($request->all());
        return $vet;
    }

    public function removeVet($vetId)
    {
        $vet = Vet::findOrFail($vetId);
        $this->authorize('removeVet', $vet);
        $vet->delete();
        return response('', 204);
    }
}
