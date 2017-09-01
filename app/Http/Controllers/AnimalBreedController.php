<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Validations\AnimalBreedValidation;
use App\Models\Clinic;
use App\Models\AnimalBreed;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;

class AnimalBreedController extends Controller
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

    public function getAnimalsBreeds()
    {
    /*    $animalsBreeds = Clinic::find(\Auth::user()->id)
        ->animalBreed()
        ->join('animal_type', 'animal_type.id', '=', 'animal_breed.type_id')
        ->paginate();*/

        $animalsBreeds = \DB::table('animal_breed')
        ->select('animal_breed.id', 'animal_breed.type_id', 'animal_type.name as type', 'animal_breed.name', 'animal_breed.notes')
        ->join('animal_type', 'animal_type.id', '=', 'animal_breed.type_id')
        ->where('animal_breed.clinic_id', \Auth::user()->id)
        ->paginate();
        return $animalsBreeds;
    }

    public function findAnimalBreedById($animalBreedId)
    {
        $animalBreed = AnimalBreed::findOrFail($animalBreedId);
        $this->authorize('findAnimalBreedById', $animalBreed);
        return $animalBreed;
    }

    public function createAnimalBreed(Request $request)
    {
        $this->validate($request, AnimalBreedValidation::$animalBreedValidation);
        $animalBreed = AnimalBreed::create($request->all());
        return $animalBreed;
    }

    public function updateAllAnimalBreedFields(Request $request, $animalBreedId)
    {
        $this->validate($request, AnimalBreedValidation::$animalBreedValidation);
        $animalBreed = AnimalBreed::findOrFail($animalBreedId);
        $this->authorize('updateAllAnimalBreedFields', $animalBreed);
        $animalBreed->update($request->all());
        return $animalBreed;
    }

    public function updateSomeAnimalBreedFields(Request $request, $animalBreedId)
    {
        $this->validate($request, AnimalBreedValidation::$animalBreedValidationPatch);
        $animalBreed = AnimalBreed::findOrFail($animalBreedId);
        $this->authorize('updateSomeAnimalBreedFields', $animalBreed);
        $animalBreed->update($request->all());
        return $animalBreed;
    }

    public function removeAnimalBreed($animalBreedId)
    {
        $animalBreed = AnimalBreed::findOrFail($animalBreedId);
        $this->authorize('removeAnimalBreed', $animalBreed);
        $animalBreed->delete();
        return response('', 204);
    }
}
