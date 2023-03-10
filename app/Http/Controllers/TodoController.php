<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // index
    public function index(){
        $todo = Todo::get();
        return view('todos.index', ['todo'=>$todo]);
    }

    // Create todo
    public function create(){
        return view('todos.create');
    }

    // store todo
    public function store(TodoRequest $request){
        
        Todo::create([
            'title' => $request->title,
            'is_completed' => 0
        ]);

        $request->session()->flash('alert-success','Task Created Successfully');

        return to_route('todos.index');
        }


    // edit todo
    public function edit($id){
        $todo = Todo::findOrFail($id);
        if(!$todo){
            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate todo'
            ]);
        }
        
        return view('todos.edit', ['todo'=>$todo]);
    }

    // update todo
    public function update(TodoRequest $request){
        $todo = Todo::findorFail($request->todo_id);

        if(!$todo){
            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate todo'
            ]);
        }
        
        $todo->update([
            'title'  => $request->title,
            'is_completed'  => $request->is_completed
        ]);
        
        $request->session()->flash('alert-success','Task Updated Successfully');

        return to_route('todos.index');
    }

    // delete
    public function destroy(Request $request){
        $todo = Todo::findOrFail($request->todo_id);
        if(!$todo){
            return to_route('todos.index')->withErrors([
                'error' => 'Unable to locate todo'
            ]);
        }
        
        $todo->delete();
        $request->session()->flash('alert-danger','Deleted Successfully');

        return to_route('todos.index');

    }
}

