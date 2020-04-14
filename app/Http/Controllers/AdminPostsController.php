<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use voku\helper\ASCII;

class AdminPostsController extends Controller
{

    public function index()
    {
        return view('admin.posts.index' , ['posts' => Post::all()]);
    }


    public function create()
    {
        return view('admin.posts.create' , ['categories' => Category::pluck('name', 'id')->all()]);
    }


    public function store(CreatePostsRequest  $request)
    {
        $date = $request->all();

        if ($file = $request->hasFile('photo_id')){

            $file = $request->file('photo_id');
            $name = $file->getClientOriginalName();
            $file -> move('photos/posts-photo', $name);
            $photo = Photo::create(['file' => $name]);

            $date['photo_id'] = $photo->id;
        }

        Post::create($date);

         return redirect()->route('posts.index');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
