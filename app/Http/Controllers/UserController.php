<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request) {
        if($request->method() === 'POST') {
            Validator::make($request->all(), [
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|max:255|min:6|confirmed'
            ])->validate();
            User::create($request->all());
            return redirect()->route('home')->with('message', 'Регистрация прошла успешно');
        }
        return view('register');
    }
    public function login(Request $request) {
        if($request->method() === 'POST') {
            Validator::make($request->only('email', 'password'), [
                'email' => 'required|max:255',
                'password' => 'required|max:255|min:6'
            ])->validate();
            if(Auth::attempt($request->only('email', 'password'), $request->has('remember_token'))) {
                return redirect()->route('home')->with('message', 'Вы успешно авторизировались');
            }
            return redirect()->back()->with('error', 'Incorrect Email or Password');
        }
        return view('login');
    }
    public function logout() {
        Auth::user()->clearRememberToken();
        Auth::logout();
        return redirect()->route('home');
    }
}
