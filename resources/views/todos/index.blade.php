@extends('layouts.app')

@section('styles')
    <style>
        #outer{
            width: 20%;
        }
        .inner{
            display: inline-block;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>To Do App</span>
                        
                        <div style="float: right;">
                            <a href="{{ route('todos.create') }}" class="btn btn-sm btn-primary">Create Task</a>
                        </div>

                        
                    </div>
                    
                    <div class="card-body">
                        @if (Session::has('alert-success'))
                            <div class="alert alert-success" role="alert">
                                {{ session::get('alert-success', 'Task Created Successfully') }}
                            </div>
                        @endif

                        @if (Session::has('alert-danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session::get('alert-danger', 'Task Deleted Successfully') }}
                        </div>
                    @endif

                        @if (count($todo) > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todo as $i)
                                        <tr>
                                            <td>{{ $i->title }}</td>
                                            <td>
                                              
                                                @if ($i->is_completed == 0)
                                                <button class="btn btn-sm btn-outline-danger">Not Completed</button>
                                                @else
                                                <button class="btn btn-sm btn-success disabled">Completed</button>
                                            @endif
                                            </td>
                                            <td id="outer">
                                                <div class="d-grid gap-2 d-md-block">
                                                    <a 
                                                        class=" inner btn btn-primary btn-sm" 
                                                        name="todo_id" 
                                                        href="{{ route('todos.edit',$i->id) }}" 
                                                        type="button"
                                                        value="{{ $i->id }}"
                                                    >
                                                        Edit
                                                    </a>

                                                    <form method="post" class="inner" action="{{ route("todos.destroy",$i->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="todo_id" value="{{ $i->id }}">
                                                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                                    </form>
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
