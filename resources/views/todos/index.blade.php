@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('To Do App') }}</div>

                    <div class="card-body">
                        @if (Session::has('alert-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session::get('alert-success', 'Task Created Successfully') }}
                            </div>
                        @endif

                        @if (count($todo) > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todo as $i)
                                        <tr>
                                            <td>{{ $i->id }}</td>
                                            <td>{{ $i->title }}</td>
                                            <td class="text-strike">
                                              
                                                @if ($i->is_completed == 1)
                                                <button class="btn btn-sm btn-outline-danger">Not Completed</button>
                                                @else
                                                <button class="btn btn-sm btn-danger disabled">Completed</button>
                                            @endif
                                            </td>
                                            <td>
                                                <div class="d-grid gap-2 d-md-block">
                                                    <a class="btn btn-primary btn-sm" name="todo_id" value="{{ $i->id }}" href="{{ route('todos.edit',$i->id) }}" type="button">Edit</a>
                                                    <button class="btn btn-danger btn-sm" name="todo_id" value="{{ $i->id }}" type="button">Delete</button>
                                                  </div>
                                            </td>
                                        </tr>        
                                    @endforeach
                                    
                                </tbody>
                            </table>

                            @else
                            <h3>No Data</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
