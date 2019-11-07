<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Domain;
use App\UserEvent;
use App\User;
use App\Level;
use App\Category;
use App\Club;


class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('images')->get();
        //dd($clubs);


        $userno = UserEvent::all();

        return view('admin.event.index', ['events' => $events, 'userno' => $userno]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all(['id', 'name']);
        $domains = Domain::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        $clubs = Club::all(['id', 'name']);

        return view('admin.event.create', ['levels' => $levels, 'domains' => $domains, 'categories' => $categories, 'clubs' => $clubs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $model
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $model)
    {
        $model->create($request->all());

        return redirect()->route('admin.event.index')->withStatus(__('Event successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $levels = Level::all(['id', 'name']);
        $domains = Domain::all(['id', 'name']);
        $categories = Category::all(['id', 'name']);
        $clubs = Club::all(['id', 'name']);

        return view('admin.event.edit', compact('event', 'levels', 'domains', 'categories', 'clubs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $event->update($request->all());

        return redirect()->route('admin.event.index')->withStatus(__('Event successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.event.index')->withStatus(__('Event successfully deleted.'));
    }
}
