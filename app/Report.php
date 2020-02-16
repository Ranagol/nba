<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = ['id'];

    public function teams(){
        return $this->belongsToMany(Team::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
