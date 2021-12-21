@extends('admin.layout')
@section('content')
    <table class="table align-middle">
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th>ID</th>
                    <td>{{ $task->id }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $task->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $task->description }}</td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td>{{ $task->type }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $task->status }}</td>
                </tr>
                <tr>
                    <th>Start_date</th>
                    <td>{{ $task->start_date }}</td>
                </tr>
                <tr>
                    <th>Due_date</th>
                    <td>{{ $task->due_date }}</td>
                </tr>
                <tr>
                    <th>Assignee</th>
                    <td>{{ $task->assignee }}</td>
                </tr>
                <tr>
                    <th>Estimate</th>
                    <td>{{ $task->estimate }}</td>
                </tr>
                <tr>
                    <th>Actual</th>
                    <td>{{ $task->actual }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('tasks.index') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Back</span>
    </a>
@endsection
