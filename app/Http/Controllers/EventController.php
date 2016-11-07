<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;

class EventController extends Controller
{
    public function show($id){
        return view('event.show', ['event' => Event::findOrFail($id)]);
    }
    public function showCreationPage(){
        return view('event.creation',['event'=> new Event()]);
    }
    public function showEvents(){
        return view('event.usereventlist'/*, ['events' => User::events()]*/);
    }
}
