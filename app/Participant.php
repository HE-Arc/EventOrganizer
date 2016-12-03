<?php
/**
 * Created by PhpStorm.
 * User: diogo
 * Date: 12/3/16
 * Time: 10:02 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    protected $fillable = [
        "user",
        "event",
        "user_id",
        "event_id"
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function event(){
        return $this->belongsTo('App\Event');
    }

    public function contributions(){
        return $this->hasMany('App\Order');
    }


    public function scopeByEventAndUser($query,$event,$user){
        return $query->where('event_id',$event->id)
            ->where('user_id',$user->id);
    }
}