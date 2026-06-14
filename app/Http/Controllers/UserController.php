<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register(){
        return view('events.register');
    }

    public function registerCreate(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        return to_route('events.login');
    }

    public function login(){
            return view('events.login');
        }

    public function loginEvents(Request $request){
        //get the user data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        //1. Check in users table
        $user = User::where('email', $request->email)->first();
        //dd($usersFromDB);
        if ($user && Hash::check($request->password, $user->password)) {
            // store user in session 
            session(['user' => $user]);
            return redirect()->route('events.indexUser');
        }

        // 2. Check in admins table
        $admin = Admin::where('email', $request->email)
                    ->where('password', $request->password)
                    ->first();

        if ($admin) {
            session(['admin' => $admin, 'role' => 'admin']);
            return redirect()->route('events.index');
        }

        // if login fails, redirect back with error
        return back()->withErrors([
            'loginError' => 'Invalid email or password.',
        ]);
    }
    
    public function logout()
    {
        // You could return a simple Blade page asking:
        // "Are you sure you want to logout?" with a form POSTing to events.logoutEvents
        return view('events.logout');
    }

    // POST: actually log the user out and redirect
    public function logoutEvents()
    {
        // This removes the user session
        session()->forget('user');

        // Optional: invalidate and regenerate session
        session()->invalidate();
        session()->regenerateToken();

        // Redirect to login or home
        return redirect()->route('events.login')->with('status', 'You have been logged out!');
    }

}
