<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'eventItem',
        'user',
        'qty_asked',
        'participant_id', //Unfortunately I have to include ids coz firstOrCreate needs them... please don't kill me for that
        'event_item_id'
    ];

    public function eventItem(){
        return $this->belongsTo('App\EventItem');
    }

    public function participant(){
        return $this->belongsTo('App\Participant');
    }

    public function scopeByItemAndParticipant($query,$item,$participant){
        return $query->where('event_item_id',$item->id)->where('participant_id',$participant->id);
    }
}
