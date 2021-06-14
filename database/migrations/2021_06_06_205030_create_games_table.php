<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
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
            $table->integer('player_id')->unsigned();
            $table->integer('game_number');
            $table->integer('at_bats');
            $table->integer('runs');
            $table->integer('hits');
            $table->integer('walks');
            $table->integer('runs_batted_in');
            $table->timestamps();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function(Blueprint $table) {
            $table->dropForeign('games_player_id_foreign');
        });
        Schema::dropIfExists('games');
    }
}
