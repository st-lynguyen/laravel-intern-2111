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
                <th scope="col" style="text-align:center">Tools</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $list['id'] }}</td>
                <td>{{ $list['title'] }}</td>
                <td>{{ $list['description'] }}</td>
                <td>{{ $list['type'] }}</td>
                <td>{{ $list['status'] }}</td>
                <td>{{ $list['start_date'] }}</td>
                <td>{{ $list['due_date'] }}</td>
                <td>{{ $list['assignee'] }}</td>
                <td>{{ $list['estimate'] }}</td>
                <td>{{ $list['actual'] }}</td>
                <td>
                    <form action="{{ route('tasks.destroy', ['id' => $list['id']]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-info btn-sm px-3" href="{{ route('tasks.show', ['id' => $list['id']]) }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a class="btn btn-primary btn-sm px-3" href="{{ route('tasks.edit', ['id' => $list['id']]) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm px-3">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-success" href="{{ route('tasks.create') }}" style="margin:5% 50%">Add</a>
@endsection
