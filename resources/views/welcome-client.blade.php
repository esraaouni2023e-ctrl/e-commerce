<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxeShop - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --primary: #7c3aed;
            --primary-dark: #6d28d9;
            --secondary: #ec4899;
            --dark: #0f172a;
            --dark-light: #1e293b;
            --gray: #64748b;
            --gray-light: #f8fafc;
            --border: #e2e8f0;
            --success: #10b981;
            --danger: #ef4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            color: var(--dark);
            line-height: 1.6;
        }

        /* ===== NAVBAR PRO ===== */
        .navbar-pro {
            background: linear-gradient(135deg, #6d28d9 0%, #7c3aed 50%, #a855f7 100%);
            box-shadow: 0 4px 20px rgba(124, 58, 237, 0.15);
            padding: 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: white;
            text-decoration: none;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-menu {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            flex: 1;
            justify-content: center;
        }

        .nav-item-pro {
            position: relative;
        }

        .nav-link-pro {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .nav-link-pro:hover,
        .nav-link-pro.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateY(-2px);
        }

        .nav-link-pro i {
            font-size: 1.1rem;
        }

        .nav-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .help-links {
            display: flex;
            gap: 0.5rem;
        }

        .help-link {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .help-link:hover {
            background: white;
            color: var(--primary);
            transform: scale(1.1);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: white;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: var(--danger);
            border-color: var(--danger);
            transform: translateY(-2px);
        }

        /* ===== HERO SECTION ===== */
        .hero-modern {
            margin-top: 80px;
            background: linear-gradient(135deg, #1e1b4b 0%, #3730a3 50%, #7c3aed 100%);
            padding: 4rem 2rem;
            border-radius: 24px;
            position: relative;
            overflow: hidden;
            margin-bottom: 3rem;
        }

        .hero-modern::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.3), transparent);
            border-radius: 50%;
            animation: pulse 10s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 0;
        }

        /* ===== MAIN CONTAINER ===== */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* ===== FILTERS & TABS ===== */
        .controls-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        .tabs-modern {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid var(--border);
            padding-bottom: 0;
        }

        .tab-btn {
            padding: 1rem 2rem;
            background: none;
            border: none;
            color: var(--gray);
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
        }

        .tab-btn:hover {
            color: var(--primary);
        }

        .tab-btn.active {
            color: var(--primary);
            border-bottom-color: var(--primary);
        }

        .tab-badge {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-left: 0.5rem;
        }

        /* ===== PRODUCT GRID ===== */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .product-card-modern {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            border: 1px solid var(--border);
        }

        .product-card-modern:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(124, 58, 237, 0.15);
            border-color: var(--primary);
        }

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            background: var(--gray-light);
            height: 280px;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card-modern:hover .product-image-wrapper img {
            transform: scale(1.1);
        }

        .discount-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: linear-gradient(135deg, var(--danger), #dc2626);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .product-actions {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
            opacity: 0;
            transform: translateX(20px);
            transition: all 0.3s ease;
        }

        .product-card-modern:hover .product-actions {
            opacity: 1;
            transform: translateX(0);
        }

        .action-btn {
            width: 40px;
            height: 40px;
            background: white;
            border: none;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--dark);
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .action-btn:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-category {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .category-badge {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 0.35rem 0.85rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-brand {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 0.75rem;
        }

        .product-description {
            font-size: 0.9rem;
            color: var(--gray);
            line-height: 1.6;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-pricing {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .price-current {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .price-original {
            font-size: 1rem;
            color: var(--gray);
            text-decoration: line-through;
        }

        .product-meta {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .meta-badge {
            padding: 0.4rem 0.85rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .meta-badge.stock {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .meta-badge.orders {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
        }

        .view-details-btn {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .view-details-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(124, 58, 237, 0.3);
        }

        /* ===== FOOTER ===== */
        footer {
            background: var(--dark);
            color: rgba(255, 255, 255, 0.7);
            padding: 4rem 2rem 2rem;
            margin-top: 5rem;
            border-top: 4px solid var(--primary);
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-column h5 {
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .footer-column p,
        .footer-column a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            line-height: 2;
            transition: color 0.3s ease;
        }

        .footer-column a:hover {
            color: white;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .navbar-container {
                flex-wrap: wrap;
            }

            .nav-menu {
                order: 3;
                width: 100%;
                justify-content: flex-start;
                overflow-x: auto;
                padding-top: 1rem;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
                gap: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar-pro">
        <div class="navbar-container">
            <a href="#" class="brand">
                <div class="brand-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <span class="brand-text">LUXESHOP</span>
            </a>

            <div class="nav-menu">
                <div class="nav-item-pro">
                    <a href="/modiprofil" class="nav-link-pro">
                        <i class="fas fa-user"></i>
                        <span>Mon Compte</span>
                    </a>
                </div>
                <div class="nav-item-pro">
                    <a href="/orr" class="nav-link-pro">
                        <i class="fas fa-box"></i>
                        <span>Mes Commandes</span>
                    </a>
                </div>
                <div class="nav-item-pro">
                    <a href="/detorder" class="nav-link-pro">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Panier</span>
                    </a>
                </div>
            </div>

            <div class="nav-actions">
                <div class="help-links">
                    <a href="#" class="help-link"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="help-link"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="help-link"><i class="fab fa-facebook-messenger"></i></a>
                </div>

                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="main-container">
        <div class="hero-modern">
            <div class="hero-content">
                <h1>Elegance in Every Luxurious Drop</h1>
                <p>Where elegance, luxury, and refinement unite, creating beauty in every detail</p>
            </div>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Controls Section -->
        <div class="controls-section">
            <div class="tabs-modern">
                <button class="tab-btn active" data-tab="all">
                    Tous les produits
                    <span class="tab-badge">10</span>
                </button>
                <button class="tab-btn" data-tab="published">
                    Publiés
                </button>
                <button class="tab-btn" data-tab="draft">
                    Brouillons
                </button>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="products-grid" id="products-grid">
            <!-- Product Card 1 -->
            <div class="product-card-modern">
                <div class="product-image-wrapper">
                    <img src="assets/images/products/img-1.png" alt="Half Sleeve Round Neck T-Shirts">
                    <div class="product-actions">
                        <a href="{{ route('product.edit', 1) }}" class="action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">
                        <span class="category-badge">Fashion</span>
                    </div>
                    <h3 class="product-title">Half Sleeve Round Neck T-Shirts</h3>
                    <p class="product-brand">Apparel</p>
                    <p class="product-description">Comfortable and stylish half sleeve round neck t-shirt.</p>
                    <div class="product-pricing">
                        <span class="price-current">$215.00</span>
                    </div>
                    <div class="product-meta">
                        <span class="meta-badge stock"><i class="fas fa-box"></i> Stock: 48</span>
                        <span class="meta-badge orders"><i class="fas fa-shopping-bag"></i> Vendus: 120</span>
                    </div>
                    <a href="{{ route('product.show', 1) }}" class="view-details-btn">
                        <i class="fas fa-eye"></i>
                        <span>Voir détails</span>
                    </a>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="product-card-modern">
                <div class="product-image-wrapper">
                    <img src="assets/images/products/img-2.png" alt="Urban Ladder Pashe Chair">
                    <div class="product-actions">
                        <a href="{{ route('product.edit', 2) }}" class="action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">
                        <span class="category-badge">Furniture</span>
                    </div>
                    <h3 class="product-title">Urban Ladder Pashe Chair</h3>
                    <p class="product-brand">Seating</p>
                    <p class="product-description">Modern and comfortable chair for your living space.</p>
                    <div class="product-pricing">
                        <span class="price-current">$160.00</span>
                    </div>
                    <div class="product-meta">
                        <span class="meta-badge stock"><i class="fas fa-box"></i> Stock: 30</span>
                        <span class="meta-badge orders"><i class="fas fa-shopping-bag"></i> Vendus: 80</span>
                    </div>
                    <a href="{{ route('product.show', 2) }}" class="view-details-btn">
                        <i class="fas fa-eye"></i>
                        <span>Voir détails</span>
                    </a>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="product-card-modern">
                <div class="product-image-wrapper">
                    <img src="assets/images/products/img-3.png" alt="350 ml Glass Grocery Container">
                    <div class="product-actions">
                        <a href="{{ route('product.edit', 3) }}" class="action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">
                        <span class="category-badge">Grocery</span>
                    </div>
                    <h3 class="product-title">350 ml Glass Grocery Container</h3>
                    <p class="product-brand">Storage</p>
                    <p class="product-description">Durable glass container for grocery storage.</p>
                    <div class="product-pricing">
                        <span class="price-current">$125.00</span>
                    </div>
                    <div class="product-meta">
                        <span class="meta-badge stock"><i class="fas fa-box"></i> Stock: 48</span>
                        <span class="meta-badge orders"><i class="fas fa-shopping-bag"></i> Vendus: 150</span>
                    </div>
                    <a href="{{ route('product.show', 3) }}" class="view-details-btn">
                        <i class="fas fa-eye"></i>
                        <span>Voir détails</span>
                    </a>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="product-card-modern">
                <div class="product-image-wrapper">
                    <img src="assets/images/products/img-4.png" alt="Fabric Dual Tone Living Room Chair">
                    <div class="product-actions">
                        <a href="{{ route('product.edit', 4) }}" class="action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">
                        <span class="category-badge">Furniture</span>
                    </div>
                    <h3 class="product-title">Fabric Dual Tone Living Room Chair</h3>
                    <p class="product-brand">Seating</p>
                    <p class="product-description">Elegant dual-tone chair for modern interiors.</p>
                    <div class="product-pricing">
                        <span class="price-current">$340.00</span>
                    </div>
                    <div class="product-meta">
                        <span class="meta-badge stock"><i class="fas fa-box"></i> Stock: 40</span>
                        <span class="meta-badge orders"><i class="fas fa-shopping-bag"></i> Vendus: 90</span>
                    </div>
                    <a href="{{ route('product.show', 4) }}" class="view-details-btn">
                        <i class="fas fa-eye"></i>
                        <span>Voir détails</span>
                    </a>
                </div>
            </div>

            <!-- Product Card 5 -->
            <div class="product-card-modern">
                <div class="product-image-wrapper">
                    <img src="assets/images/products/img-5.png" alt="Crux Motorsports Helmet">
                    <div class="product-actions">
                        <a href="{{ route('product.edit', 5) }}" class="action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">
                        <span class="category-badge">Automotive</span>
                    </div>
                    <h3 class="product-title">Crux Motorsports Helmet</h3>
                    <p class="product-brand">Safety Gear</p>
                    <p class="product-description">High-quality helmet for motorsport enthusiasts.</p>
                    <div class="product-pricing">
                        <span class="price-current">$175.00</span>
                    </div>
                    <div class="product-meta">
                        <span class="meta-badge stock"><i class="fas fa-box"></i> Stock: 55</span>
                        <span class="meta-badge orders"><i class="fas fa-shopping-bag"></i> Vendus: 110</span>
                    </div>
                    <a href="{{ route('product.show', 5) }}" class="view-details-btn">
                        <i class="fas fa-eye"></i>
                        <span>Voir détails</span>
                    </a>
                </div>
            </div>

            <!-- Product Card 6 -->
            <div class="product-card-modern">
                <div class="product-image-wrapper">
                    <img src="assets/images/products/img-6.png" alt="Half Sleeve T-Shirts (Blue)">
                    <div class="product-actions">
                        <a href="{{ route('product.edit', 6) }}" class="action-btn">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">
                        <span class="category-badge">Fashion</span>
                    </div>
                    <h3 class="product-title">Half Sleeve T-Shirts (Blue)</h3>
                    <p class="product-brand">Apparel</p>
                    <p class="product-description">Stylish blue half sleeve t-shirt for casual wear.</p>
                    <div class="product-pricing">
                        <span class="price-current">$225.00</span>
                    </div>
                    <div class="product-meta">
                        <span class="meta-badge stock"><i class="fas fa-box"></i> Stock: 48</span>
                        <span class="meta-badge orders"><i class="fas fa-shopping-bag"></i> Vendus: 130</span>
                    </div>
                    <a href="{{ route('product.show', 6) }}" class="view-details-btn">
                        <i class="fas fa-eye"></i>
                        <span>Voir détails</span>
                    </a>
                </div>
            </div>

            <!-- Product Card 7 -->
            <div class="product-card-modern">
                <div class="product-
