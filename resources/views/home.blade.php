@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>

                <div class="row mt-2 px-3">
                    <div>
                        <a href="{{ route('todos.index') }}">
                            <button class="btn btn-sm btn-primary">
                                TO DO APP
                            </button>
                        </a>

                        {{-- <a href="{{ route('index') }}">
                            <button class="btn btn-sm btn-primary">
                                Other App
                            </button>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
