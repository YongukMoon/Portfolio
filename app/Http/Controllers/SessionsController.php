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
            flash()->error(trans('flash.SessionsController.store_fail'));
            return redirect(route('sessions.create'))->withInput();
        }

        if(!auth()->user()->activated){
            auth()->logout();
            flash()->error(trans('flash.SessionsController.store_confirm'));
            return redirect('/')->withInput();
        }

        flash(trans('flash.SessionsController.store_success'));
        return redirect('/');
    }

    public function destroy(){
        auth()->logout();
        flash(trans('flash.SessionsController.destroy'));
        return redirect(route('sessions.create'));
    }
}
