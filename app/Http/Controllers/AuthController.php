<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:new_users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:client,boutique',
        ]);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'],
            ]);

            Auth::login($user);

            return match ($user->role) {
                'client' => redirect()->route('client.dashboard'),
                'boutique' => redirect()->route('boutique.dashboard'),
                default => redirect()->route('login')->withErrors(['role' => 'Invalid role']),
            };
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()]);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (!$user) {
                Auth::logout();
                return back()->withErrors(['email' => 'Authentication failed']);
            }

            return match ($user->role) {
                'client' => redirect()->route('client.dashboard'),
                'boutique' => redirect()->route('boutique.dashboard'),
                'admin' => redirect()->route('admin.dashboard'),
                default => redirect()->route('login')->withErrors(['role' => 'Invalid role']),
            };
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

