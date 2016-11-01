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
}
