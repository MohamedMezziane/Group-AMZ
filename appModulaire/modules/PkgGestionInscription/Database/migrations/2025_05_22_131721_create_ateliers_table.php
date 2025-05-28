<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAteliersTable extends Migration
{
    public function up()
    {
        Schema::create('ateliers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('description');
            $table->dateTime('dateDebut');
            $table->dateTime('dateFin');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ateliers');
    }
}

