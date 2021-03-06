<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable= ['user_id', 'group_id', 'commentText'];
    
    public function user(){
        return $this->belongsTo("App\User");

    }
    public function group(){
        return $this->belongsTo("App\Group");

    }
}


