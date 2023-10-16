<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\CreateTaskRequest;
use App\Models\Attachment;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskType;
use App\Models\User;
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
        $users = User::latest()->get();
        return view('task.index',[
            'projects'      => $projects,
            'tasktypes'     => $tasktypes,
            'users'         => $users
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

        //Fetching Authenticated user ID
        $user = Auth::user()->id;

        //Creating task
        $task = Task::create([
            'title'         => $request->title,
            'description'   => $request->description,
            'deadline'      => $request->deadline,
            'priority'      => $request->priority,
            'project_id'    => $request->project_id,
            'created_by'    => $user,
            'updated_by'    => $user,
        ]);

        //Adding taskType in the table
        $task->taskType()->attach($request->tasktype);

        //Adding Attachment to the task only when task has attachment
        if ($request->has('attachments'))
        {
            $attachments1 = $request->file('attachments');
            foreach ($attachments1 as $attachment)
            {
                $extension = $attachment->getClientOriginalExtension();
                $name = 'task-'.date('ymdhis').'-'.rand(0,99999999).'.'.$extension;
                $attachment->move(storage_path('app/public/task'),$name);
                $taskAttachment = new Attachment();
                $taskAttachment->attachment = $name;
                $taskAttachment->task_id = $task->id;
                $taskAttachment->flag = '0';
                $taskAttachment->save();
            }

            return redirect()->back()->with('success','Task successfully created');
        }

       $assigner = $request->assigne ?? [];
       $reviewer = $request->reviwer ?? [];

       //Assigning Assigne to the Task
        foreach ($assigner as $assigne)
        {
            $task->collaborator()->create([
                'task_id'       => $task->id,
                'flag'          => '0',
                'collaborators' => $assigne,
            ]);
        }

        //Assigning Reviewer to the Task
        foreach ($reviewer as $reviwer)
        {
            $task->collaborator()->create([
                'task_id'       => $task->id,
                'flag'          => '1',
                'collaborators' => $reviwer,
            ]);
        }
        //Redirecting user to the Task List page when task is created successfully
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
