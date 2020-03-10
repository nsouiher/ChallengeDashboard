<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function participantChanllenge() {
        return $this->belongsTo('App\participantChanllenge');
    }
}
