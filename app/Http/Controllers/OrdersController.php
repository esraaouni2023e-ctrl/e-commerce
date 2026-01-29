<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{

 public function index()
{
    $orders = Order::with('orderDetails.product')
                   ->where('user_id', auth()->id())
                   ->get();

    return view('orr', compact('orders'));
}




    public function show($id)
    {
        $order = Order::with('orderDetails.product')->findOrFail($id);
        return view('order-show', compact('order'));
    }

 public function confirm(Request $request)
{
    $order = Order::findOrFail($request->order_id);
    $order->status = 'Payée';
    $order->save();

    return redirect('/orr')
                     ->with('success', 'Commande confirmée avec succès !');
}

public function update(Request $request, $id)
{
    $order = Order::findOrFail($id);

    // Mettre à jour les quantités des détails
    foreach ($request->quantities as $detailId => $quantity) {
        $detail = $order->orderDetails()->find($detailId);
        if ($detail) {
            $detail->update(['quantity' => $quantity]);
        }
    }

    // Recalculer le total
    $total = $order->orderDetails->sum(function($detail) {
        return $detail->price * $detail->quantity;
    });

    // Mettre à jour l'ordre avec le total recalculé
    $order->update([
        'total' => $total,
        // Tu peux mettre le status si besoin
        //'status' => $request->status ?? $order->status,
    ]);

    return redirect()->route('orders.show', $order->id)
                     ->with('success', 'Commande mise à jour avec succès.');
}


public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    if (auth()->user()->role === 'client') {
        return redirect()->route('orders.client')
            ->with('success', 'Commande supprimée avec succès');
    }

    if (auth()->user()->role === 'boutique') {
        return redirect()->route('orders.boutique')
            ->with('success', 'Commande supprimée avec succès');
    }

    return back()->with('success', 'Commande supprimée avec succès');
}


    public function edit($id)
{
    $order = Order::findOrFail($id);
    return view('edit', compact('order'));
}
public function boutiqueIndex()
{
    $orders = Order::with('orderDetails.product')
                   ->latest()
                   ->paginate(10);

    return view('order', compact('orders'));
}


}
