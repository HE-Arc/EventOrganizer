<?php

namespace App\Http\Controllers;

use App\EventItem;
use App\Imageitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Event;

class EventItemController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // TODO: validations !
       $fields = [
           "id",
           "name",
           "qty_asked",
           "image_id"
       ];


        $eventId = $request->all()['event_id'];
        $event = Event::findOrFail($eventId);
        $eventItems = $request->all()['eventitem'];

        // Very quick and dirty, TODO: do this better...
        for($i=0;$i < count($eventItems); $i+= count($fields)){
            $fieldsValues = [];

            for($j=0;$j<count($fields);$j++){

                $value = array_values($eventItems[$i+$j])[0];

                if($value !== "")
                    $fieldsValues[array_keys($eventItems[$i+$j])[0]] = $value;

            }

            if(array_key_exists("id",$fieldsValues)){
                $evenItemInst = EventItem::find($fieldsValues["id"]);
                $evenItemInst->update($fieldsValues);
            }else{
                $evenItemInst = EventItem::create($fieldsValues);
            }

            $event->eventItems()->save($evenItemInst);

        }

        $event->save();

        return redirect("/event/$eventId");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $event = Event::with('eventItems')->find($request->id);
        $images = Imageitem::all();
        return view('eventitems.eventitems', compact('event','images'));
    }
}
