<?php

namespace App\Http\Repositories;

use App\Models\Projects;
use Intervention\Image\ImageManager;
use Image;

class ProjectsRepository
{
    public $model;

    public function __construct(Projects $model)
    {
        $this->model = $model ;
    }

    public function createProject($request)
    {
        $request->validate([
            'title' => 'required',
            'post' => 'required|max:225'
        ]);
       // dd($request);
        if ($request->hasFile('passport')) {
            $filenameWithExt = $request->file('passport')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            $extension = $request->file('passport')->getClientOriginalExtension();
            $fileNameToStore = $filename  .'_'.time().'.'.$extension;
            $path = $request->file('passport')->storeAs('public/uploads', $fileNameToStore);
        }
        return  $this->model->create([
            'title' => $request->title,
            'passport' => $fileNameToStore,
            'post' => $request->post,
            'user_id' => auth()->user()->id
        ]);
    }

    public function allProject()
    {
        $this->model->with('user')->paginate(3);
        return $this->model->paginate(5);
    }

    public function showByID($id)
    {
        return $this->model->findOrFail($id);
    }

    public function updateProject($request, $id)
    {
        $request->validate([
            'title' => 'required',
            'passport' =>  'required|image',
            'post' => 'required|max:225'

        ]);
        if ($request->hasFile('passport')) {
            $filenameWithExt = $request->file('passport')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            $extension = $request->file('passport')->getClientOriginalExtension();
            $fileNameToStore = $filename  .'_'.time().'.'.$extension;
            $path = $request->file('passport')->storeAs('public/uploads', $fileNameToStore);
        }
        $this->model->findOrFail($id)->update([
            'title' => $request->title,
            'passport' => $fileNameToStore,
            'post' => $request->post,
           ]);

        return $this->model;
    }

    public function deleteProject($id)
    {
        $this->model->findOrFail($id)->delete();
        return $this->model;
    }
}
