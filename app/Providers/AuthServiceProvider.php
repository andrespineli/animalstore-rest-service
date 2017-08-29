<?php

namespace App\Providers;

use App\Models\Clinic;
use App\Policies\AnimalTypePolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Gate::policy(Clinic::class, AnimalTypePolicy::class);
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */



    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        //Gates AnimalType
        Gate::define('findAnimalTypeById', function ($clinic, $animalType) {
            return $clinic->id === $animalType->clinic_id;
        });

        Gate::define('findBreedsByTypeId', function ($clinic, $breedsByTypeId) {
            return $clinic->id === $breedsByTypeId->clinic_id;
        });


        Gate::define('updateAllAnimalTypeFields', function ($clinic, $animalType) {
            return $clinic->id === $animalType->clinic_id;
        });

        Gate::define('updateSomeAnimalTypeFields', function ($clinic, $animalType) {
            return $clinic->id === $animalType->clinic_id;
        });

        Gate::define('removeAnimalType', function ($clinic, $animalType) {
            return $clinic->id === $animalType->clinic_id;
        });

        //Gates AnimalBreed
        Gate::define('findAnimalBreedById', function ($clinic, $animalBreed) {
            return $clinic->id === $animalBreed->clinic_id;
        });

        Gate::define('updateAllAnimalBreedFields', function ($clinic, $animalBreed) {
            return $clinic->id === $animalBreed->clinic_id;
        });

        Gate::define('updateSomeAnimalBreedFields', function ($clinic, $animalBreed) {
            return $clinic->id === $animalBreed->clinic_id;
        });

        Gate::define('removeAnimalBreed', function ($clinic, $animalBreed) {
            return $clinic->id === $animalBreed->clinic_id;
        });

        //Gates Owner
        Gate::define('findOwnerById', function ($clinic, $owner) {
            return $clinic->id === $owner->clinic_id;
        });

        Gate::define('updateAllOwnerFields', function ($clinic, $owner) {
            return $clinic->id === $owner->clinic_id;
        });

        Gate::define('updateSomeOwnerFields', function ($clinic, $owner) {
            return $clinic->id === $owner->clinic_id;
        });

        Gate::define('removeOwner', function ($clinic, $owner) {
            return $clinic->id === $owner->clinic_id;
        });

        //Gates Vet
        Gate::define('findVetById', function ($clinic, $vet) {
            return $clinic->id === $vet->clinic_id;
        });

        Gate::define('updateAllVetFields', function ($clinic, $vet) {
            return $clinic->id === $vet->clinic_id;
        });

        Gate::define('updateSomeVetFields', function ($clinic, $vet) {
            return $clinic->id === $vet->clinic_id;
        });

        Gate::define('removeVet', function ($clinic, $vet) {
            return $clinic->id === $vet->clinic_id;
        });

        //Gates Animal
        Gate::define('findAnimalById', function ($clinic, $animal) {
            return $clinic->id === $animal->clinic_id;
        });

        Gate::define('updateAllAnimalFields', function ($clinic, $animal) {
            return $clinic->id === $animal->clinic_id;
        });

        Gate::define('updateSomeAnimalFields', function ($clinic, $animal) {
            return $clinic->id === $animal->clinic_id;
        });

        Gate::define('removeAnimal', function ($clinic, $animal) {
            return $clinic->id === $animal->clinic_id;
        });

        //Gates Appointment
        Gate::define('findAppointmentById', function ($clinic, $appointment) {
            return $clinic->id === $appointment->clinic_id;
        });

        Gate::define('updateAllAppointmentFields', function ($clinic, $appointment) {
            return $clinic->id === $appointment->clinic_id;
        });

        Gate::define('updateSomeAppointmentFields', function ($clinic, $appointment) {
            return $clinic->id === $appointment->clinic_id;
        });

        Gate::define('removeAppointment', function ($clinic, $appointment) {
            return $clinic->id === $appointment->clinic_id;
        });


        $this->app['auth']->viaRequest('api', function ($request) {

            if ($request->header('Authorization')) {
                return Clinic::where('api_token', $request->header('Authorization'))->first();
            }

        });


    }
}
