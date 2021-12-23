@extends('/admin.layout')
@section('content')
    <h2>Create Task</h2>
     @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tile</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title"
                value="{{ old('title') }}" />
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Description</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="description"
                value="{{ old('description') }}" />
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Type</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="type"
                value="{{ old('type') }}" />
            @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Status</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="status"
                value="{{ old('status') }}" />
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Start_date</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="start_date"
                value="{{ old('start_date') }}" />
            @error('start_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Due_date</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="due_date"
                value="{{ old('due_date') }}" />
            @error('due_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Assignee</label>
            <select name="assignee" class="form-control">
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Estimate</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="estimate"
                value="{{ old('estimate') }}" />
            @error('estimate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Actual</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="actual"
                value="{{ old('actual') }}" />
            @error('actual')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-success" style="margin: 5% 50%; width: 10%" value="Create" />
    </form>
    <a href="{{ route('tasks.index') }}" class="btn btn-success btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span class="text">Back</span>
    </a>
@endsection
