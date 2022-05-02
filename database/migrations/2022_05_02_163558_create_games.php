<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('host_id')
                ->nullable(false);
            $table->unsignedBigInteger('opponent_id')
                ->nullable(false);
            $table->boolean('is_host_turn')
                ->nullable(false)
                ->default(false);
            $table->enum('status', ['pending', 'rejected', 'ongoing', 'win', 'lose', 'tie'])
                ->nullable(false)
                ->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
