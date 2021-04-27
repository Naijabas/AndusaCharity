<?php

namespace App\Http\Controllers;

use App\Models\UpcomingEvents;
use Illuminate\Http\Request;

class UpcomingEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $UpcomingEventsRepository;

    public function __construct(UpcomingEventsRepository $UpcomingEventsRepository)
    {
        $this->UpcomingEventsRepository = $UpcomingEventsRepository;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upcomingEvents($id)
    {
       $upcomingEvents = $this->UpcomingEventsRepository->showByID($id);
        return view('upcomingEvent', compact('upcomingEvent'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $this->UpcomingEventsRepository->createUpcomingEvents($request);
        return redirect()->back()->with('success', 'Upcoming Events created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpcomingEvents  $upcomingEvents
     * @return \Illuminate\Http\Response
*/


    public function show($id)
      {
        $upcomingEvents = $this->UpcomingEventsRepository->showByID($id);
        return view('server.upcomingEvent.show', compact('upcomingEvents'));
      }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpcomingEvents  $upcomingEvents
     * @return \Illuminate\Http\Response
     */
    public function edit(UpcomingEvents $upcomingEvents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpcomingEvents  $upcomingEvents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpcomingEvents $upcomingEvents)
    {
        $update =  $this->UpcomingEventsRepository->updateUpcomingEvents($request, $id);
        if($update) {
         return  redirect()->route('upcomingEvent-show', $id)->with('success', 'Post updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpcomingEvents  $upcomingEvents
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpcomingEvents $upcomingEvents)
    {
        $this->UpcomingEventsRepository->deleteUpcomingEvents($id);
        return redirect()->back()->with('success', 'upcomingEvents deleted successfully');
    }
}
