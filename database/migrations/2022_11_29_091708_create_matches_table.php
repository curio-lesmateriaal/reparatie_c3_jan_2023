<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team1_id')->nullable()->references('id')->on('teams');
            $table->foreignId('team2_id')->nullable()->references('id')->on('teams');
            $table->integer('team1_score')->nullable();
            $table->integer('team2_score')->nullable();
            $table->string('field');
            $table->foreignId('referee_id')->nullable()->references('id')->on('users');
            $table->string('start_time')->nullable();
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
        Schema::dropIfExists('matches');
    }
};
