<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('nom_evenement', 255)->nullable(false);
            $table->string('nom_client', 155)->nullable(false);
            $table->string('duree', 20)->nullable(true);
            $table->text('commentaire')->nullable(true);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('metier_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('evenements');
    }
}
