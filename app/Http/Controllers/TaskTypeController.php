<?php

namespace App\Http\Controllers;

use App\Models\TaskType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class TaskTypeController extends Controller
{
    public function index()
    {

        return view('task.tasktype.index');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
           'tasktype' => 'required'
        ]);
        if ($validation->fails())
        {
            return redirect()->back()->with('error',$validation->messages());
        }

        $taskType = TaskType::create([
            'tasktype' => $request->tasktype,
        ]);

        if($taskType) {
            return redirect()->back()->with('success','Task Type successfully created');
        }
    }
}
