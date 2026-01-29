<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{

   public function index()
    {
        $cart = session('cart', []);
        return view('detorder', compact('cart'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'title' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'integer|min:1',
        ]);

        $product = [
            'id' => $request->product_id,
            'title' => $request->title,
            'price' => $request->price,
            'quantity' => $request->quantity ?? 1,
        ];

        $cart = session('cart', []);

        $exists = false;
        foreach ($cart as &$item) {
            if ($item['id'] === $product['id']) {
                $item['quantity'] += $product['quantity'];
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $cart[] = $product;
        }

        session(['cart' => $cart]);

        return redirect()->route('detorder.index')->with('success', 'Produit ajouté au panier !');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'index' => 'required|integer|min:0',
        ]);

        $cart = session('cart', []);

        if (isset($cart[$request->index])) {
            unset($cart[$request->index]);
            $cart = array_values($cart);
            session(['cart' => $cart]);
        }

        return redirect()->route('detorder.index')->with('success', 'Produit supprimé du panier !');
    }


}
