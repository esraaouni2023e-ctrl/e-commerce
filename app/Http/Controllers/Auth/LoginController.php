<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Affiche la page de connexion (signin).
     */
    public function showLoginForm()
    {
        return view('signin'); // Assure-toi que resources/views/signin.blade.php existe
    }

    /**
     * Gère la tentative de connexion.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirection selon le rôle
            if ($user->role === 'client') {
                return redirect()->route('client.dashboard');
            } elseif ($user->role === 'boutique') {
                return redirect()->route('boutique.dashboard');
            } elseif ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('dashboard'); // fallback
            }
        }

        // Si authentification échouée
        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ])->withInput();
    }

    /**
     * Déconnecte l'utilisateur.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/signin');
    }
}
