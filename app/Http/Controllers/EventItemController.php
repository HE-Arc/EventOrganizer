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

        $eventId = $request->all()['event_id'];


        if($request->has("eventitem")){

            $eventItemsSeparated = $request->all()['eventitem'];

            $event = Event::findOrFail($eventId);

            $valuesCombined = $this->combine_keys_with_arrays($eventItemsSeparated["name"],[
                "id" => $eventItemsSeparated["id"],
                "image_id" => $eventItemsSeparated["image_id"],
                "name" => $eventItemsSeparated["name"],
                "qty_asked" => $eventItemsSeparated["qty_asked"],
                "delete" => $eventItemsSeparated["delete"]
            ]);

            foreach ($valuesCombined as $item){

                //Removes empty fields for default values
                $item = array_filter($item, function($e){
                    return $e !== "";
                });

                //Existing item
                if(array_key_exists("id",$item)){

                    // User wants to delete it or update it?
                    if($item["delete"] === "1"){
                        EventItem::destroy($item["id"]);
                    }else{
                        $evenItemInst = EventItem::find($item["id"]);
                        $evenItemInst->update($item);
                        $event->eventItems()->save($evenItemInst);
                    }
                }else{
                    // New item
                    $evenItemInst = EventItem::create($item);
                    $event->eventItems()->save($evenItemInst);
                }

            }


            $event->save();
        }


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

    private function combine_keys_with_arrays($keys, $arrays) {
        $results = array();

        foreach ($arrays as $subKey => $arr)
        {
           foreach ($keys as $index => $key)
           {
               $results[$key][$subKey] = $arr[$index];
           }
        }
        return $results;
    }
}
