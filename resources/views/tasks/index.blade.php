@extends('layouts.app')

@section('content')
<h1 class="text-center">To Do List</h1>

            {{--Form for create new task --}}
<form method="POST" action="{{ route('tasks.store') }}" >
    @csrf
    <div class="input-group">
        <input type="text" name="title" class="form-control" placeholder="Add a new task">
        <button type="submit" class="btn btn-primary">Add Task</button>
    </div>
</form>

{{--List with foreach loop to iterate through table --}}
<ul class="list-group">
    @foreach ($tasks as $task)
        <li class="list-group-item d-flex justify-content-between align-items-center">

        {{--Form for update a task --}}
        <form method="POST" action="{{ route('tasks.update', $task) }}"  class="d-flex align-items-center w-100">
                @csrf
                @method('PUT')
                <input type="text" name="title" value="{{ $task->title }}" class="form-control me-2" required>
                <button type="submit" class="btn btn-success btn-sm">Save</button>
            </form>
            
            {{--Form for delete a task --}}
            <form method="POST" action="{{ route('tasks.delete', $task) }}"  style="margin-left: 10px;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
