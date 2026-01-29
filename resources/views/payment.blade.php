@php
use App\Models\Order;
use App\Models\OrderDetail;

$cart = session('cart', []);
$total = 0;
foreach($cart as $item){
    $total += $item['price'] * $item['quantity'];
}

// Crée une commande si elle n'existe pas encore et que le panier n'est pas vide
$orderId = session('current_order_id');
if(!$orderId && count($cart) > 0){
    $order = Order::create([
        'user_id' => auth()->id(),
        'total' => $total,
        'status' => 'En attente',
    ]);

    foreach($cart as $item){
        OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $item['id'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
        ]);
    }

    $orderId = $order->id;
    session(['current_order_id' => $orderId]);
}
@endphp

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Commande</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
body { font-family:'Inter',sans-serif; background: linear-gradient(135deg,#667eea,#764ba2); min-height:100vh; }
.glass-container { background: rgba(255,255,255,0.25); backdrop-filter:blur(15px); border:1px solid rgba(255,255,255,0.18); border-radius:2rem; padding:2rem; max-width:480px; margin:3rem auto; color:white; }
.summary-card { background: rgba(255,255,255,0.15); backdrop-filter: blur(10px); border-radius:16px; padding:1.5rem; margin-bottom:2rem; }
.btn { background:#667eea; padding:1rem 2rem; border-radius:12px; border:none; font-weight:600; cursor:pointer; width:100%; margin-top:1rem; }
.btn-back { background:gray; margin-bottom:1rem; }
.price-highlight { font-weight:800; }
</style>
</head>
<body>

<div class="glass-container">
    <div class="text-center mb-6">
        <i class="fas fa-receipt text-white text-3xl mb-2"></i>
        <h1 class="text-2xl font-bold mb-1">Résumé de commande</h1>
    </div>

    <div class="summary-card">
        @forelse($cart as $item)
            <div class="flex justify-between">
                <span>{{ $item['title'] }} (x{{ $item['quantity'] }})</span>
                <span>{{ number_format($item['price'] * $item['quantity'], 2, ',', ' ') }} €</span>
            </div>
        @empty
            <div class="flex justify-between">
                <span>Aucun article</span>
                <span>0,00 €</span>
            </div>
        @endforelse
        <hr class="my-2 border-white/20">
        <div class="flex justify-between font-bold text-xl">
            <span>Total</span>
            <span class="price-highlight">{{ number_format($total, 2, ',', ' ') }} €</span>
        </div>
    </div>

    <form action="{{ route('orders.confirm') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $orderId }}">
        <button type="submit" class="btn">Confirmer le paiement</button>
    </form>

    <button class="btn btn-back" onclick="history.back()"><i class="fas fa-arrow-left mr-2"></i>Retour</button>
</div>

</body>
</html>
