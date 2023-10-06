<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index() : View
    {
        return view('user.index');
    }

    public function store(CreateUserRequest $request)
    {
        $code = Str::random(8);
        $user = User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password'  => $request->password,
            'phone' => $request->phone,
            'code' => $code,
        ]);
        return redirect()->route('users.index')->with('success','User successfully created');
    }
}
