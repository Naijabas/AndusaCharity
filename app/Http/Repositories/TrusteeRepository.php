<?php

namespace App\Http\Repositories;

use App\Models\Trustee;
use Intervention\Image\ImageManager;
use Image;

class TrusteeRepository
{
    public $model;

    public function __construct(Trustee $model)
    {
        $this->model = $model ;
    }

    public function createTrustee($request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:trustees',
            'phone' => 'required|unique:trustees',
            'passport' => 'required|image',
            'occupation' => 'required',
            'post' => 'required',
            'address' => 'required',
            'bio' => 'required'
        ]);
        if ($request->hasFile('passport')) {
            $filenameWithExt = $request->file('passport')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            $extension = $request->file('passport')->getClientOriginalExtension();
            $fileNameToStore = $filename  .'_'.time().'.'.$extension;
            $path = $request->file('passport')->storeAs('public/uploads', $fileNameToStore);
        }
        return  $this->model->create([
            'name' => $request->name,
            'email' =>  $request->email,
            'phone' => $request->phone,
            'passport' => $fileNameToStore,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'post' => $request->post,
            'bio' => $request->bio
        ]);
    }

    public function allTrustee()
    {
        return $this->model->paginate(5);
    }

    public function showByID($id)
    {
        return $this->model->findOrFail($id);
    }

    public function updateTrustee($request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'occupation' => 'required',
            'passport' =>  'required|image',
            'address' => 'required',
            'post' => 'required',
            'bio' => 'required'
        ]);
        if ($request->hasFile('passport')) {
            $filenameWithExt = $request->file('passport')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            $extension = $request->file('passport')->getClientOriginalExtension();
            $fileNameToStore = $filename  .'_'.time().'.'.$extension;
            $path = $request->file('passport')->storeAs('public/uploads', $fileNameToStore);
        }
        $this->model->findOrFail($id)->update([
            'name' => $request->name,
            'email' =>  $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'passport' => $fileNameToStore,
            'post' => $request->post,
            'bio' => $request->bio
        ]);

        return $this->model;
    }

    public function deleteTrustee($id)
    {
        $this->model->findOrFail($id)->delete();
        return $this->model;
    }
}
