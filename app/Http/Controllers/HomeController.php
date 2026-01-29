<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function welcomeclient()
    {
        $products = Product::all();


        return view('welcome-client', compact('products'));
    }

    public function welcomeboutique()
    {
        $products = Product::all();

        return view('welcome-boutique', compact('products'));
    }
}
