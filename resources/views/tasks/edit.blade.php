@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit a task: </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                            @csrf @method("PUT")
                            <div class="form-group">
                                <label for="">Name: </label>
                                <input type="text" name="task_name" class="form-control" value="{{ $task->task_name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Description: </label>
                                <input type="text" name="task_description" class="form-control"
                                    value="{{ $task->task_description }}">
                            </div>
                            <div class="form-group">
                                <label>Status: </label>
                                <select name="status_id" id="" class="form-control">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" @if ($status->id == $task->status_id) selected="selected" @endif>
                                            {{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
