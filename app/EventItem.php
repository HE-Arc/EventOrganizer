<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventItem extends Model
{
    protected $fillable=['name','qty_asked'];

    public function event(){
        return $this->belongsTo('App\Event');
    }
}
