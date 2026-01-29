<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Vue parab.blade.php
    public function parab()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $user = Auth::user();
        return view('parab', compact('user'));
    }

    // Vue show.blade.php
    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $user = Auth::user();
        return view('show', compact('user'));
    }

    // Mise à jour profil depuis show.blade.php
    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }

        $user = Auth::user();

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user->update($request->only('name', 'email'));

        return redirect()->route('show')->with('success', 'Profil mis à jour avec succès.');
    }
}
