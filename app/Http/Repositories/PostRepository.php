<?php

namespace App\Http\Repositories;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class PostRepository
{
    public $model;

    public function __construct(Post $model)
    {
        $this->model = $model ;

    }

    public function createPost($request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'banner_image' => 'required|image'


            ]);
            if ($request->hasFile('banner_image')) {
            $filenameWithExt = $request->file('banner_image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            $extension = $request->file('banner_image')->getClientOriginalExtension();
            $fileNameToStore = $filename  .'_'.time().'.'.$extension;
            $path = $request->file('banner_image')->storeAs('public/uploads', $fileNameToStore);
        }
        return  $this->model->create([
            'title' => $request->title,
            'body' =>  $request->body,
            'banner_image' =>  $fileNameToStore,
            'user_id' => auth()->user()->id
            // 'user_id' => $request->input(auth()->user()->id),

            ]);
    }

    public function allPost()
    {
        return $this->model->paginate(10);
    }

    public function showByID($id)
    {
        return $this->model->findOrFail($id);
    }

    public function updatePost($request, $id)
    {
        $request->validate([
            'title' => 'required',
            'banner_image' => 'required',
            'body' => 'required',
        ]);

        $this->model->findOrFail($id)->update([
            'title' => $request->title,
            'banner_image' => $request->banner_image,
            'body'  => $request->body
        ]);
        return $this->model;
    }

    public function deletePost($id)
    {
        $this->model->findOrFail($id)->delete();
        return $this->model;
    }
}
