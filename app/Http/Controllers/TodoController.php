<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todo = Todo::get();
        return view('todos.index', ['todo'=>$todo]);
    }

    public function create(){
        return view('todos.create');
    }

    public function edit($id){
        
        return view('todos.edit');
    }
   
    public function store(TodoRequest $request){
        
        Todo::create([
            'title' => $request->title,
            'is_completed' => 0
        ]);

        $request->session()->flash('alert-success','Task Created Successfully');

        return to_route('index');
        }
}
