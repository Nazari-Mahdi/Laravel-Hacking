@extends('layouts.admin')
@section('content')

    <h1> Users </h1>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td> <img width="50" height="50" class="rounded-circle" src="{{ asset('storage/' . $user->photo_id ) }}"> </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <a href="{{route('users.edit' , $user->id)}}"> Edit </a>
                    <form action="{{route('users.destroy' , $user->id)}}" method="post" style="display: inline-block ; padding-left: 5px">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-danger"> Delete </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
