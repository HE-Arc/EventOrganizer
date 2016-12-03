<?php

namespace App\Http\Controllers;
use App\Participant;
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


        $order = Order::firstOrCreate([
            "participant_id" => Participant::byUser(auth()->user())->first()->id,
            "event_item_id" => $request->event_item_id
        ]);


        $order->qty_taken = $request->qty_taken;

        $order->save();

    }
}
