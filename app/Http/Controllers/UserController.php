<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product; // Add Product model
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the user based on their role.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        $products = Product::all();

        if ($user->role === 'client') {
            return view('welcome-client', compact('user', 'products'));
        }

        return view('welcome-boutique', compact('user', 'products'));
    }

public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit-user', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'nullable|string|in:admin,boutique,client',
        ]);

        $user->update($validated);

        return redirect()->route('users.show', $id)->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
