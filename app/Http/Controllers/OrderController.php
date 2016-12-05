<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\EventItem;

class OrderController extends Controller
{
    public function userTakes(Request $request){

        $this->validate($request, [
            'qty_taken' => 'required|min:0|numeric',
            'event_item_id' => 'required|numeric|min:0',
        ]);

        $user = auth()->user();


        /*
        $order = $user->orders()->firstOrCreate([
            "eventItems" => EventItem::find($request->get('event_item_id'))
        ]);
        */



        $eventItem = EventItem::find($request->get('event_item_id'));


        //TODO: do this better

        $order = Order::where("user_id",$user->id)->where("event_item_id",$eventItem->id)->get();


        if($order->isEmpty()){
            $order = new Order();
            $order->user()->associate($user);
            $order->eventItem()->associate($eventItem);
        }else{
            $order = $order->first();
        }


        $order->qty_taken = $request->get('qty_taken');

        $order->save();

    }
}
