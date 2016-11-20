<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['eventItem','user','qty_asked'];

    public function eventItem(){
        return $this->belongsTo('App\EventItem');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
