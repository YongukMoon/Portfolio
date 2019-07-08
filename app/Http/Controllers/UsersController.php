<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('guest', ['except'=>['edit', 'update', 'getPassword', 'postPassword']]);
        $this->middleware('auth', ['only'=>['edit', 'update', 'getPassword', 'postPassword']]);
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

    protected function updateSocialAccount(Request $request, User $user){
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
        flash(trans('flash.SessionsController.store_success'));
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

        flash(trans('flash.UsersController.createNativeAccount'));
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

        flash(trans('flash.UsersController.confirm'));
        return redirect('/');
    }

    public function edit(User $user){
        return view('auth.users.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $this->validate($request, [
            'name'=>'required|max:255',
            'phone_number'=>'numeric|nullable|digits_between:10,11',
            'address'=>'max:255|nullable',
        ]);

        $user->update($request->all());

        flash('Update success');
        return redirect(route('users.edit', $user->id));
    }

    public function getPassword(User $user){
        if($user->password == null){
            flash()->error(trans('flash.UsersController.getPassword'));
            return redirect('/');
        }

        return view('auth.passwords.edit', compact('user'));
    }

    public function postPassword(Request $request, User $user){
        $this->validate($request, [
            'original_password'=>'required',
            'new_password'=>'required|confirmed|min:6',
        ]);

        $validate=auth()->validate([
            'email'=>$user->email,
            'password'=>$request->input('original_password')
        ]);

        if(!$validate){
            flash()->error(trans('flash.UsersController.postPassword_fail'));
            return redirect(route('passwords.edit', $user->id));
        }

        $user->update([
            'password'=>bcrypt($request->input('new_password'))
        ]);

        flash(trans('flash.UsersController.postPassword_success'));
        return redirect('/');
    }
}
