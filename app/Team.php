<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = ['id'];
    
    public function players(){
        return $this->hasMany(Player::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function reports(){
        return $this->hasMany(Report::class);
    }

}
