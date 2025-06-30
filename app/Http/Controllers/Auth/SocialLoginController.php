<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialLoginController extends Controller
{
    // Redirect to provider
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Handle provider callback
    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                // Create a new user if not exists
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt(str_random(16)), // Generate random password
                ]);
            }

            Auth::login($user, true);
            return redirect()->route('home');

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Something went wrong.']);
        }
    }
}
