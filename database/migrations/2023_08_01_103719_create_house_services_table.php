<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('occupant_id');
            $table->foreign('occupant_id')->references('id')->on('occupants')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->date('date_of_entry');
            $table->string('house_number');
            $table->string('status');
            $table->string('keamanan');
            $table->string('kebersihan');
            $table->text('information');
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
        Schema::dropIfExists('house_services');
    }
}
