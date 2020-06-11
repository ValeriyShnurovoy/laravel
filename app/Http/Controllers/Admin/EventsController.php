<?php

namespace App\Http\Controllers\Admin;

use Redirect;
use App\Events;
use App\Locations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::paginate(25);

        return view('admin.events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Locations::all();
        $locations_selector = [];
        foreach($locations as $location) {
            $locations_selector[$location->id] = $location->location;
        }
        return view('admin.events.create', ['locations_selector' => $locations_selector]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $events = new Events();
        $events->name = $request->name;
        $events->event_date = $request->event_date;
        $events->location_id = $request->location_id;
        $events->save();
        $this->uploadFile($events->id, $request->file('picture'));

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentEvent = Events::find($id);
        $locations = Locations::all();
        $locations_selector = [];
        foreach($locations as $location) {
            $locations_selector[$location->id] = $location->location;
        }

        return view(
            'admin.events.update',
            [
                'currentEvent' => $currentEvent,
                'locations_selector' => $locations_selector,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $events = Events::find($id);
        $events->name = $request->name;
        $events->event_date = $request->event_date;
        $events->location_id = $request->location_id;
        $events->save();

        if (!empty($request->file('picture'))) {
            $this->uploadFile($id, $request->file('picture'));
        }

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Events::find($id)->delete();
        return Redirect::back();
    }

    protected function uploadFile($eventId, $file):void
    {
        if (
            'image/jpg' == strtolower($file->getMimeType())
            || 'image/jpeg' == strtolower($file->getMimeType())
            || 'image/png' == strtolower($file->getMimeType())
        ) {
            $destinationPath = public_path() . '/img';
            $fileName = $eventId.'.'.substr($file->getMimeType(),6);
            $file->move($destinationPath,$fileName);
            $event = Events::find($eventId);
            $event->picture = '/img/'. $fileName;
            $event->save();
        }
    }
}
