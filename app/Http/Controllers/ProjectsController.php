<?php

namespace App\Http\Controllers;
use App\Http\Repositories\Projects;

use Illuminate\Http\Request;
use App\Models\Project;
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
        $this->ProjectsRepository = $ProjectsRepository;
    }


    public function index2()
    {

    return view('projects', compact('projects'));

    }

    public function index()
    {
    $projects = $this->ProjectsRepository->allProject();
    return view('server.projects.index', compact('projects'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->ProjectsRepository->createProject($request);
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
        $project = $this->ProjectsRepository->showByID($id);
        return view('server.projects.show', compact('project'));
    }

    public function projects($id)
    {

        $project = $this->ProjectsRepository->showByID($id);
        return view('projects', compact('project'));
    }


    public function update(Request $request,$id)
    {
        $update =  $this->ProjectsRepository->updateProject($request, $id);
        if($update) {
         return  redirect()->route('project-show', $id)->with('success', 'Project updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ProjectsRepository->deleteProject($id);
        return redirect()->back()->with('success', 'Project deleted successfully');
    }
}
