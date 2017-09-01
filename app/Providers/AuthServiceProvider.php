<?php

namespace App\Providers;

use App\Models\Animal;
use App\Models\AnimalBreed;
use App\Models\AnimalType;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\Owner;
use App\Models\Vet;
use App\Policies\AnimalBreedPolicy;
use App\Policies\AnimalPolicy;
use App\Policies\AnimalTypePolicy;
use App\Policies\AppointmentPolicy;
use App\Policies\OwnerPolicy;
use App\Policies\VetPolicy;
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
        //
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

        Gate::policy(Animal::class, AnimalPolicy::class);
        Gate::policy(AnimalBreed::class, AnimalBreedPolicy::class);
        Gate::policy(AnimalType::class, AnimalTypePolicy::class);
        Gate::policy(Appointment::class, AppointmentPolicy::class);
        Gate::policy(Owner::class, OwnerPolicy::class);
        Gate::policy(Vet::class, VetPolicy::class);

        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header('Authorization')) {
                return Clinic::where('api_token', $request->header('Authorization'))->first();
            }
        });


    }
}
