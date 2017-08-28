<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Owner extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clinic_id',
		'name',
		'document_number_cpf',
		'document_number_rg',
		'gender',
		'birth_date',
		'email',
		'phone_number',
		'cell_number',
		'address',
		'city',
		'state',
		'postal_code'

    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    	//
    ];

     protected $table = 'owner';

     public function animal()
     {
         return $this->hasMany('App\Models\Animal');
     }

}
