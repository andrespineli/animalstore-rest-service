<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Animal extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clinic_id',
        'owner_id',
        'vet_id',
        'type_id',
        'breed_id',
        'name',
        'gender',
        'notes',
        'food_types',
        'birth_date',
        'weight',
        'color'


    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    protected $table = 'animal';

    public function vet()
    {
     return $this->hasOne('App\Models\AnimalVet');
    }

    public function animalType()
    {
     return $this->hasOne('App\Models\AnimalType');
    }

    public function animalBreed()
    {
     return $this->hasOne('App\Models\AnimalBreed');
    }

    public function owner()
    {
     return $this->hasOne('App\Models\Owner');
    }

    public function appointment()
    {
     return $this->hasMany('App\Models\Appointment');
    }

}
