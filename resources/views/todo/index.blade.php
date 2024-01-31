<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4233d9ac79.js" crossorigin="anonymous"></script>
</head>

<body>

    @include('sweetalert::alert')
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                To Do Task
                <a href="#" style="float: right">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#todo">
                        Add New Task
                    </button></a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <span class="badge bg-warning">incomplete</span>
                                    @else
                                        <span class="badge bg-success">complete</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="#">
                                        <button type="button" class="btn btn-sm btn-info text-white m-1"
                                            data-bs-toggle="modal" data-bs-target="#edit-{{ $item->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i> </button>
                                    </a>
                                    <form action="{{ route('todo.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#">
                                            <button class="btn btn-danger btn-sm text-white m-1"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            <!-- ToDo Edit -->
                            <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="todoLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="todoLabel">Edit Task</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        {!! Form::open(['route' => ['todo.update', $item->id], 'method' => 'post']) !!}
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                {!! Form::text('title', $item->title, ['class' => 'form-control']) !!}
                                            </div>
                                            <div class="mb-3">
                                                {!! Form::select('status', config('dropdown.status'), $item->status, ['class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ToDo Create -->
    <div class="modal fade" id="todo" tabindex="-1" aria-labelledby="todoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="todoLabel">Add New Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {!! Form::open(['route' => 'todo.store', 'method' => 'post']) !!}
                <div class="modal-body">
                    <div class="mb-3">
                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                        <span class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
