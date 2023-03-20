<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petient', function (Blueprint $table) {
            $table->increments('petient_id');
            $table->string('petient_fname',30);
            $table->string('petient_lname',15);
            $table->integer('patient_age')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->integer('patient_gender')->comment('1=>Male.2=>Female');
            $table->string('patient_number', 100);
            $table->tinyInteger('is_active')->default(0);
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
        Schema::dropIfExists('petient');
    }
}
