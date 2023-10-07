<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Department\StoreDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('user.department.index');
    }

    public function create()
    {
        return view('user.department.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create([
            'department'    => $request->department,
            'description'   => $request->description,
            'created_by'    => Auth::user()->id,
            'updated_by'   => Auth::user()->id,
        ]);

        return redirect()->back()->with('success','Department successfully created');
    }
}
