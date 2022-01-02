@extends('admin.layout')
@section('content')
    <table class="table align-middle">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
        </tbody>
    </table>
    <h2 style="text-align: center">Tasks List</h2>
    <table class="table align-middle">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Start_date</th>
                <th scope="col">Due_date</th>
                <th scope="col">Assignee</th>
                <th scope="col">Estimate</th>
                <th scope="col">Actual</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->tasks as $tasks)
                <tr>
                    <td>{{ $tasks->id }}</td>
                    <td>{{ $tasks->title }}</td>
                    <td>{{ $tasks->description }}</td>
                    <td>{{ $tasks->type }}</td>
                    <td>{{ $tasks->status }}</td>
                    <td>{{ $tasks->start_date }}</td>
                    <td>{{ $tasks->due_date }}</td>
                    <td>{{ $tasks->assignee }}</td>
                    <td>{{ $tasks->estimate }}</td>
                    <td>{{ $tasks->actual }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('users.index') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Back</span>
    </a>
@endsection
