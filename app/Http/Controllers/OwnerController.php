<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Validations\OwnerValidation;
use App\Models\Owner;
use App\Models\Clinic;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Gate;

class OwnerController extends Controller
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

    public function getOwners()
    {
        $owners = Clinic::find(\Auth::user()->id)->owner()->paginate();
        return $owners;
    }

    public function getOwnersWithAnimals()
    {
        $owners = Clinic::find(\Auth::user()->id)->owner()->get();

        foreach ($owners as $owner) {
        //  $owners[0]['animals'] = Animal::where('owner_id', $owner['id'])->get();
        $owners[0]['animals'] = \DB::table('animal')
                                    ->select(
                                      'animal.id',
                                      'animal.clinic_id',
                                      'animal.owner_id',
                                      'vet.name as vet',
                                      'animal_type.name as type',
                                      'animal_breed.name as breed',
                                      'animal.name',
                                      'animal.gender',
                                      'animal.notes',
                                      'animal.food_types',
                                      'animal.birth_date',
                                      'animal.weight',
                                      'animal.color'
                                    )
                                    ->join('vet', 'vet.id', '=', 'animal.vet_id')
                                    ->join('animal_type', 'animal_type.id', '=', 'animal.type_id')
                                    ->join('animal_breed', 'animal_breed.id', '=', 'animal.breed_id')
                                    ->where('owner_id', $owner['id'])->get();
        }



        return $owners;
    }


    public function findOwnerById($ownerId)
    {
        $owner = Owner::findOrFail($ownerId);
        $this->authorize('findOwnerById', $owner);
        return $owner;
    }

    public function createOwner(Request $request)
    {
        $this->validate($request, OwnerValidation::$ownerValidation);
        $owner = Owner::create($request->all());
        return $owner;
    }

    public function updateAllOwnerFields(Request $request, $ownerId)
    {
        $this->validate($request, OwnerValidation::$ownerValidation);
        $owner = Owner::findOrFail($ownerId);
        $this->authorize('updateAllOwnerFields', $owner);
        $owner->update($request->all());
        return $owner;
    }

    public function updateSomeOwnerFields(Request $request, $ownerId)
    {
        $this->validate($request, OwnerValidation::$ownerValidationPatch);
        $owner = Owner::findOrFail($ownerId);
        $this->authorize('updateSomeOwnerFields', $owner);
        $owner->update($request->all());
        return $owner;
    }

    public function removeOwner($ownerId)
    {
        $owner = Owner::findOrFail($ownerId);
        $this->authorize('removeOwner', $owner);
        $owner->delete();
        return response('', 204);
    }
}
