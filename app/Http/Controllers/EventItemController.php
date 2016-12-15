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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
       /* $this->validate($request, [
            'name'=>'required|max:30',
            'qty_asked'=>'required'
        ]);*/

        $eventId = $request->all()['event_id'];
        foreach($request->all()['eventitem'] as $key=>$r){
            if(is_array($r)){
               /* echo "<pre>";
                echo print_r($r);
                echo "</pre>";*/
               /* if($r->exists()){
                    
                }
                else{
                    
                }*/
                $eventitem =EventItem::create($r);
                $eventitem->event()->associate(Event::findOrFail($eventId));
                $eventitem->save();
            }
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
        //$eventItem = new EventItem();
        $images = Imageitem::all();
        return view('eventitems.eventitems', compact('event','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
