<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $primaryKey = 'id';
    public $timestamps = true;

    public function comments(){
        return $this->hasMany("App\Comment");
    }

    public function user(){
        return $this->belongsTo("App\User");
    }


    public function university(){
        return $this->hasOne("App\University");
    }
}
