<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la commande #{{ $order->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to-br, #edf2ff, #dbeafe, #e0e7ff);
            min-height: 100vh;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .input-modern {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
            background: rgba(255, 255, 255, 0.9);
        }

        .input-modern:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: rgba(255, 255, 255, 1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(107, 114, 128, 0.4);
        }

        .table-modern {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .table-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .product-row {
            background: white;
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
        }

        .product-row:hover {
            border-left-color: #667eea;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateX(4px);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            margin-bottom: 24px;
        }

        .breadcrumb-item:after {
            content: '/';
            margin: 0 12px;
            color: rgba(255, 255, 255, 0.5);
        }

        .breadcrumb-item:last-child:after {
            display: none;
        }

        .quantity-input {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 8px 12px;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 80px;
        }

        .quantity-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
    </style>
</head>
<body>
    <div class="min-h-screen">
        <!-- En-tête avec gradient -->
        <div class="gradient-bg">
            <div class="container mx-auto px-6 py-8">
                <!-- Breadcrumb -->
                <nav class="breadcrumb">
                    <span class="breadcrumb-item">Dashboard</span>
                    <span class="breadcrumb-item">Commandes</span>
                    <span class="breadcrumb-item">Modification</span>
                </nav>

                <!-- Titre principal -->
                <div class="flex items-center justify-between text-white">
                    <div class="animate-fade-in">
                        <h1 class="text-4xl font-bold mb-2">Modifier la commande</h1>
                        <p class="text-lg opacity-90">Commande #{{ $order->id }} - {{ $order->user->name ?? 'Inconnu' }}</p>
                    </div>
                    <div class="glass-effect rounded-2xl p-6 text-center animate-fade-in">
                        <div class="text-2xl font-bold">#{{ $order->id }}</div>
                        <div class="text-sm opacity-80">ID Commande</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenu principal -->
        <div class="container mx-auto px-6 py-8">
            <div class="max-w-6xl mx-auto">
                <!-- Informations de la commande -->
                <div class="bg-white rounded-2xl p-8 mb-8 card-shadow animate-fade-in">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="ri-information-line text-blue-600 mr-3"></i>
                        Informations de la commande
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-6">
                            <div class="flex items-center mb-3">
                                <i class="ri-user-line text-blue-600 text-xl mr-2"></i>
                                <span class="text-blue-800 font-semibold">Client</span>
                            </div>
                            <p class="text-gray-800 font-bold text-lg">{{ $order->user->name ?? 'Inconnu' }}</p>
                            <p class="text-gray-600 text-sm">{{ $order->user->email ?? 'N/A' }}</p>
                        </div>

                        <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-xl p-6">
                            <div class="flex items-center mb-3">
                                <i class="ri-money-euro-circle-line text-green-600 text-xl mr-2"></i>
                                <span class="text-green-800 font-semibold">Total</span>
                            </div>
                            <p class="text-gray-800 font-bold text-2xl">{{ number_format($order->total, 2, ',', ' ') }} €</p>
                        </div>

                        <div class="bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl p-6">
                            <div class="flex items-center mb-3">
                                <i class="ri-time-line text-purple-600 text-xl mr-2"></i>
                                <span class="text-purple-800 font-semibold">Statut</span>
                            </div>
                            @php
                                $statusConfig = [
                                    'pending' => ['bg' => 'bg-amber-100 text-amber-800', 'text' => 'En attente'],
                                    'processing' => ['bg' => 'bg-blue-100 text-blue-800', 'text' => 'En cours'],
                                    'shipped' => ['bg' => 'bg-indigo-100 text-indigo-800', 'text' => 'Expédiée'],
                                    'delivered' => ['bg' => 'bg-green-100 text-green-800', 'text' => 'Livré'],
                                    'cancelled' => ['bg' => 'bg-red-100 text-red-800', 'text' => 'Annulée'],
                                ];
                                $config = $statusConfig[$order->status] ?? ['bg' => 'bg-gray-100 text-gray-800', 'text' => 'Inconnu'];
                            @endphp
                            <span class="status-badge {{ $config['bg'] }}">
                                <i class="ri-check-line mr-1"></i>
                                {{ $config['text'] }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Formulaire de modification -->
                <form action="{{ route('orders.update', $order->id) }}" method="POST" class="animate-fade-in">
                    @csrf
                    @method('PUT')

                    <div class="bg-white rounded-2xl card-shadow overflow-hidden table-modern">
                        <!-- En-tête du tableau -->
                        <div class="table-header p-6">
                            <h3 class="text-xl font-bold text-white flex items-center">
                                <i class="ri-shopping-cart-2-line mr-3"></i>
                                Produits de la commande
                            </h3>
                            <p class="text-white opacity-80 mt-1">Modifiez les quantités selon vos besoins</p>
                        </div>

                        <!-- Tableau des produits -->
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-8 py-4 text-left font-semibold text-gray-700">
                                            <i class="ri-product-hunt-line mr-2"></i>Produit
                                        </th>
                                        <th class="px-8 py-4 text-center font-semibold text-gray-700">
                                            <i class="ri-add-box-line mr-2"></i>Quantité
                                        </th>
                                        <th class="px-8 py-4 text-right font-semibold text-gray-700">
                                            <i class="ri-price-tag-3-line mr-2"></i>Prix unitaire
                                        </th>
                                        <th class="px-8 py-4 text-right font-semibold text-gray-700">
                                            <i class="ri-calculator-line mr-2"></i>Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderDetails as $detail)
                                        <tr class="product-row">
                                            <td class="px-8 py-6">
                                                <div class="flex items-center">
                                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                                                        <i class="ri-box-3-line text-white text-xl"></i>
                                                    </div>
                                                    <div>
                                                        <div class="font-semibold text-gray-900 text-lg">{{ $detail->product?->title ?? 'Produit supprimé' }}</div>
                                                        <div class="text-gray-500 text-sm">Article</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-8 py-6 text-center">
                                                <input type="number" name="quantities[{{ $detail->id }}]" value="{{ $detail->quantity }}" min="1"
                                                       class="quantity-input input-modern" onchange="updateTotal(this)" data-detail-id="{{ $detail->id }}">
                                            </td>
                                            <td class="px-8 py-6 text-right">
                                                <span class="font-bold text-gray-900 text-lg">{{ number_format($detail->price, 2, ',', ' ') }} €</span>
                                            </td>
                                            <td class="px-8 py-6 text-right">
                                                <span class="font-bold text-green-600 text-xl" data-total="{{ $detail->price * $detail->quantity }}" data-unit-price="{{ $detail->price }}">
                                                    {{ number_format($detail->price * $detail->quantity, 2, ',', ' ') }} €
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-gradient-to-r from-gray-50 to-gray-100">
                                    <tr>
                                        <td colspan="3" class="px-8 py-6 text-right font-bold text-gray-700 text-xl">
                                            Total de la commande :
                                        </td>
                                        <td class="px-8 py-6 text-right">
                                            <span id="grandTotal" class="font-bold text-green-600 text-2xl">{{ number_format($order->total, 2, ',', ' ') }} €</span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between mt-8">
                        <button type="button" id="backButton" class="btn-secondary text-white px-8 py-4 rounded-xl font-semibold flex items-center">
                            <i class="ri-arrow-left-line mr-2"></i>Retour
                        </button>

                        <button type="submit" class="btn-primary text-white px-12 py-4 rounded-xl font-semibold flex items-center text-lg">
                            <i class="ri-save-line mr-3"></i>Mettre à jour la commande
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Fonction pour mettre à jour le total
        function updateTotal(input) {
            const row = input.closest('tr');
            const quantity = parseInt(input.value);
            const unitPrice = parseFloat(row.querySelector('[data-unit-price]').dataset.unitPrice);
            const newTotal = quantity * unitPrice;

            row.querySelector('[data-total]').textContent = newTotal.toLocaleString('fr-FR', {
                style: 'currency',
                currency: 'EUR'
            });
            row.querySelector('[data-total]').dataset.total = newTotal;

            updateGrandTotal();
        }

        // Fonction pour mettre à jour le total général
        function updateGrandTotal() {
            let grandTotal = 0;
            document.querySelectorAll('[data-total]').forEach(element => {
                const total = parseFloat(element.dataset.total);
                grandTotal += total;
            });

            document.getElementById('grandTotal').textContent = grandTotal.toLocaleString('fr-FR', {
                style: 'currency',
                currency: 'EUR'
            });
        }

        // Bouton retour
        document.getElementById('backButton').addEventListener('click', function() {
            window.history.back();
        });

        // Animation au scroll
        window.addEventListener('scroll', function() {
            const elements = document.querySelectorAll('.animate-fade-in');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;

                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('animate-fade-in');
                }
            });
        });

        // Effet de survol sur les lignes de produits
        document.querySelectorAll('.product-row').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(8px)';
                this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.15)';
            });

            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>
</html>
