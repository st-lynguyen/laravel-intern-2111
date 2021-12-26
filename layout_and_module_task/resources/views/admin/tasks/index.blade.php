@extends('admin.layout')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }} 
        </div>
    @endif
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
                <th scope="col" style="text-align:center">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->type_label }}</td>
                    <td>{{ $task->status_label }}</td>
                    <td>{{ $task->start_date_label }}</td>
                    <td>{{ $task->due_date_label }}</td>
                    <td>{{ $task->assignee_label }}</td>
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
                            <button type="submit" class="btn btn-danger btn-sm px-3" onclick="return confirm('Are you sure you want to delete this')">
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
