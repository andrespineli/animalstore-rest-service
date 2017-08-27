<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('user_name', 255)->unique();
            $table->string('document_number', 255);
            $table->string('password', 255);
            $table->string('email', 255);
            $table->string('cloud_path', 255)->nullable();
            $table->string('my_dump_path', 255)->nullable();
            $table->string('api_token')->nullable();
            $table->dateTime('api_token_expiration')->nullable();
            $table->timestamps();
        });

         $date = new \Carbon\Carbon();
         $date->format('Y-m-d H:i:s');

         DB::table('clinic')->insert(
             array(
                 'name' => 'Administrator',
                 'user_name' => 'admin',
                 'document_number' => '00000000000',
                 'password' => '$2y$10$Zz3YVnfIv2B0dxM6naOzMeiYdGOkC8VELgsLAHOV41HTWjNLXRxtm',
                 'email' => 'admin@vet.com',                 
                 'created_at' => $date,
                 'updated_at' => $date
             )
           );
    }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
    public function down()
    {
        Schema::dropIfExists('clinic');
    }
}
