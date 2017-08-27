<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('id');           
            $table->integer('animal_id')->unsigned();
            $table->foreign('animal_id')
                ->references('id')
                ->on('animal');
            $table->integer('clinic_id')->unsigned();
            $table->foreign('clinic_id')
                ->references('id')
                ->on('clinic');                    
            $table->datetime('appointment_date');
            $table->float('temperature', 8, 1); 
            $table->string('fc', 255);
            $table->string('physical_condition', 255);
            $table->string('hydration', 255);
            $table->datetime('vermifuge_date');
            $table->datetime('rabies_vaccine_date');
            $table->datetime('multipurpose_vaccine_date');
            $table->string('tpc', 255);
            $table->string('fr', 255);
            $table->string('mucosa', 255);
            $table->string('behavior', 500);
            $table->string('anamnesis', 2000);
            $table->string('requested_exams', 500);
            $table->string('diagnosis', 2000);
            $table->string('treatment', 2000);           
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
        Schema::dropIfExists('appointment');
    }
}
