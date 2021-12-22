@extends('admin.layout')

@section('content')
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
                <th scope="col" style="text-align:center; width: 17%;">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->type }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->start_date }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>{{ $task->assignee }}</td>
                    <td>{{ $task->estimate }}</td>
                    <td>{{ $task->actual }}</td>
                    <td>
                        <a class="btn btn-info btn-sm px-3" href="{{ route('tasks.show', ['id' => $task->id]) }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a class="btn btn-primary btn-sm px-3" href="{{ route('tasks.edit', ['id' => $task->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm px-3">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-success" href="{{ route('tasks.create') }}" style="margin:5% 50%">Add</a>
@endsection
