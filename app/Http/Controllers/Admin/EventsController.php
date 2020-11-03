<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use LaravelFullCalendar\Facades\Calendar;

class EventsController extends Controller
{

    public function showCalendar() {
        $title = "MPP Admin - Calendar";

        $events = Event::all();
        $event = [];

        foreach ($events as $data) {
            $event[] = Calendar::event(
                $data->title,
                false,
                new \DateTime($data->start),
                new \DateTime($data->end),
                $data->id,
                [
                    'color' => $data->color,
                ]
            );
        }

        $calendar = Calendar::addEvents($event);


        return view('admin.events.calendar', [
            'title'    => $title,
            'calendar' => $calendar
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $title = "MPP Admin - Events";

        $events = Event::latest()->get();

        return view('admin.events.index', [
            'title'  => $title,
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "MPP Admin - Create Event";

        return view('admin.events.create', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'color' => 'required',
            'start' => 'required',
            'end'   => 'required'
        ]);

        Event::create([
            'title'      => $request->title,
            'color'      => $request->color,
            'start'      => $request->start,
            'end'        => $request->end,
            'created_at' => Carbon::now()
        ]);

        toast('Event Created!', 'success');

        return redirect()->route('events.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $title = "MPP Admin - Edit Event";
        $event = Event::find($id);

        return view('admin.events.edit', [
            'title' => $title,
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'color' => 'required',
            'start' => 'required',
            'end'   => 'required'
        ]);

        Event::find($id)->update([
            'title' => $request->title,
            'color' => $request->color,
            'start' => $request->start,
            'end'   => $request->end,
        ]);

        toast('Event Updated!', 'success');

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id) {
        Event::find($id)->delete();

        toast('Event Deleted!', 'warning');

        return redirect()->route('events.index');
    }
}
