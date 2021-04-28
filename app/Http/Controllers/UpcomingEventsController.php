<?php

namespace App\Http\Controllers;


//use App\Http\Controllers\UpcomingEventsRepository;
use Illuminate\Http\Request;
use App\Http\Repositories\UpcomingEventsRepository;

class UpcomingEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $UpcomingEventsRepository;

    public function  __construct(UpcomingEventsRepository $UpcomingEventsRepository)
    {
        $this->UpcomingEventsRepository = $UpcomingEventsRepository;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function event(){
         
        return view('event', compact('upcomingEvents'));

    }

    public function index()
    {
    $upcomingEvents = $this->UpcomingEventsRepository->allUpcomingEvents();
    return view('server.upcomingEvent.index', compact('upcomingEvent'));

    }

    // public function upcomingEvents($id)
    // {
    //    $upcomingEvents = $this->UpcomingEventsRepository->showByID($id);
    //     return view('upcomingEvent', compact('upcomingEvent'));
    // }


    public function show($id)
      {
        $upcomingEvents = $this->UpcomingEventsRepository->showByID($id);
        return view('server.upcomingEvent.show', compact('upcomingEvents'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpcomingEvents  $upcomingEvents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update =  $this->UpcomingEventsRepository->updateUpcomingEvents($request, $id);
        if($update) {
         return  redirect()->route('upcomingEvent-show', $id)->with('success', ' upcoming Events updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpcomingEvents  $upcomingEvents
     * @return \Illuminate\Http\Response
     */
    public function destroydestroy($id)
    {
        $this->UpcomingEventsRepository->deleteUpcomingEvents($id);
        return redirect()->back()->with('success', 'upcoming Events deleted successfully');
    }
}
