<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class PaymentController extends Controller
{
    // Affiche la vue orr.blade.php avec commandes et commande courante
    public function index()
    {
        $userId = auth()->id();

        // Toutes les commandes de l'utilisateur
        $orders = Order::where('user_id', $userId)->with('orderDetails.product')->get();

        // Commande courante (en session)
        $currentOrderId = session('current_order_id');
        $order = null;
        if($currentOrderId){
            $order = Order::with('orderDetails.product')->find($currentOrderId);
            session(['current_order' => $order]); // pour la vue
        }

        return view('orr', compact('orders', 'order'));
    }

    // Crée une commande depuis le panier si elle n'existe pas encore
    public function createOrderFromCart()
    {
        $cart = session('cart', []);

        if(empty($cart)){
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        $userId = auth()->id();
        $total = 0;

        foreach($cart as $item){
            $total += $item['price'] * $item['quantity'];
        }

        // Créer la commande
        $order = Order::create([
            'user_id' => $userId,
            'total' => $total,
            'status' => 'En attente', // statut par défaut
        ]);

        // Ajouter les détails de commande
        foreach($cart as $item){
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Stocker l'ID en session
        session(['current_order_id' => $order->id]);

        return redirect()->route('detorder.index')->with('success', 'Commande créée avec succès.');
    }

    // Supprimer un produit du panier (si tu veux garder cette fonction)
    public function removeFromCart(Request $request)
    {
        $index = $request->input('index');
        $cart = session('cart', []);

        if(isset($cart[$index])){
            unset($cart[$index]);
            session(['cart' => $cart]);
            return redirect()->back()->with('success', 'Produit supprimé du panier.');
        }

        return redirect()->back()->with('error', 'Produit introuvable.');
    }
}
