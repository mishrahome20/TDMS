<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        $tasktypes = TaskType::latest()->get();
        return view('task.index',[
            'projects' => $projects,
            'tasktypes' => $tasktypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request)
    {
        $user = Auth::user()->id;
        $task = Task::create([
            'title' => $request->title,
            'description'   => $request->description,
            'deadline'  => $request->deadline,
            'priority'  => $request->priority,
            'project_id'    => $request->project_id,
            'created_by'    => $user,
            'updated_by'    => $user,
        ]);
        $task->taskType()->attach($request->tasktype);
        return redirect()->route('tasks.index')->with('success','Task successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
