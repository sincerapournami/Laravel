<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

public function index()
{
    $task = DB::table('tasks')->orderByDesc('updated_at')->simplePaginate(8);
    return view('tasks', ['task' => $task]);
}

public function show($id)
{
    $task = DB::table('tasks')->find($id);
    return view('taskshow', ['task' => $task]);
}

public function edit($id)
{
    $task = DB::table('tasks')->find($id);
    return view('taskedit', ['task' => $task]);
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

public function update(Request $request, string $id)
{
    $request->validate([
        'title' => 'required|max:120',
        'short_desc' => 'required',
        'long_desc' => 'required'
    ]);

    $task = DB::table('tasks')->where('id',$id);

    if($task){

        $task->update([

            'title' => $request->title,
            'description' => $request->short_desc,
            'long_description' => $request->long_desc,

        ]);
    
        return redirect()->back()->with('success', 'Task updated successfully!');

    }else{

        return redirect()->back()->with('failed', 'Task not found!');

    }
}

public function complete(string $id)
{
    $task = DB::table('tasks')->where('id',$id);

    if($task){

        $task->update([

            'completed' => '1',

        ]);
    
        return redirect()->back()->with('success', 'Task marked completed!');

    }else{

        return redirect()->back()->with('failed', 'Task not found!');

    }
}

public function destroy($id)
{
    $task = DB::table('tasks')->where('id', $id);
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
}

}