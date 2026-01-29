<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check()) {
            return redirect('/signin')->with('error', 'Veuillez vous connecter.');
        }

        if ($request->user()->role !== $role) {
            abort(403, "Accès refusé. Vous n'êtes pas autorisé à accéder à cette page.");
        }

        return $next($request);
    }
}
