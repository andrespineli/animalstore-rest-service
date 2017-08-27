<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TokenController;
use App\Validations\LoginValidation;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
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

    public function clinicLogin(Request $request)
    {
        $this->validate($request, LoginValidation::$clinicLoginValidation);
        $userName = $request->get('user_name');
        $password = $request->get('password');
        $clinic = Clinic::where('user_name', '=', $userName)->first();
        if (!$clinic) {
            return response()->json(['message' => 'Invalid user_name'], 400);
        }
        if(!Hash::check($password, $clinic->password)){
            return response()->json(['message' => 'Invalid password'], 400);
        }
        return TokenController::generateAuthToken($clinic);
    }

}
