<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner', function (Blueprint $table) {
            $table->increments('id');           
            $table->integer('clinic_id')->unsigned();
            $table->foreign('clinic_id')
                  ->references('id')
                  ->on('clinic');
            $table->string('name', 255);            
            $table->string('document_number_cpf', 11);
            $table->string('document_number_rg', 11);
            $table->boolean('gender');
            $table->date('birth_date');
            $table->string('email', 255);
            $table->string('phone_number', 11);
            $table->string('cell_number', 11);
            $table->string('address', 255);
            $table->string('city', 60);
            $table->string('state', 2);
            $table->string('postal_code', 11);                     
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
        Schema::dropIfExists('owner');
    }
}
