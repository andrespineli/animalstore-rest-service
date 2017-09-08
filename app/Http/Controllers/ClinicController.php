<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Validations\ClinicValidation;
use App\Models\Clinic;
use App\Models\Animal;
use App\Models\Owner;
use App\Models\Vet;
use App\Models\AnimalBreed;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;
use Illuminate\Support\Facades\Hash;


class ClinicController extends Controller
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

    public function getClinic()
    {
        $clinic = Clinic::find(\Auth::user()->id);
        return $clinic;
    }

    public function getClinicAndStatistics()
    {
        $clinicAndstatistics = [
            'clinic' => Clinic::find(\Auth::user()->id),
            'statistics' => [
                'animals' => Animal::where('clinic_id', \Auth::user()->id)->count(),
                'owners' => Owner::where('clinic_id', \Auth::user()->id)->count(),
                'vets' => Vet::where('clinic_id', \Auth::user()->id)->count(),
                'breeds' => AnimalBreed::where('clinic_id', \Auth::user()->id)->count()
            ]
        ];

        return response($clinicAndstatistics, 200);
    }

    public function findClinicById($clinicId)
    {
        $clinic = Clinic::findOrFail($clinicId);
        return $clinic;
    }

    public function createClinic(Request $request)
    {
        $this->validate($request, ClinicValidation::$clinicValidationCreate);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $clinic = Clinic::create($data);
        return $clinic;
    }

    public function updateAllClinicFields(Request $request)
    {
        $this->validate($request, ClinicValidation::$clinicValidation);
        $clinic = Clinic::findOrFail(\Auth::user()->id);
        $clinic->update($request->all());
        return $clinic;
    }

    public function updateSomeClinicFields(Request $request)
    {
        $this->validate($request, ClinicValidation::$clinicValidationPatch);
        $clinic = Clinic::findOrFail(\Auth::user()->id);
        $clinic->update($request->all());
        return $clinic;
    }

    public function updateUserName(Request $request)
    {
        $this->validate($request, ClinicValidation::clinicValidationUserName(\Auth::user()->id));
        $clinic = Clinic::findOrFail(\Auth::user()->id);
        if(Hash::check($request->get('password'), $clinic->password)){
            $data['user_name'] = $request->user_name;
            $clinic->update($data);
            return $clinic;
        }
        return response()->json(['message' => 'Invalid password'], 400);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, ClinicValidation::clinicValidationPassword(\Auth::user()->id));
        $clinic = Clinic::findOrFail(\Auth::user()->id);
        if(Hash::check($request->get('password'), $clinic->password)){
            $data = $request->all();
            $data['password'] = Hash::make($data['password_new']);
            $clinic->update($data);
            return $clinic;
        }
        return response()->json(['message' => 'Invalid password'], 400);
    }

    public function removeClinic($clinicId)
    {
        $clinic = Clinic::findOrFail($clinicId);
        $clinic->delete();
        return response('', 204);
    }
}
