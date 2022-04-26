<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function redirectToProvider($provider) {

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $user_id = User::where('email', $user->getEmail())->first()->id;
        if (User::where('email', $user->getEmail())->exists()) {
            Auth::loginUsingId($user_id);
        } else {
        $createdUser = User::firstOrCreate([
            'provider' => $provider,
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => bcrypt($user->getName()),
            'provider_id' => $user->getId(),
        ]);

        Auth::login($createdUser);
        }


        return redirect('/');
    }
}
