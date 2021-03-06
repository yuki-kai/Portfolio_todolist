<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function newindex()
    {
        $todos = Todolist::orderBy('id', 'asc')->get();

        return view('index', compact('todos'));
    }

    public function save(Request $request)
    {
        $validatedDate = $request->validate(
        ['task_name' => 'required',],
        ['task_name.required' => 'タスク名を入力して下さい',]
        );

        $todo = new Todolist();
        $todo->task_name = $request->task_name;
        // $todo->task_description = $request->task_description;
        // $todo->estimate_hour = $request->estimate_hour;
        $todo->save();

        return redirect('/index');
    }

    public function delete($id)
    {
        Todolist::find($id)->delete();
        return redirect('/index');
    }








    // public function index()
    // {
    //     $todos = Todolist::orderBy('id', 'asc')->get();

    //     return view('todolist', compact('todos'));
    // }

    // public function create()
    // {
    //     return view('create_todo');
    // }

   
    // public function save(Request $request)
    // {
    //     $validatedDate = $request->validate([
    //         'task_name' => 'required',
    //         'task_description' => 'required',
    //         'estimate_hour' => 'required',
    //     ],
    //     [
    //         'task_name.required' => 'タスク名を入力して下さい',
    //         'task_description.required' => 'タスク名を入力して下さい',
    //         'estimate_hour.required' => 'タスク期限を入力して下さい',
    //     ]);

    //     $todo = new Todolist();
    //     $todo->task_name = $request->task_name;
    //     $todo->task_description = $request->task_description;
    //     $todo->estimate_hour = $request->estimate_hour;
    //     $todo->save();

    //     return redirect('/todolist');
    // }

    // public function editPage($id)
    // {
    //     $todo = Todolist::find($id);
    //     return view('edit_page', compact('todo'));
    // }

    // public function edit(Request $request, $id)
    // {
    //     Todolist::find($request->id)->update([
    //         'task_name' => $request->task_name,
    //         'task_description' => $request->task_description,
    //         'estimate_hour' => $request->estimate_hour,
    //     ]);

    //     return redirect('/todolist');
    // }

    // public function deletePage($id)
    // {
    //     $todo = Todolist::find($id);
    //     return view('delete_page', compact('todo'));
    // }

    // public function delete($id)
    // {
    //     Todolist::find($id)->delete();
    //     return redirect('/todolist');
    // }
}
