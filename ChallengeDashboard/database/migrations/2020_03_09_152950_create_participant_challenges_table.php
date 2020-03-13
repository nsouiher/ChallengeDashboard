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
           
            $table->integer('id')->autoIncrement();
            $table->integer('user_id');
            $table->integer('challenge_id');
            $table->string('participant_code');
            $table->string('is_Winner');
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
