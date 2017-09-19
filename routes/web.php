<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//welcome group
$app->group(['middleware'=>['cors']], function () use ($app) {

    //home
    $app->get('/', 'WelcomeController@WelcomePage');

});

//public group
$app->group(['prefix' => 'api/v1', 'middleware'=>['cors']], function () use ($app) {

    //home
    $app->get('/', 'WelcomeController@WelcomePage');

    //register
    $app->post('clinics', 'ClinicController@createClinic');

    //authentication
    $app->post('clinics/login', 'LoginController@clinicLogin');

});

//authenticated group
$app->group(['prefix' => 'api/v1', 'middleware' => ['cors', 'auth', 'token-expired']], function () use ($app) {

    //clinics/refresh-token
    $app->get('clinics/refresh-token', 'TokenController@refreshAuthToken');

    //clinics/token-validator
    $app->get('clinics/token-validator', 'TokenController@tokenValidator');

    //clinics
    $app->get('clinics', 'ClinicController@getClinic');
    $app->get('clinics/statistics', 'ClinicController@getClinicAndStatistics');
    $app->get('clinics/{clinicId}', 'ClinicController@findClinicById');
    $app->put('clinics', 'ClinicController@updateAllClinicFields');
    $app->patch('clinics', 'ClinicController@updateSomeClinicFields');
    $app->patch('clinics/username', 'ClinicController@updateUserName');
    $app->patch('clinics/password', 'ClinicController@updatePassword');
    $app->delete('clinics/{clinicId}', 'ClinicController@removeClinic');

    //vet
    $app->get('vets', 'VetController@getVets');
    $app->get('vets/{vetId}', 'VetController@findVetById');
    $app->post('vets', 'VetController@createVet');
    $app->put('vets/{vetId}', 'VetController@updateAllVetFields');
    $app->patch('vets/{vetId}', 'VetController@updateSomeVetFields');
    $app->delete('vets/{vetId}', 'VetController@removeVet');

    //owner
    $app->get('owners', 'OwnerController@getOwners');
    $app->get('owners/animals', 'OwnerController@getOwnersWithAnimals');
    $app->get('owners/{ownerId}', 'OwnerController@findOwnerById');
    $app->get('owners/{ownerId}/animals', 'OwnerController@getAnimalsOfOwner');
    $app->post('owners', 'OwnerController@createOwner');
    $app->put('owners/{ownerId}', 'OwnerController@updateAllOwnerFields');
    $app->patch('owners/{ownerId}', 'OwnerController@updateSomeOwnerFields');
    $app->delete('owners/{ownerId}', 'OwnerController@removeOwner');

    //animal/types
    $app->get('animals/types', 'AnimalTypeController@getAnimalsTypes');
    $app->get('animals/types/{animalTypeId}', 'AnimalTypeController@findAnimalTypeById');
    $app->get('animals/types/{animalTypeId}/breeds', 'AnimalTypeController@findBreedsByTypeId');
    $app->post('animals/types', 'AnimalTypeController@createAnimalType');
    $app->put('animals/types/{animalTypeId}', 'AnimalTypeController@updateAllAnimalTypeFields');
    $app->patch('animals/types/{animalTypeId}', 'AnimalTypeController@updateSomeAnimalTypeFields');
    $app->delete('animals/types/{animalTypeId}', 'AnimalTypeController@removeAnimalType');

    //animal/breeds
    $app->get('animals/breeds', 'AnimalBreedController@getAnimalsBreeds');
    $app->get('animals/breeds/{animalBreedId}', 'AnimalBreedController@findAnimalBreedById');
    $app->post('animals/breeds', 'AnimalBreedController@createAnimalBreed');
    $app->put('animals/breeds/{animalBreedId}', 'AnimalBreedController@updateAllAnimalBreedFields');
    $app->patch('animals/breeds/{animalBreedId}', 'AnimalBreedController@updateSomeAnimalBreedFields');
    $app->delete('animals/breeds/{animalBreedId}', 'AnimalBreedController@removeAnimalBreed');

    //animal
    $app->get('animals', 'AnimalController@getAnimals');
    $app->get('animals/{animalId}', 'AnimalController@findAnimalById');
    $app->post('animals', 'AnimalController@createAnimal');
    $app->put('animals/{animalId}', 'AnimalController@updateAllAnimalFields');
    $app->patch('animals/{animalId}', 'AnimalController@updateSomeAnimalFields');
    $app->delete('animals/{animalId}', 'AnimalController@removeAnimal');

    //appointment
    $app->get('animals/{animalId}/appointments', 'AppointmentController@getAnimalAppointments');
    $app->get('appointments/{appointmentId}', 'AppointmentController@findAppointmentById');
    $app->post('appointments', 'AppointmentController@createAppointment');
    $app->put('appointments/{appointmentId}', 'AppointmentController@updateAllAppointmentFields');
    $app->patch('appointments/{appointmentId}', 'AppointmentController@updateSomeAppointmentFields');
    $app->delete('appointments/{appointmentId}', 'AppointmentController@removeAppointment');

    //printable
    $app->get('printable/services/{animalId}', 'AnimalController@getServiceSheet');
    $app->get('printable/appointments/{animalId}/{appointmentId}', 'AppointmentController@getAppointmentSheet');

    //budget
    $app->get('budgets', 'BudgetController@getBudgets');
    $app->get('budgets/{budgetId}', 'BudgetController@findBudgetById');
    $app->post('budgets', 'BudgetController@createBudget');
    $app->put('budgets/{budgetId}', 'BudgetController@updateAllBudgetFields');
    $app->delete('budgets/{budgetId}', 'BudgetController@removeBudget');

    //appointment/budget
    $app->get('appointments/{appointmentId}/budgets', 'BudgetAppointmentController@getBudgetsAppointments');
    $app->get('appointments/{appointmentId}/budgets/{budgetId}', 'BudgetAppointmentController@findBudgetAppointmentById');
    $app->post('appointments/{appointmentId}/budgets', 'BudgetAppointmentController@createBudgetAppointment');
    $app->put('appointments/{appointmentId/budgets/{budgetId}', 'BudgetAppointmentController@updateAllBudgetAppointmentFields');
    $app->delete('appointments/{appointmentId}/budgets/{budgetId}', 'BudgetAppointmentController@removeBudgetAppointment');

});
