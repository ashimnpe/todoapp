@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span>
                        {{ __('Edit Task') }}
                    </span>
                    <div style="float: right;">
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Go Back</a>
                    </div>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('todos.update') }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" name="title" value="{{ $todo->title }}">
                        </div>
                        <div class="mb-3">
                            <select name="is_completed" class="form-control" id="">
                                <option disabled selected>Status</option>
                                <option value="0">Not Completed</option>
                                <option value="1">Completed</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Update Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
