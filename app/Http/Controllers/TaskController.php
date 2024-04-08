<?php

namespace App\Http\Controllers;

use App\Models\StatusHistory;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index():View
    {
        $tasks = Task::simplePaginate(5);

        return view('Tasks.index',[
            'tasks' => $tasks
        ]);
    }

    public function create():View
    {
        return view('Tasks.create');
    }


    public function store(Request $request):RedirectResponse
    {

        $task = Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
        ]);

        $status = new StatusHistory();
        $status->status = 'New';
        $status->date = now();
        $status->task_id = $task->id;
        $status->save();

        $task->statusHistory()->save($status);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task):View
    {
        return view('Tasks.edit',['task'=>$task]);
    }

    public function update(Request $request, Task $task):RedirectResponse
    {

        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task):RedirectResponse
    {
        $task->delete();

        return redirect()->back();
    }



}
