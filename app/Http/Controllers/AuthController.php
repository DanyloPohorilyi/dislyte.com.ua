<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signIn()
    {
        return view('admin.registration');
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|max:255',
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = new User();
        $user->login = $request->login;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->surname = $request->last_name;
        $user->password = bcrypt($request->password);
        $user->save();


        return redirect(route('logIn'));
    }

    public function logIn()
    {
        return view('admin.login');
    }

    public function checkUser(Request $request)
    {
        $login = $request->login;
        $user = User::where('login', $login)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['login' => 'User not found']);
        }

        if (Hash::check($request->password, $user->password)) {
            $request->session()->put('user_id', $user->id);
            return redirect(route('adminIndex'));
        } else {
            return redirect()->back()->withErrors(['password' => 'Incorrect password']);
        }
    }

    public function signOut(Request $request)
    {
        $request->session()->forget('user_id');
        return redirect(route('adminIndex'));
    }
}
