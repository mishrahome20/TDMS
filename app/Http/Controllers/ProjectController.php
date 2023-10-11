<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\CreateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index() :View
    {
        return view('task.project.index');
    }

    public function store(CreateProjectRequest $request)
    {
        $project = Project::create([
            'title' => $request->title,
            'description'   => $request->description,
            'created_by'    => Auth::user()->id,
            'updated_by'    => Auth::user()->id,
        ]);

        return redirect()->route('projects.index')->with('success','Project successfully created');
    }
}
