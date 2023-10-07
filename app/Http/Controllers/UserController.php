<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Jobs\User\RegisterMail;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index() : View
    {
        $departments = Department::latest()->get();
        return view('user.index',[
            'departments' => $departments,
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        $code   = Str::random(8); //Generating Code for user
        $token  = Str::random(55); //Generating token for user

        //Creating User
        $user   = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password,
            'phone'     => $request->phone,
            'code'      => $code,
            'department_id' => $request->department_id,
        ]);

        //Saving User Token
        if ($user) {
            $user->token = $token;
            $user->save();
            RegisterMail::dispatch($user)->delay(now()->addMinutes(5));
        }

        return redirect()->route('users.index')->with('success','User successfully created');
    }
}
