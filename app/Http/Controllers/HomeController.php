<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /* generate a home function and add comment */
    public function home()
    {
        return view('AMS.frontend.home.index');
    }
    public function register(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
    }
    public function registrationForm()
    {
        $sections = Section::all();
        return view('AMS.frontend.register.index', compact('sections'));
    }
    public function loginForm()
    {
        return view('AMS.frontend.login.index');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {

            // Authentication was successful...
            if (Auth::user()->role->name == 'admin') {
                Auth::user()->status = "online";
                Auth::user()->save();
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard.index'))->with('success', 'You have been logged in successfully');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::user()->status = "offline";
        Auth::user()->save();
        Auth::logout();

        return redirect()->route('home.index')->with('success', 'You have been logged out successfully');
    }
}
