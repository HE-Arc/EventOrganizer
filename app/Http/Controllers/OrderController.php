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


        //For now, let's assume that
        $user = User::first();

        $order = Order::firstOrCreate([
            "user_id" => $user->id,
            "event_item_id" => EventItem::find($request->get('event_item_id'))->id
        ]);

        $order->qty_taken = $request->get('qty_taken');

        $order->save();

    }
}
