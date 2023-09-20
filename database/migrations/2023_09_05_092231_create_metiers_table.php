<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metiers', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 120)->nullable(false);
            $table->string('couleur', 120)->nullable(false);
            $table->string('icone', 120)->nullable(false);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('sphere_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('metiers');
    }
}
