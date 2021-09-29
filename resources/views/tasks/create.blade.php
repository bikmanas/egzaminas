@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a task:</div>
                    <div class="card-body">
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name: </label>
                                <input type="text" name="task_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Description: </label>
                                <textarea id="mce" type="text" name="task_description" rows=10 cols=100
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Task status: </label>
                                <select name="status_id" id="" class="form-control">
                                    <option value="" selected disabled>Choose a status:</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Deadline: </label>
                                <input type="date" name="add_date" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
