<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function create(){
        return view('auth.users.create');
    }

    public function store(Request $request){
        $socialUser=\App\User::socialUser($request->input('email'))->first();

        if(!$socialUser){
            return $this->createNativeAccount($request);
        }

        return $this->updateSocialAccount($request, $socialUser);
    }

    protected function updateSocialAccount(Request $request, \App\User $user){
        $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed|min:6',
            'phone_number'=>'numeric|nullable|digits_between:10,11',
            'address'=>'max:255|nullable',
        ]);
        
        $user->update([
            'name'=>$request->input('name'),
            'password'=>bcrypt($request->input('password')),
            'phone_number'=>$request->input('phone_number'),
            'address'=>$request->input('address'),
        ]);

        auth()->login($user);
        flash('Welcome');
        return redirect('/');
    }

    protected function createNativeAccount(Request $request){
        $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|confirmed|min:6',
            'phone_number'=>'numeric|nullable|digits_between:10,11',
            'address'=>'max:255|nullable',
        ]);

        $confirmCode=str_random(60);

        $user=\App\User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'phone_number'=>$request->input('phone_number'),
            'address'=>$request->input('address'),
            'confirm_code'=>$confirmCode,
        ]);

        event(new \App\Events\UserCreated($user));

        flash('Please check your email');
        return redirect('/');
    }

    public function confirm($code){
        $user=\App\User::whereConfirmCode($code)->first();

        if(!$user){
            flash('Url fail');
            return redirect('/');
        }

        $user->activated=1;
        $user->confirm_code=null;
        $user->save();

        flash('Register success');
        return redirect('/');
    }
}
