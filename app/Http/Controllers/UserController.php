<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {
        return view('users.login');
    }

    public function create() {
        return view('users.register');
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $fields['password'] = bcrypt($fields['password']);

        $user = User::create($fields);

        auth()->login($user);

        return redirect(config('app.url'))->with('success', 'Users successfully registered and authomatically login');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(config('app.url'))->with('success', 'Logout successfully');
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($fields)) {
            $request->session()->regenerate();

            return redirect(config('app.url'))->with('success', 'Login successful!'); 
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}
