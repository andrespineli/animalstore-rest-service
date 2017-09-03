<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Validations\AnimalValidation;
use App\Models\Animal;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;

class AnimalController extends Controller
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

    public function getAnimals()
    {
        $animals = Clinic::find(\Auth::user()->id)->animal()->paginate();
        return $animals;
    }

    public function findAnimalById($animalId)
    {
        $animal = Animal::findOrFail($animalId);
        $this->authorize('findAnimalById', $animal);
        return $animal;
    }

    public function createAnimal(Request $request)
    {
        $this->validate($request, AnimalValidation::$animalValidation);
        $animal = Animal::create($request->all());
        return $animal;
    }

    public function updateAllAnimalFields(Request $request, $animalId)
    {
        $this->validate($request, AnimalValidation::$animalValidation);
        $animal = Animal::findOrFail($animalId);
        $this->authorize('updateAllAnimalFields', $animal);
        $animal->update($request->all());
        return $animal;
    }

    public function updateSomeAnimalFields(Request $request, $animalId)
    {
        $this->validate($request, AnimalValidation::$animalValidationPatch);
        $animal = Animal::findOrFail($animalId);
        $this->authorize('updateSomeAnimalFields', $animal);
        $animal->update($request->all());
        return $animal;
    }

    public function removeAnimal($animalId)
    {
        $animal = Animal::findOrFail($animalId);
        $this->authorize('removeAnimal', $animal);
        $animal->delete();
        return response('', 204);
    }
}
