<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DetprodController extends Controller
{
    // Liste des produits
    public function index()
    {
        $products = Product::all();
        return view('addproduct', compact('products'));
    }

    // Afficher un produit
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('detprod', compact('product'));
    }

    
    public function create()
    {
        return view('addproduct_form');
    }

    // Sauvegarder un produit
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:5120',
        ]);

        $data = $request->except('image');
        $data['rating'] = 0;
        $data['sku'] = 'PROD-' . now()->format('Ymd') . rand(100, 999);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('addproduct')->with('success', 'Produit ajouté avec succès.');
    }
}
