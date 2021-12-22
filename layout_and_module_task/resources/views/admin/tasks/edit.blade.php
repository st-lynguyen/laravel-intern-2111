@extends('/admin.layout')
@section('content')
    <h2>Edit Task</h2>
    <form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ $task->id }}"
                readonly />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tile</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title"
                value="{{ $task->title }}" />
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Description</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="description"
                value="{{ $task->description }}" />
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Type</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="type"
                value="{{ $task->type }}" />
            @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Status</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="status"
                value="{{ $task->status }}" />
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Start_date</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="start_date"
                value="{{ $task->start_date }}" />
            @error('start_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Due_date</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="due_date"
                value="{{ $task->due_date }}" />
            @error('due_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Assignee</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="assignee"
                value="{{ $task->assignee }}" />
            @error('assignee')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Estimate</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="estimate"
                value="{{ $task->estimate }}" />
            @error('estimate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Actual</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="actual"
                value="{{ $task->actual }}" />
            @error('actual')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-success" style="margin: 5% 50%; width: 10%" value="Update" />
    </form>
    <a href="{{ route('tasks.index') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Back</span>
    </a>
@endsection
