<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

public function index()
{
    $task = DB::table('tasks')->get();
    return view('tasks', ['task' => $task]);
}

public function show($id)
{
    $task = DB::table('tasks')->find($id);
    return view('taskshow', ['task' => $task]);
}

public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|max:120',
        'short_desc' => 'required',
        'long_desc' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['short_desc'];
    $task->long_description = $data['long_desc'];
    $task->save();

    return redirect()->back()->with('success', 'Task stored successfully!');
}

}