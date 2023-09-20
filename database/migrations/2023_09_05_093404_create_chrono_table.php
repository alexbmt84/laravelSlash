<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChronoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chrono', function (Blueprint $table) {
            $table->id();
            $table->dateTime('debut')->nullable(false)->useCurrent();
            $table->dateTime('fin')->nullable(true)->useCurrent();
            $table->foreignId('tache_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chrono');
    }
}
