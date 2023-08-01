<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupants', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number');
            $table->string('name');
            $table->string('nik');
            $table->string('jkn')->nullable();
            $table->string('job');
            $table->integer('age');
            $table->string('gender')->nullable();
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('phone_number');
            $table->text('address');
            $table->string('status_tinggal');
            $table->string('additional_information');
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
        Schema::dropIfExists('occupants');
    }
}
