<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name','description','date','location','user'];

    public function admin(){
        return $this->belongsTo('App\User');
    }
    public function eventItems(){
        return $this->hasMany('App\EventItem');
    }

    public function participants(){
        return $this->hasMany('App\Participant');
    }

}
