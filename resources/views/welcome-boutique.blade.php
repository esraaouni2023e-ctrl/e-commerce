<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Produits - Dashboard Pro</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #8b5cf6;
            --primary-dark: #7c3aed;
            --secondary-color: #a78bfa;
            --accent-color: #06b6d4;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --border-color: #e2e8f0;
            --bg-light: #f8fafc;
            --glass-bg: rgba(255, 255, 255, 0.9);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
            --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 80%, rgba(139, 92, 246, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(167, 139, 250, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(6, 182, 212, 0.2) 0%, transparent 50%);
            z-index: -1;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 300px;
            height: 100vh;
            background: linear-gradient(145deg, rgba(75, 0, 130, 0.95), rgba(106, 13, 173, 0.95));
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            z-index: 1000;
            padding: 2rem 0;
            box-shadow: var(--shadow-2xl);
            overflow-y: auto;
            border-right: 1px solid var(--glass-border);
        }

        .sidebar-logo {
            text-align: center;
            margin-bottom: 3rem;
            padding: 0 1.5rem;
        }

        .sidebar-logo h2 {
            color: white;
            font-size: 1.75rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .sidebar-logo .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: var(--shadow-lg);
        }

        .nav-item {
            margin: 0.75rem 1.5rem;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .nav-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, var(--primary-color), var(--secondary-color));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .nav-item:hover::before,
        .nav-item.active::before {
            opacity: 1;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            padding: 18px 24px;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            background: transparent;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(8px);
            box-shadow: var(--shadow-lg);
        }

        .nav-item.active {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.8), rgba(124, 58, 237, 0.8));
            box-shadow: var(--shadow-xl);
        }

        .nav-item.active a {
            font-weight: 600;
        }

        .nav-icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            margin-right: 15px;
            text-align: center;
            font-size: 18px;
        }

        .nav-item.tableau-de-bord .nav-icon::before { content: '📈'; }
        .nav-item.commandes .nav-icon::before { content: '🛒'; }
        .nav-item.produits .nav-icon::before { content: '📦'; }
        .nav-item.statistiques .nav-icon::before { content: '📊'; }
        .nav-item.boutique .nav-icon::before { content: '🏪'; }

        .nav-item span {
            margin-left: auto;
            font-weight: bold;
            opacity: 0.8;
        }

        .help-section {
            margin: 3rem 1.5rem 0;
            padding: 20px;
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            text-align: center;
            color: #fff;
            font-size: 14px;
            line-height: 1.6;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .help-section a {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin: 8px 6px 0;
            line-height: 40px;
            color: #fff;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .help-section a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .help-section a.youtube::before { content: '🎥'; }
        .help-section a.whatsapp::before { content: '💬'; }
        .help-section a.messenger::before { content: '📩'; }

        .main-content {
            margin-left: 300px;
            min-height: 100vh;
            padding: 2rem;
        }

        .page-header {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--glass-border);
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color), var(--accent-color));
        }

        .header-content {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .header-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-xl);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .page-header h1 {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .page-header p {
            color: var(--text-light);
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .security-notice {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            color: var(--danger-color);
            padding: 1rem 1.5rem;
            border-radius: 16px;
            font-size: 0.9rem;
            border: 1px solid #fecaca;
            box-shadow: var(--shadow-sm);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert {
            padding: 1.5rem 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            border: none;
            box-shadow: var(--shadow-md);
            backdrop-filter: blur(10px);
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
            color: #065f46;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: inherit;
            opacity: 0.6;
            cursor: pointer;
            float: right;
            transition: opacity 0.3s ease;
        }

        .btn-close:hover {
            opacity: 1;
        }

        .card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--glass-border);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-2xl);
        }

        .card-header {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(167, 139, 250, 0.05));
            padding: 2rem;
            border-bottom: 1px solid var(--glass-border);
        }

        .card-body {
            padding: 2rem;
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 16px;
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-xl);
        }

        .btn-light {
            background: rgba(255, 255, 255, 0.9);
            color: var(--text-dark);
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(10px);
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger-color), #dc2626);
            color: white;
        }

        .btn-outline-dark {
            background: transparent;
            color: var(--text-dark);
            border: 2px solid var(--border-color);
            backdrop-filter: blur(10px);
        }

        .btn-outline-dark:hover {
            background: var(--text-dark);
            color: white;
            transform: translateY(-2px);
        }

        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .selection-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--text-light);
            font-weight: 500;
        }

        .add-product-btn {
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
            padding: 1rem 2rem;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .add-product-btn:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-2xl);
        }

        .add-product-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .add-product-btn:hover::before {
            left: 100%;
        }

        .nav-tabs-custom {
            border-bottom: 3px solid var(--border-color);
            margin-bottom: 2rem;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 16px 16px 0 0;
            padding: 0 1rem;
            backdrop-filter: blur(10px);
        }

        .nav-tabs-custom .nav-link {
            background: none;
            border: none;
            padding: 1.25rem 2rem;
            color: var(--text-light);
            font-weight: 600;
            border-radius: 0;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .nav-tabs-custom .nav-link.active {
            color: var(--primary-color);
            border-bottom: 4px solid var(--primary-color);
            background: rgba(139, 92, 246, 0.1);
        }

        .badge {
            padding: 0.5rem 0.75rem;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .bg-danger-subtle {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            border: 1px solid #fecaca;
        }

        .text-danger {
            color: var(--danger-color);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--glass-border);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: var(--shadow-2xl);
        }

        .product-img {
            position: relative;
            overflow: hidden;
            height: 250px;
            border-radius: 20px 20px 0 0;
        }

        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-img:hover img {
            transform: scale(1.15);
        }

        .product-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.8), rgba(124, 58, 237, 0.8));
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            opacity: 0;
            transition: all 0.4s ease;
            backdrop-filter: blur(5px);
        }

        .product-img:hover .product-overlay {
            opacity: 1;
        }

        .product-card .card-body {
            padding: 2rem;
        }

        .product-card .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .product-card .card-text {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .manufacturer-info {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: rgba(139, 92, 246, 0.05);
            border-radius: 12px;
            border-left: 4px solid var(--primary-color);
        }

        .manufacturer-info strong {
            color: var(--text-dark);
            font-size: 1rem;
        }

        .manufacturer-info small {
            color: var(--text-light);
            font-size: 0.85rem;
        }

        .price-section {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
            border-radius: 12px;
            text-align: center;
        }

        .price-current {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--success-color);
        }

        .price-original {
            color: var(--text-light);
            text-decoration: line-through;
            margin-left: 0.75rem;
            font-size: 1.1rem;
        }

        .product-badges {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .badge-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
        }

        .badge-info {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
            color: white;
        }

        .badge-danger {
            background: linear-gradient(135deg, var(--danger-color), #dc2626);
            color: white;
        }

        .discount-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: linear-gradient(135deg, var(--danger-color), #dc2626);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.85rem;
            box-shadow: var(--shadow-md);
            z-index: 10;
        }

        .empty-state {
            grid-column: 1/-1;
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-state-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 4rem;
            box-shadow: var(--shadow-xl);
            border: 1px solid var(--glass-border);
            max-width: 600px;
            margin: 0 auto;
        }

        .empty-state-icon {
            font-size: 5rem;
            color: var(--text-light);
            margin-bottom: 2rem;
        }

        .empty-state h3 {
            color: var(--text-dark);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .empty-state p {
            color: var(--text-light);
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .product-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .header-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .card-header {
                padding: 1.5rem;
            }

            .card-body {
                padding: 1.5rem;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card {
            animation: fadeIn 0.6s ease-out;
        }

        .product-card:nth-child(2) { animation-delay: 0.1s; }
        .product-card:nth-child(3) { animation-delay: 0.2s; }
        .product-card:nth-child(4) { animation-delay: 0.3s; }
        .product-card:nth-child(5) { animation-delay: 0.4s; }
        .product-card:nth-child(6) { animation-delay: 0.5s; }

        .floating-add-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 1000;
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-2xl);
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 1.5rem;
        }

        .floating-add-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.4);
        }

        @media (min-width: 769px) {
            .floating-add-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <h2>
                <div class="logo-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                Dashboard
            </h2>
        </div>

        <div class="nav-item tableau-de-bord">
            <a href="{{ route('tab') }}">
                <span class="nav-icon"></span>
                Tableau de bord
            </a>
        </div>
        <div class="nav-item commandes">
            <a href="{{ '/order' }}">
                <span class="nav-icon"></span>
                Commandes
            </a>
        </div>
        <div class="nav-item produits active">
            <a href="{{ route('welcomeb') }}">
                <span class="nav-icon"></span>
                Produits
                <span>&gt;</span>
            </a>
        </div>
        <div class="nav-item statistiques">
            <a href="{{ route('stat') }}">
                <span class="nav-icon"></span>
                Statistiques
                <span>&gt;</span>
            </a>
        </div>
        <div class="nav-item boutique">
            <a href="{{ route('parab') }}">
                <span class="nav-icon"></span>
                Boutique
                <span>&gt;</span>
            </a>
        </div>

        <div class="help-section">
            Besoin d'aide ?<br>
            <a href="#" class="youtube"></a>
            <a href="#" class="whatsapp"></a>
            <a href="#" class="messenger"></a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div class="header-content">
                <div class="header-icon">
                    <i class="fas fa-box"></i>
                </div>
                <h1>📦 Gestion des Produits</h1>
                <p>Ajoutez, modifiez ou supprimez les produits de votre catalogue.</p>
                <div class="security-notice">
                    <i class="fas fa-lock"></i>
                    Interface réservée à l'administration – Ne pas partager avec les clients
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
            </div>
        @endif

        <!-- Product Management Card -->
        <div class="card">
            <div class="card-header">
                <div class="header-actions">
                    <div class="selection-info">
                        <span id="selection-element" style="display: none;">
                            Sélectionné: <span id="select-content" style="font-weight: 600;">0</span>
                            <button type="button" class="btn btn-danger" style="margin-left: 1rem; padding: 0.75rem 1.5rem;">
                                <i class="fas fa-trash"></i>
                                Supprimer
                            </button>
                        </span>
                    </div>
                    <!-- Bouton Ajouter Produit - Toujours visible -->
                    <a href="{{ URL('/addproduct2') }}" class="add-product-btn" id="add-product-btn">
                        <i class="fas fa-plus"></i>
                        Ajouter un produit
                    </a>
                </div>
            </div>

            <div class="card-header" style="background: rgba(255, 255, 255, 0.7); padding-top: 0; border-bottom: none;">
                <ul class="nav-tabs-custom">
                    <li class="nav-item">
                        <a class="nav-link active" href="#all-products" data-bs-toggle="tab">Tous les produits <span class="badge bg-danger-subtle text-danger">{{ $products->count() ?? 0 }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#active-products" data-bs-toggle="tab">Actifs <span class="badge bg-danger-subtle text-danger">{{ $products->where('status', 'active')->count() ?? 0 }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#out-of-stock" data-bs-toggle="tab">En rupture <span class="badge bg-danger-subtle text-danger">{{ $products->where('status', 'out_of_stock')->count() ?? 0 }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#archived" data-bs-toggle="tab">Archivés <span class="badge bg-danger-subtle text-danger">{{ $products->where('status', 'archived')->count() ?? 0 }}</span></a>
                    </li>
                </ul>
            </div>
                        <div class="card-body">
                <div class="tab-content">
                    <!-- Tous les produits -->
                    <div class="tab-pane fade show active" id="all-products">
                        @if($products->isEmpty())
                            <div style="grid-column: 1/-1; text-align: center; padding: 3rem;">
                                <div style="background: white; border-radius: 20px; padding: 3rem; box-shadow: var(--shadow-md);">
                                    <i class="fas fa-box-open" style="font-size: 4rem; color: var(--text-light); margin-bottom: 1rem;"></i>
                                    <h3 style="color: var(--text-dark); margin-bottom: 1rem;">Aucun produit disponible</h3>
                                    <p style="color: var(--text-light); margin-bottom: 2rem;">Commencez par ajouter votre premier produit à votre catalogue.</p>
                                </div>
                            </div>
                        @else
                            <div class="product-grid">
                                @foreach($products as $product)
                                    <div class="product-card">
                                        @if($product->discount > 0)
                                            <div class="badge badge-danger" style="position: absolute; top: 1rem; left: 1rem;">
                                                -{{ $product->discount }}%
                                            </div>
                                        @endif
                                        <div class="product-img">
                                            @if($product->main_image)
                                                <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->title }}">
                                            @else
                                                <div style="height: 220px; background: var(--secondary-color); display: flex; align-items: center; justify-content: center; color: var(--text-light);">
                                                    <i class="fas fa-image" style="font-size: 3rem;"></i>
                                                </div>
                                            @endif
                                            <div class="product-overlay">
                                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-light">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Vraiment supprimer ce produit ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $product->title }}</h6>
                                            <div style="margin-bottom: 1rem;">
                                                <strong>{{ $product->manufacturer_name }}</strong><br>
                                                <small style="color: var(--text-light);">{{ $product->manufacturer_brand }}</small>
                                            </div>
                                            <p class="card-text">
                                                {{ Str::limit($product->description, 80) }}
                                            </p>
                                            <div class="price-section">
                                                @if($product->discount > 0)
                                                    <span class="price-current">
                                                        ${{ number_format($product->price * (1 - $product->discount / 100), 2) }}
                                                    </span>
                                                    <small class="price-original">
                                                        ${{ number_format($product->price, 2) }}
                                                    </span>
                                                @else
                                                    <span class="price-current">${{ number_format($product->price, 2) }}</span>
                                                @endif
                                            </div>
                                            <div class="product-badges">
                                                <span class="badge badge-primary">Stock: {{ $product->stock }}</span>
                                                <span class="badge badge-info">Vendus: {{ $product->orders }}</span>
                                                @if($product->status == 'active')
                                                    <span class="badge badge-primary">Actif</span>
                                                @elseif($product->status == 'out_of_stock')
                                                    <span class="badge badge-danger">Rupture</span>
                                                @else
                                                    <span class="badge badge-info">Archivé</span>
                                                @endif
                                            </div>
                                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-dark" style="width: 100%;">
                                                <i class="fas fa-eye"></i>
                                                Voir détails
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Produits actifs -->
                    <div class="tab-pane fade" id="active-products">
                        <div class="product-grid">
                            @foreach($products->where('status', 'active') as $product)
                                <div class="product-card">
                                    @if($product->discount > 0)
                                        <div class="badge badge-danger" style="position: absolute; top: 1rem; left: 1rem;">
                                            -{{ $product->discount }}%
                                        </div>
                                    @endif
                                    <div class="product-img">
                                        @if($product->main_image)
                                            <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->title }}">
                                        @else
                                            <div style="height: 220px; background: var(--secondary-color); display: flex; align-items: center; justify-content: center; color: var(--text-light);">
                                                <i class="fas fa-image" style="font-size: 3rem;"></i>
                                            </div>
                                        @endif
                                        <div class="product-overlay">
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-light">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Vraiment supprimer ce produit ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $product->title }}</h6>
                                        <div style="margin-bottom: 1rem;">
                                            <strong>{{ $product->manufacturer_name }}</strong><br>
                                            <small style="color: var(--text-light);">{{ $product->manufacturer_brand }}</small>
                                        </div>
                                        <p class="card-text">
                                            {{ Str::limit($product->description, 80) }}
                                        </p>
                                        <div class="price-section">
                                            @if($product->discount > 0)
                                                <span class="price-current">
                                                    ${{ number_format($product->price * (1 - $product->discount / 100), 2) }}
                                                </span>
                                                <small class="price-original">
                                                    ${{ number_format($product->price, 2) }}
                                                </span>
                                            @else
                                                <span class="price-current">${{ number_format($product->price, 2) }}</span>
                                            @endif
                                        </div>
                                        <div class="product-badges">
                                            <span class="badge badge-primary">Stock: {{ $product->stock }}</span>
                                            <span class="badge badge-info">Vendus: {{ $product->orders }}</span>
                                            <span class="badge badge-primary">Actif</span>
                                        </div>
                                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-dark" style="width: 100%;">
                                            <i class="fas fa-eye"></i>
                                            Voir détails
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Produits en rupture -->
                    <div class="tab-pane fade" id="out-of-stock">
                        <div class="product-grid">
                            @foreach($products->where('status', 'out_of_stock') as $product)
                                <div class="product-card">
                                    @if($product->discount > 0)
                                        <div class="badge badge-danger" style="position: absolute; top: 1rem; left: 1rem;">
                                            -{{ $product->discount }}%
                                        </div>
                                    @endif
                                    <div class="product-img">
                                        @if($product->main_image)
                                            <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->title }}">
                                        @else
                                            <div style="height: 220px; background: var(--secondary-color); display: flex; align-items: center; justify-content: center; color: var(--text-light);">
                                                <i class="fas fa-image" style="font-size: 3rem;"></i>
                                            </div>
                                        @endif
                                        <div class="product-overlay">
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-light">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Vraiment supprimer ce produit ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $product->title }}</h6>
                                        <div style="margin-bottom: 1rem;">
                                            <strong>{{ $product->manufacturer_name }}</strong><br>
                                            <small style="color: var(--text-light);">{{ $product->manufacturer_brand }}</small>
                                        </div>
                                        <p class="card-text">
                                            {{ Str::limit($product->description, 80) }}
                                        </p>
                                        <div class="price-section">
                                            @if($product->discount > 0)
                                                <span class="price-current">
                                                    ${{ number_format($product->price * (1 - $product->discount / 100), 2) }}
                                                </span>
                                                <small class="price-original">
                                                    ${{ number_format($product->price, 2) }}
                                                </span>
                                            @else
                                                <span class="price-current">${{ number_format($product->price, 2) }}</span>
                                            @endif
                                        </div>
                                        <div class="product-badges">
                                            <span class="badge badge-primary">Stock: {{ $product->stock }}</span>
                                            <span class="badge badge-info">Vendus: {{ $product->orders }}</span>
                                            <span class="badge badge-danger">Rupture</span>
                                        </div>
                                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-dark" style="width: 100%;">
                                            <i class="fas fa-eye"></i>
                                            Voir détails
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Produits archivés -->
                    <div class="tab-pane fade" id="archived">
                        <div class="product-grid">
                            @foreach($products->where('status', 'archived') as $product)
                                <div class="product-card">
                                    @if($product->discount > 0)
                                        <div class="badge badge-danger" style="position: absolute; top: 1rem; left: 1rem;">
                                            -{{ $product->discount }}%
                                        </div>
                                    @endif
                                    <div class="product-img">
                                        @if($product->main_image)
                                            <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->title }}">
                                        @else
                                            <div style="height: 220px; background: var(--secondary-color); display: flex; align-items: center; justify-content: center; color: var(--text-light);">
                                                <i class="fas fa-image" style="font-size: 3rem;"></i>
                                            </div>
                                        @endif
                                        <div class="product-overlay">
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-light">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Vraiment supprimer ce produit ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $product->title }}</h6>
                                        <div style="margin-bottom: 1rem;">
                                            <strong>{{ $product->manufacturer_name }}</strong><br>
                                            <small style="color: var(--text-light);">{{ $product->manufacturer_brand }}</small>
                                        </div>
                                        <p class="card-text">
                                            {{ Str::limit($product->description, 80) }}
                                        </p>
                                        <div class="price-section">
                                            @if($product->discount > 0)
                                                <span class="price-current">
                                                    ${{ number_format($product->price * (1 - $product->discount / 100), 2) }}
                                                </span>
                                                <small class="price-original">
                                                    ${{ number_format($product->price, 2) }}
                                                </span>
                                            @else
                                                <span class="price-current">${{ number_format($product->price, 2) }}</span>
                                            @endif
                                        </div>
                                        <div class="product-badges">
                                            <span class="badge badge-primary">Stock: {{ $product->stock }}</span>
                                            <span class="badge badge-info">Vendus: {{ $product->orders }}</span>
                                            <span class="badge badge-info">Archivé</span>
                                        </div>
                                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-dark" style="width: 100%;">
                                            <i class="fas fa-eye"></i>
                                            Voir détails
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation d'apparition des cartes produits
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.product-card');

            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';

                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });

            const addProductBtn = document.getElementById('add-product-btn');
            const addProductBtnEmpty = document.getElementById('add-product-btn-empty');

            if (addProductBtn) {
                addProductBtn.addEventListener('click', function(event) {
                    console.log('Add product button (header) clicked, redirecting to:', this.href);
                });
            }

            if (addProductBtnEmpty) {
                addProductBtnEmpty.addEventListener('click', function(event) {
                    console.log('Add product button (empty state) clicked, redirecting to:', this.href);
                });
            }

            // Fermeture des alertes
            document.querySelectorAll('.btn-close').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.closest('.alert').style.display = 'none';
                });
            });

            // Animation au survol des éléments de navigation
            document.querySelectorAll('.nav-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(8px)';
                });

                item.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('active')) {
                        this.style.transform = 'translateX(0)';
                    }
                });
            });

            // Gestion des onglets
            document.querySelectorAll('.nav-tabs-custom .nav-link').forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelectorAll('.nav-tabs-custom .nav-link').forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                    document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('show', 'active'));
                    document.querySelector(this.getAttribute('href')).classList.add('show', 'active');
                });
            });
        });
    </script>
</body>
</html>
