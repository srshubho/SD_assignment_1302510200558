<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {

    //
    public function index() {
        return view('admin.pages.auth.login');
    }
    public function create() {
        return view('admin.pages.auth.register');
    }

    public function logIn(Request $request) {
        $validatedData = $request->validate([
            'email'    => 'required|email|exists:users',
            'password' => 'required|min:5|max:10',

        ]);
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();
        if (Hash::check($password, $user->password)) {
            Session::put('userid', $user->id);
            Session::put('useremail', $user->email);
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('failed', ' Log in failed invalid password ');
        }

    }
    public function register(Request $request) {
        $validatedData = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:5|max:10|confirmed',

        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return redirect()->route('auth.login')->with('success', 'Registration successful! Now you can log in ');
        }

    }

    public function logOut() {
        Session::flush();
        return redirect()->route('login');
    }
}
