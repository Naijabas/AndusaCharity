<?php

namespace App\Http\Repositories;

use App\Models\UpcomingEvents;
use Intervention\Image\ImageManager;
use Image;

class UpcomingEventsRepository
{
    public $model;

    public function __construct(Upcomingevents $model)
    {
        $this->model = $model;
    }

    public function createUpcomingevents($request)
    {
        $request->validate([
            'title' => 'required',
            'passport' =>'required|image',
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
            'post' => $request->post,
            'user_id' => auth()->user()->id
        ]);
    }

    public function allUpcomingevents()
    {
        $this->model->with('user')->paginate(3);
        return $this->model->paginate(2);
    }

    public function showByID($id)
    {
        
        return $this->model->findOrFail($id);
    }

    public function updateUpcomingevents($request, $id)
    {
        $request->validate([
            'title' => 'required',
            'passport' =>'required|image',
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
            'post' => $request->post,
            'user_id' => auth()->user()->id,
            'passport' => $fileNameToStore
           ]);

        return $this->model;
    }

    public function deleteUpcomingevents($id)
    {
        $this->model->findOrFail($id)->delete();
        return $this->model;
    }
}
