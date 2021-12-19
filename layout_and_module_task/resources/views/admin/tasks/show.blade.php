@extends('admin.layout')
@section('content')
<table class="table align-middle">
    <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $list["id"] }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ $list["title"] }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $list["description"] }}</td>
        </tr>
        <tr>
            <th>Type</th>
            <td>{{ $list["type"] }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $list["status"] }}</td>
        </tr>
        <tr>
            <th>Start_date</th>
            <td>{{ $list["start_date"] }}</td>
        </tr>
        <tr>
            <th>Due_date</th>
            <td>{{ $list["due_date"] }}</td>
        </tr>
        <tr>
            <th>Assignee</th>
            <td>{{ $list["assignee"] }}</td>
        </tr>
        <tr>
            <th>Estimate</th>
            <td>{{ $list["estimate"] }}</td>
        </tr>
        <tr>
            <th>Actual</th>
            <td>{{ $list["actual"] }}</td>
        </tr>
    </tbody>
</table>
<a href="{{ route('tasks.index') }}" class="btn btn-success btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-arrow-left"></i>
    </span>
    <span class="text">Back</span>
</a>
@endsection