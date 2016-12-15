<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @property decimal qty_asked
 */
class EventItem extends Model
{
    protected $fillable=['id','name','qty_asked','image_id'];

    public function event(){
        return $this->belongsTo('App\Event');
    }


    public function image(){
        return $this->belongsTo('App\ImageItem');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function qtyFunded(){
        return $this->orders()->sum('qty_taken');
    }

    /**
     * Returns the percentage of completion of this item
     */
    public function completedAt(){
        return ($this->qtyFunded() / $this->qty_asked) * 100;
    }

    public function qtyTakenByUser($user){
        $participant = Participant::byEventAndUser($this->event, $user)->first();

        $order = Order::byItemAndParticipant($this,$participant)->get();

        if(!$order->isEmpty()){
            return $order->first()->qty_taken;
        }else{
            return 0;
        }
    }
}
