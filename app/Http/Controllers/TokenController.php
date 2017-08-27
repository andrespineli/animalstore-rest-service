<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class TokenController extends Controller
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
    public static function generateAuthToken($user){
        $expiration = new \Carbon\Carbon();
        $expiration->addHour(2);
        $user->api_token = sha1(str_random(32)) . '.' . sha1(str_random(32));
        $user->api_token_expiration = $expiration->format('Y-m-d H:i:s');
        $user->save();
        return [
            'api_token' => $user->api_token,
            'api_token_expiration' => $user->api_token_expiration
        ];
    }

    public function refreshAuthToken(){
        $user = \Auth::user();
        return $this->generateAuthToken($user);
    }

    public function tokenValidator(){
        return response()->json(['authenticated' => 'true'], 200);      
    }

}
