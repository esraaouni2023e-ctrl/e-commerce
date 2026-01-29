<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;

class OrderController extends Controller
{

    public function index()
{
    $orders = Order::where('user_id', Auth::id())
        ->with('orderDetails.product')
        ->latest()
        ->paginate(10);

    return view('orr', compact('orders'));
}
 public function update(Request $request, $id)
    {
        $detail = OrderDetail::findOrFail($id);

        $request->validate([
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $detail->update($request->all());

        return redirect()->route('orders.show', $detail->order_id)
                         ->with('success', 'Détail mis à jour avec succès.');
    }


    public function destroy($id)
    {
        $detail = OrderDetail::findOrFail($id);
        $orderId = $detail->order_id;
        $detail->delete();

        return redirect()->route('orders.show', $orderId)
                         ->with('success', 'Détail supprimé avec succès.');
    }

    public function edit($id)
{
    $order = Order::findOrFail($id);
    return view('edit', compact('order'));
}


}
