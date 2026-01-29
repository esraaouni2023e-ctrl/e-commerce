<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-purple: #6f42c1;
            --secondary-purple: #8b5cf6;
            --light-purple: #e9ecef;
            --dark-purple: #4c2a85;
            --accent-purple: #9d4edd;
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            --purple-shadow: rgba(111, 66, 193, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            line-height: 1.6;
        }

        .cart-container {
            max-width: 1400px;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px var(--purple-shadow);
            border: 1px solid rgba(111, 66, 193, 0.1);
            position: relative;
            overflow: hidden;
        }

        .cart-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-1);
        }

        .cart-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(111, 66, 193, 0.1);
        }

        .cart-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--gradient-1);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .cart-header h2 i {
            margin-right: 15px;
            background: var(--gradient-1);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .alert {
            border: none;
            border-radius: 15px;
            padding: 20px 25px;
            margin-bottom: 30px;
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.15);
            border-left: 4px solid #28a745;
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        }

        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .empty-cart i {
            font-size: 4rem;
            color: var(--primary-purple);
            margin-bottom: 20px;
            opacity: 0.7;
        }

        .empty-cart h3 {
            color: var(--primary-purple);
            margin-bottom: 15px;
        }

        .cart-table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(111, 66, 193, 0.1);
            border: 1px solid rgba(111, 66, 193, 0.1);
            margin-bottom: 30px;
        }

        .table {
            margin: 0;
        }

        .table thead {
            background: var(--gradient-1);
        }

        .table thead th {
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 20px 15px;
            border: none;
            text-align: center;
        }

        .table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(111, 66, 193, 0.1);
        }

        .table tbody tr:hover {
            background: rgba(111, 66, 193, 0.05);
            transform: scale(1.01);
        }

        .table tbody td {
            padding: 25px 15px;
            vertical-align: middle;
            text-align: center;
            font-size: 1.1rem;
            border: none;
        }

        .product-name {
            font-weight: 600;
            color: var(--primary-purple);
            font-size: 1.2rem;
        }

        .price-cell {
            font-weight: 600;
            color: #28a745;
            font-size: 1.1rem;
        }

        .quantity-cell {
            background: linear-gradient(135deg, #f8f9ff 0%, #e9ecff 100%);
            border-radius: 10px;
            padding: 8px 15px !important;
            font-weight: 600;
            color: var(--primary-purple);
        }

        .total-cell {
            font-weight: 700;
            color: var(--dark-purple);
            font-size: 1.2rem;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            border: none;
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
            background: linear-gradient(135deg, #ff5252 0%, #e53935 100%);
        }

        .btn-danger i {
            margin-right: 8px;
        }

        .cart-total-container {
            background: linear-gradient(135deg, #f8f9ff 0%, #e9ecff 100%);
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            margin-bottom: 30px;
            border: 2px solid rgba(111, 66, 193, 0.1);
            box-shadow: 0 10px 30px rgba(111, 66, 193, 0.1);
        }

        .cart-total {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary-purple);
            margin: 0;
            text-shadow: 0 2px 4px rgba(111, 66, 193, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cart-total i {
            margin-right: 15px;
            background: var(--gradient-1);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-secondary {
            background: var(--gradient-1);
            border: none;
            padding: 15px 40px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(111, 66, 193, 0.3);
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .btn-secondary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-secondary:hover::before {
            left: 100%;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(111, 66, 193, 0.4);
            color: white;
            text-decoration: none;
        }

        .btn-secondary i {
            margin-right: 10px;
        }

        .action-buttons {
            text-align: center;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .cart-container {
                margin: 20px;
                padding: 25px;
            }

            .cart-header h2 {
                font-size: 2rem;
            }

            .cart-total {
                font-size: 1.8rem;
            }

            .table thead th,
            .table tbody td {
                padding: 15px 8px;
                font-size: 0.9rem;
            }

            .product-name {
                font-size: 1rem;
            }
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: var(--gradient-1);
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .floating-circle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 15%;
            right: 15%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 10%;
            animation-delay: 2s;
        }

        .floating-circle:nth-child(3) {
            width: 100px;
            height: 100px;
            top: 50%;
            right: 5%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-30px) rotate(120deg); }
            66% { transform: translateY(-60px) rotate(240deg); }
        }

        .checkout-btn {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            padding: 15px 40px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
            color: white;
            margin-left: 20px;
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(40, 167, 69, 0.4);
            background: linear-gradient(135deg, #218838 0%, #1e7e34 100%);
        }

        .checkout-btn i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>

    <div class="container cart-container">
        <div class="cart-header">
            <h2><i class="fas fa-shopping-cart"></i>Détails du Panier</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(empty($cart))
            <div class="empty-cart">
                <i class="fas fa-shopping-cart"></i>
                <h3>Votre panier est vide</h3>
                <p>Découvrez nos produits et ajoutez-les à votre panier pour commencer vos achats.</p>
            </div>
        @else
            <div class="cart-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-box me-2"></i>Produit</th>
                            <th><i class="fas fa-euro-sign me-2"></i>Prix</th>
                            <th><i class="fas fa-sort-numeric-up me-2"></i>Quantité</th>
                            <th><i class="fas fa-calculator me-2"></i>Total</th>
                            <th><i class="fas fa-cogs me-2"></i>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($cart as $index => $item)
                            <tr>
                                <td class="product-name">{{ $item['title'] }}</td>
                                <td class="price-cell">{{ number_format($item['price'], 2, ',', ' ') }} €</td>
                                <td class="quantity-cell">{{ $item['quantity'] }}</td>
                                <td class="total-cell">{{ number_format($item['price'] * $item['quantity'], 2, ',', ' ') }} €</td>
                                <td>
                                    <form action="{{ route('detorder.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="index" value="{{ $index }}">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @php $total += $item['price'] * $item['quantity']; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart-total-container">
                <div class="cart-total">
                    <i class="fas fa-receipt"></i>
                    Total : {{ number_format($total, 2, ',', ' ') }} €
                </div>
            </div>
        @endif

        <div class="action-buttons">
             <button type="button" class="btn btn-back btn-lg" onclick="history.back()">
                        <i class="fas fa-arrow-left"></i>
                        Retour
                    </button>
            <a href="/welcome-client" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Continuer les achats
            </a>
            @if(!empty($cart))
                <button class="btn checkout-btn"> <a href="{{ route('payment') }}">
                    <i class="fas fa-credit-card"></i>
                    Procéder au paiement
                </a></button>
            @endif
        </div>
    </div>
</body>
</html
