<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(Request $request)
    {
        if ($request->has('token')) {

            $token = $request->get('token');

            $user = User::where('token', $token)->first();
            if ($user) {
                $tokenDate = $user->created_at;
                if ($tokenDate > now()->addDays(2)) {
                    session()->put('error','Unauthorized User');
                    return redirect()->back();
                }

                $user->token = '';
                $user->save();
                Auth::login($user);
                return redirect()->route('dashboard')->with('success', 'User Logged In Successfully');
            } else {
                session()->put('error','Unauthorized User');
                return redirect()->route('login');
            }

        } else {
            return view('auth.login');
        }
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate($request);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
