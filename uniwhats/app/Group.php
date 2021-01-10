<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'department_id', 'courseCode', 'url', 'isGeneral', 'instructorName', 'sectionNumber', 'user_id'
    ];

    public function user(){
        return $this->belongsTo("App\User");
    }
    public function department(){
        return $this->belongsTo('App\Department');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // Comments
    // Votes
    
}
