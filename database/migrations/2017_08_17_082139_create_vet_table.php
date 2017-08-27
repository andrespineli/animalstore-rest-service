<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('vet', function (Blueprint $table) {
            $table->increments('id');           
            $table->integer('clinic_id')->unsigned();
            $table->foreign('clinic_id')
                ->references('id')
                ->on('clinic');
            $table->string('name', 255);            
            $table->string('document_number', 255);
            $table->string('email', 255);          
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
        Schema::dropIfExists('vet');
    }
}
