<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @property decimal qty_asked
 */
class EventItem extends Model
{
    protected $fillable=['name','qty_asked'];

    public function event(){
        return $this->belongsTo('App\Event');
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
        $order = $this->orders()->where("user_id",$user->id)->get();

        if($order->isEmpty()){
            return 0;
        }else{
            return $order->first()->qty_taken;
        }
    }
}
