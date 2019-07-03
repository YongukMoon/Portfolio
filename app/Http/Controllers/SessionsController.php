<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct(){
        $this->middleware('guest', ['except'=>'destroy']);
    }
    
    public function create(){
        return view('auth.sessions.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email'=>'required|email|max:255|exists:users',
            'password'=>'required',
        ]);

        if(!auth()->attempt($request->only('email', 'password'), $request->input('remember'))){
            flash('Login fail');
            return redirect(route('sessions.create'))->withInput();
        }

        if(!auth()->user()->activated){
            auth()->logout();
            flash('Please email confirm');
            return redirect('/')->withInput();
        }

        flash('Welcome');
        return redirect('/');
    }

    public function destroy(){
        auth()->logout();
        flash('See you later');
        return redirect(route('sessions.create'));
    }
}
