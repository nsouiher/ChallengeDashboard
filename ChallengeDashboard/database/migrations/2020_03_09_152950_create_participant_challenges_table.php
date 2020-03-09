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
           
            
            $table->integer('user_id');
            $table->integer('challenge_id');
            $table->primary('user_id', 'challenge_id');

            $table->foreign('user_id')->references('user_id')->on('users');
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
