@extends('layouts.app')
@section('content')
    <div class="card-body">
        <form style="margin-bottom: 10px" class="form-inline" action="{{ route('tasks.index') }}" method="GET">
            <select name="status_id" id="" class="form-control">
                <option value="" selected disabled>Choose status to filter:</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" @if ($status->id == app('request')->input('status_id'))
                        selected="selected"
                @endif>{{ $status->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success" href={{ route('tasks.index') }}>Show all</a>
        </form>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Complete until</th>
                <th>Completed</th>
                <th>Actions</th>
            </tr>

            @foreach ($tasks as $task)

                <tr>
                    {{-- <td>{{ $task->id }}</td> --}}
                    <td>{{ $task->task_name }}</td>
                    <td>{!! $task->task_description !!}</td>
                    <td>{{ $task->status_id }}</td>
                    <td>{{ $task->add_date }}</td>
                    <td>{{ $task->completed_date }}</td>

                    <td>
                        <form action={{ route('tasks.destroy', $task->id) }} method="POST">
                            <a class="btn btn-success" href={{ route('tasks.edit', $task->id) }}>Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('tasks.create') }}" class="btn btn-success">Create</a>
        </div>
    </div>
@endsection
