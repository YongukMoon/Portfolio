<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function execute(Request $request, $provider){
        if($request->has('code')){
            return $this->handleProviderCallback($provider);
        }

        return $this->redirectToProvider($provider);
    }

    protected function redirectToProvider($provider){
        return \Socialite::driver($provider)->redirect();
    }

    protected function handleProviderCallback($provider){
        $user=\Socialite::driver($provider)->user();

        $user=\App\User::whereEmail($user->getEmail())->first()
        ?: \App\User::create([
            'name'=>$user->getName() ?: 'Unknown',
            'email'=>$user->getEmail(),
            'activated'=>1,
        ]);

        auth()->login($user);
        flash(trans('flash.SessionsController.store_success'));
        return redirect('/');
    }
}
