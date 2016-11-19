<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name','description','date','location','user'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function eventItems(){
        return $this->hasMany('App\EventItem');
    }
}
