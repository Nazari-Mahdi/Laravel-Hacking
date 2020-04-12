<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
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
        $photo_id = $request->photo_id->store('users-photo');
        User::create([
            'name' => $request -> name ,
            'email' => $request -> email ,
            'role_id' => $request -> role_id,
            'is_active' =>  $request -> is_active,
            'password' => bcrypt('password'),
            'photo_id' => $photo_id,
        ]);

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


    public function update(UpdateUsersRequest $request, $user)
    {
        $data = $request->only(['name' , 'email' , 'role_id' , 'is_active' , 'password']);
        if ($request->has('photo_id')){
            $photo_id = $request->photo_id->store('users-photo');
            unlink(public_path() . "/storage/users-photo/" . $user );
            $data['photo_id'] = $photo_id;
        }
        $user->update($data);

        return redirect()->route('users.index');
    }


    public function destroy($id)
    {
       $user = User::findOrFail($id);

       unlink(public_path() . "/storage/" . $user->photo_id);

       $user->delete();

        return redirect()->route('users.index');
    }
}
