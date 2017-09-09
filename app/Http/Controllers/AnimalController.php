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

    public function getServiceSheet($animalId)
    {
        $serviceSheet = Animal::findOrFail($animalId);
        $this->authorize('getPrintablesSheet', $serviceSheet);
        return $serviceSheet->select(
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
            'animal.weight'
        )->join('owner', 'owner.id', '=', 'animal.owner_id')
         ->join('animal_breed', 'animal_breed.id', '=', 'animal.breed_id')
         ->join('animal_type', 'animal_type.id', '=', 'animal.type_id')
         ->where('animal.id', $animalId)->get();
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
