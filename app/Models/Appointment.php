<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Appointment extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'animal_id',
		'clinic_id',
		'appointment_date',
		'temperature',
		'fc',
		'physical_condition',
		'hydration',
		'vermifuge_date',
		'rabies_vaccine_date',
		'multipurpose_vaccine_date',
		'tpc',
		'fr',
		'mucosa',
		'behavior',
		'anamnesis',
		'requested_exams',
		'diagnosis',
		'treatment'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //       
    ];

     protected $table = 'appointment';

}
