<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    // Affiche le formulaire d'inscription
    public function showRegistrationForm()
    {
        return view('signup');
    }

    // Traite l'inscription
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:client,boutique',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::login($user);

        return match ($user->role) {
            'client' => redirect()->route('welcomec'),
            'boutique' => redirect()->route('welcomeb'),

        };
    }

    public function redirectToRoleSignup(Request $request)
    {
        $role = $request->input('role');

        if ($role === 'client') {
            return redirect()->route('signup.client');
        } elseif ($role === 'boutique') {
            return redirect()->route('signup.boutique');
        }

        return redirect()->back();
    }

    public function showClientSignupForm()
    {
        return view('signup-client');
    }

    public function showBoutiqueSignupForm()
    {
        return view('signup-boutique');
    }
}
