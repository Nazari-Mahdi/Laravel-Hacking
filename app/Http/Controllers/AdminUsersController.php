<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{

    public function index()
    {
        return view('admin.users.index' , ['users' => User::all()]);
    }

    public function create()
    {
        return view('admin.users.create', ['roles' => Role::pluck('name' ,'id')->all()]);
    }


    public function store(CreateUsersRequest $request)
    {
        $data = $request->all();

        if ( $file = $request->hasFile('photo_id')){

            $file = $request->file('photo_id');

            $name = $file->getClientOriginalName();

            $file->move('photos/users-photo' , $name);
            $photo = Photo::create(['file' => $name ]);

            $data['photo_id'] = $photo->id ;
        }

        $data['password'] = bcrypt($request->password);

        User::create($data);


        return redirect()->route('users.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('admin.users.edit', ['roles' => Role::pluck('name' ,'id')->all() , 'user' => User::findOrFail($id)]);
    }


    public function update(UpdateUsersRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $data= $request->all();

        if ($file = $request->hasFile('photo_id')){
            $file = $request->file('photo_id');
            $name = $file->getClientOriginalName();
            $file->move('photos/users-photo' , $name);
            $photo = Photo::create(['file' => $name ]);

            $data['photo_id'] = $photo->id;
        }
        $data['password'] = bcrypt($request->password);

        $user->update($data);


        return redirect()->route('users.index');
    }


    public function destroy($id)
    {
       $user = User::findOrFail($id);

       unlink(public_path('photos/users-photo') . $user->photo->file);

       $user->delete();

        return redirect()->route('users.index');
    }
}
