<?php

namespace App\Http\Controllers;

use App\Event;
use App\Participant;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    public function show($id){

        Participant::firstOrCreate([
            "user_id" => auth()->user()->id,
            "event_id" => Event::find($id)->id
        ]);

        return view('event.show', ['event' => Event::with('eventItems.orders')->find($id),'user' => auth()->user()]);
    }
    public function showCreationPage(){
        return view('event.creation',['event'=> new Event()]);
    }

    //No user management for the moment
    public function showEvents(){
        return view('event.usereventlist', ['user' => auth()->user()]);
    }
    public function store(Request $request){
        //dd($request);
        //validation
        $this->validate($request, [
            'name'=>'required|max:20',
            'description'=>'required',
            'date'=>'required',
            'location'=>'required'
        ]);
        $event = Event::create($request->all());
        $event->user()->associate(auth()->user());
        $event->save();
        return redirect("event/$event->id");
    }
}
