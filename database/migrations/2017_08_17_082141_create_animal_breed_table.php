<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalBreedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_breed', function (Blueprint $table) {
            $table->increments('id');           
            $table->integer('clinic_id')->unsigned();
            $table->foreign('clinic_id')
                ->references('id')
                ->on('clinic');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')
                ->references('id')
                ->on('animal_type');
            $table->string('name', 255);         
            $table->string('notes', 1000);                     
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
        Schema::dropIfExists('animal_breed');
    }
}
