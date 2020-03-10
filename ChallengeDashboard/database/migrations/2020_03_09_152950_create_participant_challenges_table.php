<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_challenges', function (Blueprint $table) {
           
            
            $table->integer('id');
            $table->integer('challenge_id');
            $table->primary('id', 'challenge_id');
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('challenge_id')->references('challenge_id')->on('challenges');
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
        Schema::dropIfExists('participant_challenges');
    }
}
