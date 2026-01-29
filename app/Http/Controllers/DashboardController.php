<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('signin');
        }

        $role = Auth::user()->role;

        if ($role === 'client') {
            return redirect()->route('welcome.client');
        } elseif ($role === 'boutique') {
            return redirect()->route('welcome.boutique');
        } elseif ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return abort(403, 'Rôle inconnu');
    }

    public function client()
    {
        return view('welcome-client');
    }

    public function boutique()
    {
        return view('welcome-boutique');
    }

public function admin()
{
    $users = User::all();


    $orders = \App\Models\Order::with('orderDetails.product')->latest()->take(5)->get();

    return view('admin', compact('users', 'orders'));
}

}
