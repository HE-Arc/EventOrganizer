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
                "qty_asked" => $eventItemsSeparated["qty_asked"]
            ]);

            foreach ($valuesCombined as $item){

                //Removes empty fields for default values
                $item = array_filter($item, function($e){
                    return $e !== "";
                });

                echo var_dump($item)."<br>";

                if(array_key_exists("id",$item)){
                    $evenItemInst = EventItem::find($item["id"]);
                    $evenItemInst->update($item);
                }else{
                    $evenItemInst = EventItem::create($item);
                }

                $event->eventItems()->save($evenItemInst);
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
