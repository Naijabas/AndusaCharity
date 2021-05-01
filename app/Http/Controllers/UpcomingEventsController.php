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

        return view('event', compact('upcomingevents'));

    }

    public function index()
    {
    $upcomingevents = $this->UpcomingEventsRepository->allUpcomingevents();
    return view('server.upcomingevent.index', compact('upcomingevents'));

    }

    public function upcomingevents($id)
    {
       $upcomingevent = $this->UpcomingEventsRepository->showByID($id);
        return view('upcomingevent', compact('upcomingevent'));
    }


    public function show($id)
      {
        $upcomingevent = $this->UpcomingEventsRepository->showByID($id);
        return view('server.upcomingevent.show', compact('upcomingevent'));
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
     {
        $this->UpcomingEventsRepository->createUpcomingevents($request);
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
        $update =  $this->UpcomingEventsRepository->updateUpcomingevents($request, $id);
        if($update) {
         return  redirect()->route('upcomingevents-show', $id)->with('success', ' upcoming Events updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpcomingEvents  $upcomingEvents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->UpcomingEventsRepository->deleteUpcomingevents($id);
        return redirect()->back()->with('success', 'upcoming Events deleted successfully');
    }
}
