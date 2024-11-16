<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::where('user_id', auth()->id())->with('user') ->paginate(10); 
    return view('todos.index', compact('todos'));
    }
    public function create(){
        return view('todos.create');
    }
    public function store(Request $request){
        $request->validate([
            "title" => "required|max:255",
            "description" => "required|max:255",
            "status" => "required|in:pending,completed",
        ]);
        Todo::create([
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status,
            "user_id" => auth()->id()
        ]);
        return redirect()->route('todos.index');
    }
    public function edit($id){
        $todo = Todo::find($id);
        return view('todos.edit', ["todo" => $todo]);
    }
    public function update(Request $request , $id){
        $request->validate([
            "title" => "required|max:255",
            "description" => "required|max:255",
            "status" => "required|in:pending,completed",
        ]);
        $todo = Todo::where('id',$id)->findOrFail($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->status = $request->status;

        if($todo->save()){
            return redirect()->route('todos.index');
        }else{
            return redirect()->route('todos.edit', ['id' => $id]);
        };
    }
    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos.index');
    }
}
