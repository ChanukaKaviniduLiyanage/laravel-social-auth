<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

class GoogleController extends Controller
{
    /**
     * Redirect to Google for authentication.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->stateless()
            ->scopes([
                'openid',
                'profile',
                'email',
                'https://www.googleapis.com/auth/calendar.readonly',
                'https://www.googleapis.com/auth/gmail.readonly',
                'https://www.googleapis.com/auth/tasks.readonly'
            ])
            ->redirect();
    }

    /**
     * Handle callback from Google.
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            Session::put('user', [
                'id' => $googleUser->getId(),
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'token' => $googleUser->token,
                'refreshToken' => $googleUser->refreshToken ?? null,
            ]);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors('Unable to login with Google: ' . $e->getMessage());
        }
    }

    /**
     * Show dashboard after login.
     */
    public function dashboard()
    {
        $user = Session::get('user');
        if (!$user) {
            return redirect()->route('login');
        }

        return view('dashboard', compact('user'));
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
