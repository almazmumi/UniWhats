<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function group(){
        return $this->belongsTo("App\Group");
    }

    public function comment(){
        return $this->belongsTo("App\User");
    }
}
