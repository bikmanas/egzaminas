@extends('layouts.app')
@section('content')
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit the task: </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('status.update', $status->id) }}">
                            @csrf @method("PUT")

                            <div class="form-group">
                                <label for="">Name: </label>
                                <input type="text" name="name" class="form-control" value="{{ $status->name }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
