<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_games', function (Blueprint $table) {
            $table->integer('id');
            $table->string('type')->nullable();
            $table->string('rating')->nullable();
            $table->json('alternate_names')->nullable();
            $table->boolean('is_expansion')->nullable();
            $table->integer('play_time')->nullable();
            $table->integer('min_play_time')->nullable();
            $table->integer('max_play_time')->nullable();
            $table->integer('min_players')->nullable();
            $table->integer('max_players')->nullable();
            $table->integer('min_age')->nullable();

            $table->foreign('id')->references('id')->on('assets');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('board_games');
    }
}
