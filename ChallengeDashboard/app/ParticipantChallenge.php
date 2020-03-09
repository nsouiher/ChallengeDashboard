<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantChallenge extends Model
{
    //
    public function users() {
        return $this->hasMany('App\User');
    }
    public function challenges() {
        return $this->hasMany('App\Challenge');
    }
}
