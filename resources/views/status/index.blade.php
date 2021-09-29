@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <h4 style="color: red">{{ $errors->first() }}</h4>
    @endif

    <div class="card-body">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            @foreach ($statuses as $status)
                <tr>
                    <td>{{ $status->name }}</td>
                    <td>
                        <form action={{ route('status.destroy', $status->id) }} method="POST">
                            <a class="btn btn-success" href={{ route('status.edit', $status->id) }}>Edit</a>
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('status.create') }}" class="btn btn-success">Add</a>
        </div>
    </div>
@endsection
