<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoRequest;
use App\Models\ToDo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ToDoController extends Controller
{
    protected $model;
    public function __construct(ToDo $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data = $this->model->all();
        return view('todo.index', compact('data'));
    }


    public function store(ToDoRequest $request)
    {
        $validateData = $request->validated();
        $this->model->create($validateData);
        Alert::success('Success', 'Todo Created Successfully');
        return redirect()->route('todo.index');
    }

    public function update(ToDoRequest $request, $id)
    {
        $data = $this->model->find($id);
        $validateData = $request->validated();
        $data->update($validateData);
        Alert::success('Success', 'Todo Updated Successfully');
        return redirect()->route('todo.index');
    }

    public function destroy($id)
    {
        $todo = $this->model->find($id);
        $todo->delete();
        Alert::success('Success', 'Todo Deleted Successfully');
        return redirect()->route('todo.index');
    }
}
