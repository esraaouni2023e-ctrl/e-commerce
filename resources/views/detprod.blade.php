<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - {{ is_object($product) ? ($product->title ?? 'Produit inconnu') : ($product['title'] ?? 'Produit inconnu') }}</title>
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

        .product-container {
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

        .product-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient-1);
        }

        .product-image {
            width: 100%;
            height: 500px;
            border-radius: 15px;
            object-fit: cover;
            box-shadow: 0 15px 35px rgba(111, 66, 193, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 3px solid transparent;
            background: var(--gradient-1);
            background-clip: padding-box;
        }

        .product-image:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 50px rgba(111, 66, 193, 0.3);
        }

        .product-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: var(--gradient-1);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .product-category {
            display: inline-flex;
            align-items: center;
            background: var(--gradient-1);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(111, 66, 193, 0.3);
        }

        .product-category i {
            margin-right: 8px;
        }

        .price-container {
            background: linear-gradient(135deg, #f8f9ff 0%, #e9ecff 100%);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 25px;
            border: 2px solid rgba(111, 66, 193, 0.1);
        }

        .product-price {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary-purple);
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(111, 66, 193, 0.1);
        }

        .product-old-price {
            text-decoration: line-through;
            color: #999;
            font-size: 1.3rem;
            margin-left: 15px;
            opacity: 0.7;
        }

        .discount-badge {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-left: 15px;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .product-description {
            margin: 25px 0;
            line-height: 1.8;
            font-size: 1.1rem;
            color: #4a5568;
            background: rgba(111, 66, 193, 0.02);
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid var(--primary-purple);
        }

        .specs {
            margin-top: 30px;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(111, 66, 193, 0.1);
            border: 1px solid rgba(111, 66, 193, 0.1);
        }

        .specs h5 {
            color: var(--primary-purple);
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
        }

        .specs h5 i {
            margin-right: 10px;
            background: var(--gradient-1);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .specs dt {
            font-weight: 600;
            color: var(--dark-purple);
            margin-bottom: 5px;
        }

        .specs dd {
            color: #6c757d;
            margin-bottom: 15px;
            padding-left: 10px;
            border-left: 2px solid var(--light-purple);
        }

        .stock {
            margin: 25px 0;
            padding: 20px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 8px 25px rgba(111, 66, 193, 0.1);
            border: 1px solid rgba(111, 66, 193, 0.1);
        }

        .stock-label {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-purple);
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .stock-label i {
            margin-right: 10px;
        }

        .text-success {
            color: #28a745 !important;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .text-danger {
            color: #dc3545 !important;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .text-success i, .text-danger i {
            margin-right: 8px;
        }

        .btn-buy {
            margin-top: 30px;
        }

        .btn-primary {
            background: var(--gradient-1);
            border: none;
            padding: 15px 40px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(111, 66, 193, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(111, 66, 193, 0.4);
            background: var(--gradient-1);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary i {
            margin-right: 10px;
        }

        .row {
            align-items: start;
        }

        @media (max-width: 768px) {
            .product-container {
                margin: 20px;
                padding: 25px;
            }

            .product-title {
                font-size: 2rem;
            }

            .product-price {
                font-size: 1.8rem;
            }

            .product-image {
                height: 300px;
                margin-bottom: 30px;
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
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 20%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-circle:nth-child(3) {
            width: 100px;
            height: 100px;
            bottom: 10%;
            left: 5%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-30px) rotate(120deg); }
            66% { transform: translateY(-60px) rotate(240deg); }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>

    @php
        $isObject = is_object($product);
        $title = $isObject ? ($product->title ?? 'Produit inconnu') : ($product['title'] ?? 'Produit inconnu');
        $image = $isObject ? ($product->image ?? 'default-image.jpg') : ($product['image'] ?? 'default-image.jpg');
        $brand = $isObject ? ($product->category ?? 'N/A') : ($product['category'] ?? 'N/A');
        $description = $isObject ? ($product->description ?? 'Aucune description disponible') : ($product['description'] ?? 'Aucune description disponible');
        $originalPrice = $isObject ? ($product->price ?? 0) : ($product['price'] ?? 0);
        $discount = $isObject ? ($product->discount ?? 0) : ($product['discount'] ?? 0);
        $finalPrice = $originalPrice - ($originalPrice * $discount / 100);
        $stock = $isObject ? ($product->stock ?? 0) : ($product['stock'] ?? 0);
        $productId = $isObject ? ($product->id ?? null) : ($product['id'] ?? null);
        $specs = $isObject ? ($product->specs ?? []) : ($product['specs'] ?? []);
    @endphp

    <div class="container product-container">
        <div class="row">
            <!-- Image -->
            <div class="col-md-6">
                <img src="{{ asset($image) }}" alt="{{ $title }}" class="product-image">
            </div>

            <!-- Détails -->
            <div class="col-md-6">
                <h2 class="product-title">{{ $title }}</h2>

                <div class="product-category">
                    <i class="fas fa-tag"></i>
                    Marque : {{ $brand }}
                </div>

                <div class="price-container">
                    <div class="product-price">
                        {{ number_format($finalPrice, 2, ',', ' ') }} €
                        @if($discount > 0)
                            <span class="product-old-price">{{ number_format($originalPrice, 2, ',', ' ') }} €</span>
                            <span class="discount-badge">{{ $discount }}% OFF</span>
                        @endif
                    </div>
                </div>

                <div class="product-description">
                    {{ $description }}
                </div>

                <div class="specs">
                    <h5><i class="fas fa-cogs"></i>Caractéristiques :</h5>
                    <dl class="row">
                        @if(!empty($specs) && is_array($specs))
                            @foreach($specs as $key => $value)
                                <dt class="col-sm-4">{{ $key }}</dt>
                                <dd class="col-sm-8">{{ $value }}</dd>
                            @endforeach
                        @else
                            <p>Aucune caractéristique disponible</p>
                        @endif
                    </dl>
                </div>

                <div class="stock">
                    <div class="stock-label">
                        <i class="fas fa-warehouse"></i>
                        Stock :
                    </div>
                    @if($stock > 0)
                        <span class="text-success">
                            <i class="fas fa-check-circle"></i>
                            Disponible ({{ $stock }} pièces)
                        </span>
                    @else
                        <span class="text-danger">
                            <i class="fas fa-times-circle"></i>
                            Rupture de stock
                        </span>
                    @endif
                </div>
                <div class="mb-3">
    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-lg">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
</div>

                <form action="{{ route('detorder.add') }}" method="POST" class="btn-buy">
                    @csrf
                    @if($productId)
                        <input type="hidden" name="product_id" value="{{ $productId }}">
                        <input type="hidden" name="title" value="{{ $title }}">
                        <input type="hidden" name="price" value="{{ $finalPrice }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-shopping-cart"></i>
                            Ajouter au panier
                        </button>
                    @else
                        <p class="text-danger">Erreur : Identifiant du produit manquant.</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
</body>
</html>
