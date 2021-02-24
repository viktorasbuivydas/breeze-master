<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public  function index(){
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }
    public function create(){
        return view('tasks.create');
    }

    public function store(TaskRequest $request){
        Task::create(
            [
                'task' => $request->task
            ]
        );
        return redirect()->route('tasks.index')->with('status', 'Succesfully created new task');
    }

    public function edit(Task $task){
        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task, TaskRequest $request){
        $task->task = $request->task;
        $task->save();
        return redirect()->route('tasks.index')->with('status', 'Succesfully updated this task');
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect()->route('tasks.index')->with('status', 'Succesfully deleted this task');
    }
}
