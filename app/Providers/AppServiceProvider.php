<?php

namespace App\Providers;

use App\Models\Animal;
use App\Models\AnimalBreed;
use App\Models\AnimalType;
use App\Models\Appointment;
use App\Models\Budget;
use App\Models\Owner;
use App\Models\Vet;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        AnimalType::creating(function($animalType){
            $animalType->clinic_id = \Auth::user()->id;
        });

        AnimalBreed::creating(function($animalBreed){
            $animalBreed->clinic_id = \Auth::user()->id;
        });

        Animal::creating(function($animal){
            $animal->clinic_id = \Auth::user()->id;
        });

        Appointment::creating(function($appointment){
            $appointment->clinic_id = \Auth::user()->id;
        });

        Budget::creating(function($budget){
            $budget->clinic_id = \Auth::user()->id;
        });

        Owner::creating(function($owner){
            $owner->clinic_id = \Auth::user()->id;
        });

        Vet::creating(function($vet){
            $vet->clinic_id = \Auth::user()->id;
        });
    }
}
