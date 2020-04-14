@extends('layouts.admin')
@section('content')

    <h1> Posts </h1>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">User</th>
            <th scope="col"> Title </th>
            <th scope="col">Body</th>
            <th scope="col">Category_id</th>
            <th scope="col">photo_id</th>
            <th scope="col">Created At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td> <img width="80" height="80" class="rounded-circle" src="{{  $post->photo->file }}"> </td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->category ? $post->category->name : 'No Category' }}</td>
                <td>{{ $post->photo_id }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a href="{{route('posts.edit' , $post->id)}}"> Edit </a>
                    <form action="{{route('posts.destroy' , $post->id)}}" method="post" style="display: inline-block ; padding-left: 5px">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-danger"> Delete </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
