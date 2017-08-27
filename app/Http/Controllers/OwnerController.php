<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Validations\OwnerValidation;
use App\Models\Owner;
use App\Models\Clinic;
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

    public function findOwnerById($ownerId)
    {
        $owner = Owner::findOrFail($ownerId);
        $this->authorize('findOwnerById', $owner);
        return $owner;
    }

    public function createOwner(Request $request)
    {
        $this->validate($request, OwnerValidation::$ownerValidation);
        $data = $request->all();
        $data['clinic_id'] = \Auth::user()->id;
        $owner = Owner::create($data);
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
