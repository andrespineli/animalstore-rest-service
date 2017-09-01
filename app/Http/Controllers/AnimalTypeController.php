<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Validations\AnimalTypeValidation;
use App\Models\Clinic;
use App\Models\AnimalType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;

class AnimalTypeController extends Controller
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

    public function getAnimalsTypes()
    {
        $animalsTypes = Clinic::find(\Auth::user()->id)->animalType()->paginate();
        return $animalsTypes;
    }

    public function findAnimalTypeById($animalTypeId)
    {
        $animalType = AnimalType::findOrFail($animalTypeId);
        $this->authorize('findAnimalTypeById', $animalType);
        return $animalType;
    }

    public function findBreedsByTypeId(Request $request, $animalTypeId)
    {
        $breedsByTypeId = AnimalType::findOrFail($animalTypeId);
        $this->authorize('findBreedsByTypeId', $breedsByTypeId);
        $breedsByTypeId = $breedsByTypeId->animalBreed()->get();
        return $breedsByTypeId;
    }

    public function createAnimalType(Request $request)
    {
        $this->validate($request, AnimalTypeValidation::$animalTypeValidation);
        $animalType = AnimalType::create($request->all());
        return $animalType;
    }

    public function updateAllAnimalTypeFields(Request $request, $animalTypeId)
    {
        $this->validate($request, AnimalTypeValidation::$animalTypeValidation);
        $animalType = AnimalType::findOrFail($animalTypeId);
        $this->authorize('updateAllAnimalTypeFields', $animalType);
        $animalType->update($request->all());
        return $animalType;
    }

    public function updateSomeAnimalTypeFields(Request $request, $animalTypeId)
    {
        $this->validate($request, AnimalTypeValidation::$animalTypeValidationPatch);
        $animalType = AnimalType::findOrFail($animalTypeId);
        $this->authorize('updateSomeAnimalTypeFields', $animalType);
        $animalType->update($request->all());
        return $animalType;
    }

    public function removeAnimalType($animalTypeId)
    {
        $animalType = AnimalType::findOrFail($animalTypeId);
        $this->authorize('removeAnimalType', $animalType);
        $animalType->delete();
        return response('', 204);
    }
}
