<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal', function (Blueprint $table) {
            $table->increments('id');           
            $table->integer('clinic_id')->unsigned();
            $table->foreign('clinic_id')
                ->references('id')
                ->on('clinic');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')
                ->references('id')
                ->on('owner');
            $table->integer('vet_id')->unsigned();
            $table->foreign('vet_id')
                ->references('id')
                ->on('vet');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')
                ->references('id')
                ->on('animal_type');
            $table->integer('breed_id')->unsigned();
            $table->foreign('breed_id')
                ->references('id')
                ->on('animal_breed');
            $table->string('name', 255);            
            $table->boolean('gender');
            $table->string('notes', 255);  
            $table->string('food_types', 255);
            $table->string('birth_date', 255);
            $table->float('weight', 8, 1);    
            $table->string('color', 255);        
            $table->timestamps();
        });        
    }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
    public function down()
    {
        Schema::dropIfExists('animal');
    }
}
