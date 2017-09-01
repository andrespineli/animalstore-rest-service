<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Clinic extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','user_name', 'document_number', 'password', 'email', 'cloud_path','my_dump_path'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'api_token',
        'api_token_expiration'
    ];

    protected $table = 'clinic';

    public function animal()
    {
        return $this->hasMany('App\Models\Animal');
    }

    public function animalType()
    {
        return $this->hasMany('App\Models\AnimalType');
    }

    public function animalBreed()
    {
        return $this->hasMany('App\Models\AnimalBreed');
    }

    public function owner()
    {
        return $this->hasMany('App\Models\Owner');
    }

    public function vet()
    {
        return $this->hasMany('App\Models\Vet');
    }

    public function appointment()
    {
        return $this->hasMany('App\Models\Appointment');
    }
}
