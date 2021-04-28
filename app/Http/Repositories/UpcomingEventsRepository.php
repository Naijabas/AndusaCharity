<?php

namespace App\Http\Repositories;

use App\Models\UpcomingEvents;
use Intervention\Image\ImageManager;
use Image;

class UpcomingEventsRepository
{
    public $model;

    public function __construct(UpcomingEvents $model)
    {
        $this->model = $model;
    }

    public function createUpcomingEvents($request)
    {
        $request->validate([
            'title' => 'required',
            'post' => 'required|max:225'

        ]);
      
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
            'post' => $request->post
        ]);
    }

    public function allUpcomingEvents()
    {
        return $this->model->paginate(2);
    }

    public function showByID($id)
    {
        return $this->model->findOrFail($id);
    }

    public function updateUpcomingEvents($request, $id)
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

    public function deleteUpcomingEvents($id)
    {
        $this->model->findOrFail($id)->delete();
        return $this->model;
    }
}
