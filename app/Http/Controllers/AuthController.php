<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->usertype == 'admin') {
                return redirect()->route('dashboard');
            }

            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Show the registration form.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect()->route('login')->with('success', 'Your account has been created. You can now log in.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function update(Request $request)
    {
        $validation = $request->validate([
            'old_password' => 'required',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Dapatkan pengguna yang saat ini masuk
        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The current password is incorrect.']);
        }

        // Perbarui pengguna
        $user->update([
            'name' => $validation['name'],
            'username' => $validation['username'],
            'password' => bcrypt($validation['password']),
        ]);

        return redirect(route('profile'));
    }

}

