<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Repositories\ProjectsRepository;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $ProjectsRepository;

    public function __construct(ProjectsRepository $ProjectsRepository)
    {
        $this->ProjectRepository= $ProjectsRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = $this->ProjectsRepository->showByID($id);
        return view('Project', compact('Project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->ProjectsRepository->createProjects($request);
        return redirect()->back()->with('success', 'Projects created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = $this->ProjectsRepository->showByID($id);
        return view('server.Projects.show', compact('Projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projects $projects)
    {
        $update =  $this->ProjectsRepository->updateProjects($request, $id);
        if($update) {
         return  redirect()->route('Projects-show', $id)->with('success', 'Project updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $projects)
    {
        $this->ProjectsRepository->deleteProjects($id);
        return redirect()->back()->with('success', 'Project deleted successfully');
    }
}
