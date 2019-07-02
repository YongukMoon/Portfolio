<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create(){
        return view('auth.users.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|confirmed|min:6',
            'phone_number'=>'numeric|nullable|digits_between:10,11',
            'address'=>'max:255|nullable',
        ]);

        $user=\App\User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'phone_number'=>$request->input('phone_number'),
            'address'=>$request->input('address'),
        ]);

        dd($user);
    }
}
