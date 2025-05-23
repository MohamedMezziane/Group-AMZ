<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apprenantId')->constrained('apprenants')->onDelete('cascade');
            $table->foreignId('atelierId')->constrained('ateliers')->onDelete('cascade');
            $table->foreignId('groupeId')->constrained('groupes')->onDelete('cascade');
            $table->string('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}