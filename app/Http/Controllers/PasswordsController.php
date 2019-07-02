<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordsController extends Controller
{
    public function getRemind(){
        return view('auth.passwords.create');
    }

    public function postRemind(Request $request){
        $this->validate($request, [
            'email'=>'required|email|exists:users',
        ]);

        $token=str_random(64);
        $email=$request->input('email');

        \DB::table('password_resets')->insert([
            'email'=>$email,
            'token'=>$token,
            'created_at'=>\Carbon\Carbon::now(),
        ]);

        event(new \App\Events\PasswordResetCreated($token, $email));

        return redirect('/');
    }

    public function getReset($token){
        return view('auth.passwords.reset', compact('token'));
    }

    public function postReset(Request $request){
        $this->validate($request, [
            'password'=>'required|confirmed|min:6',
            'token'=>'required',
        ]);

        $resetUser=\DB::table('password_resets')->whereToken($request->input('token'))->first();

        if(!$resetUser){
            return redirect('/');
        }

        \App\User::whereEmail($resetUser->email)->update([
            'password'=>$request->input('password'),
        ]);

        \DB::table('password_resets')->whereEmail($resetUser->email)->delete();

        return redirect('/');
    }
}
