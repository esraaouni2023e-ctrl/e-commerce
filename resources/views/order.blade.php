<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Commandes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .table-modern {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .table-header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .table-row {
            background: rgba(255, 255, 255, 0.95);
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(147, 51, 234, 0.1);
        }

        .table-row:hover {
            background: rgba(255, 255, 255, 1);
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(147, 51, 234, 0.1);
        }

        .status-badge {
            position: relative;
            overflow: hidden;
        }

        .status-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.5s;
        }

        .status-badge:hover::before {
            left: 100%;
        }

        .action-btn {
            position: relative;
            transition: all 0.3s ease;
            border-radius: 8px;
            padding: 8px;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .pagination-modern {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            padding: 16px;
            margin-top: 24px;
        }

        .page-link {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 500;
        }

        .page-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .empty-state {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-radius: 16px;
            padding: 60px 20px;
            text-align: center;
            color: white;
        }

        .search-bar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 12px 16px;
            color: white;
            width: 100%;
            max-width: 300px;
        }

        .search-bar::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .filter-btn {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .filter-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .avatar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 14px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .stats-card {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .stats-card:hover {
            border-color: #4f46e5;
            transform: translateY(-3px);
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .floating-action {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            border: none;
            box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .floating-action:hover {
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 12px 35px rgba(79, 70, 229, 0.5);
        }

        .btn-back {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 12px;
            color: white;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .btn-back:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateX(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <!-- En-tête -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('welcomeb') }}" class="btn-back" title="Retour">
                        <i class="ri-arrow-left-line"></i>
                    </a>
                    <div>
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
                            Historique des Commandes
                        </h1>
                        <p class="text-gray-600 mt-2">Gérez et suivez toutes vos commandes en temps réel</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="button" class="filter-btn">
                        <i class="ri-file-download-line mr-2"></i>Importer
                    </button>
                    <button type="button" class="filter-btn bg-red-500 hover:bg-red-600">
                        <i class="ri-delete-bin-2-line mr-2"></i>Supprimer
                    </button>
                </div>
            </div>

            <!-- Section de recherche et filtres -->
            <div class="mb-6">
                <div class="flex flex-wrap gap-4">
                    <div class="relative">
                        <input type="text" class="search-bar" placeholder="Rechercher par ID, client, statut...">
                        <i class="ri-search-line absolute left-4 top-1/2 transform -translate-y-1/2 text-white opacity-70"></i>
                    </div>
                    <input type="date" class="search-bar">
                    <select class="search-bar">
                        <option value="all" selected>Tous</option>
                        <option value="Pending">En attente</option>
                        <option value="Inprogress">En cours</option>
                        <option value="Cancelled">Annulé</option>
                        <option value="Delivered">Livré</option>
                    </select>
                    <select class="search-bar">
                        <option value="">Paiement</option>
                        <option value="all" selected>Tous</option>
                        <option value="Mastercard">Mastercard</option>
                        <option value="Visa">Visa</option>
                        <option value="Paypal">Paypal</option>
                        <option value="COD">Paiement à la livraison</option>
                    </select>
                    <button type="button" class="filter-btn">
                        <i class="ri-equalizer-fill mr-2"></i>Filtrer
                    </button>
                </div>

                <!-- Statistiques rapides -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                    <div class="stats-card">
                        <div class="stats-number">1,247</div>
                        <div class="text-muted">Total Commandes</div>
                    </div>
                    <div class="stats-card">
                        <div class="stats-number">892</div>
                        <div class="text-muted">Livrées</div>
                    </div>
                    <div class="stats-card">
                        <div class="stats-number">123</div>
                        <div class="text-muted">En attente</div>
                    </div>
                    <div class="stats-card">
                        <div class="stats-number">32</div>
                        <div class="text-muted">Annulées</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau moderne -->
        <div class="table-modern">
            <!-- En-tête du tableau -->
            <div class="table-header p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <input type="checkbox" id="selectAll" class="w-4 h-4 text-purple-600 border-2 border-white rounded focus:ring-purple-500">
                            <label for="selectAll" class="ml-2 text-white font-medium">Tout sélectionner</label>
                        </div>
                    </div>
                    <div class="text-white font-medium">
                        <i class="ri-database-2-line mr-2"></i>Liste des commandes
                    </div>
                </div>
            </div>

            <!-- Contenu du tableau -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-white">
                            <th class="px-6 py-4 text-left font-semibold">
                                <input type="checkbox" class="w-4 h-4 text-purple-600 border-2 border-white rounded">
                            </th>
                            <th class="px-6 py-4 text-left font-semibold">ID Commande</th>
                            <th class="px-6 py-4 text-left font-semibold">Client</th>
                            <th class="px-6 py-4 text-left font-semibold">Produit</th>
                            <th class="px-6 py-4 text-left font-semibold">Date</th>
                            <th class="px-6 py-4 text-left font-semibold">Montant</th>
                            <th class="px-6 py-4 text-left font-semibold">Paiement</th>
                            <th class="px-6 py-4 text-left font-semibold">Statut</th>
                            <th class="px-6 py-4 text-left font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr class="table-row">
                                <td class="px-6 py-4">
                                    <input type="checkbox" class="w-4 h-4 text-purple-600 border-gray-300 rounded">
                                </td>
                                <td class="px-6 py-4 font-bold text-purple-600">#{{ $order->id }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="avatar">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</div>
                                        <div>
                                            <div class="font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                                            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    @foreach($order->orderDetails as $detail)
                                        <div class="mb-1">
                                            <span class="font-medium text-gray-900">
                                                {{ $detail->product?->title ?? 'Produit supprimé' }}
                                            </span>
                                            <span class="text-gray-500 text-sm"> ×{{ $detail->quantity }}</span>
                                        </div>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 text-gray-700">
                                    <div class="font-medium">{{ $order->created_at->format('d M') }}</div>
                                    <div class="text-xs text-gray-500">{{ $order->created_at->format('H:i') }}</div>
                                </td>
                                <td class="px-6 py-4 font-bold text-green-600 text-lg">
                                    {{ number_format($order->total, 2, ',', ' ') }} €
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <i class="ri-mastercard-fill text-yellow-500 mr-2 text-xl"></i>
                                        <span class="text-gray-700 font-medium">Mastercard</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
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
                                    <span class="status-badge inline-flex px-4 py-2 rounded-full text-xs font-semibold {{ $config['bg'] }}">
                                        {{ $config['text'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('orders.show', $order->id) }}" class="action-btn bg-blue-500 text-white hover:bg-blue-600" title="Voir">
                                            <i class="ri-eye-fill"></i>
                                        </a>
                                        <a href="{{ route('orders.edit', $order->id) }}" class="action-btn bg-amber-500 text-white hover:bg-amber-600" title="Modifier">
                                            <i class="ri-pencil-fill"></i>
                                        </a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette commande ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn bg-red-500 text-white hover:bg-red-600" title="Supprimer">
                                                <i class="ri-delete-bin-5-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="empty-state">
                                    <i class="ri-shopping-bag-2-line text-6xl mb-4 opacity-80"></i>
                                    <h3 class="text-xl font-semibold mb-2">Aucune commande trouvée</h3>
                                    <p class="opacity-80">Les commandes apparaîtront ici une fois créées</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination-modern">
                <div class="flex items-center justify-between">
                    <div class="text-white text-sm">
                        Affichage de <span class="font-semibold">1</span> à <span class="font-semibold">10</span>
                        sur <span class="font-semibold">156</span> résultats
                    </div>
                    <div class="flex space-x-2">
                        <a href="#" class="page-link">← Précédent</a>
                        <a href="#" class="page-link bg-white text-purple-600">1</a>
                        <a href="#" class="page-link">2</a>
                        <a href="#" class="page-link">3</a>
                        <a href="#" class="page-link">Suivant →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bouton d'action flottant -->
        <button class="floating-action" title="Nouvelle commande">
            <i class="ri-add-line"></i>
        </button>
    </div>

    <script>
        // Fonctionnalité de sélection multiple
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Animation au survol des lignes
        document.querySelectorAll('.table-row').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });

            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Animation des boutons d'action
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.height, rect.width);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.6);
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;

                this.style.position = 'relative';
                this.style.overflow = 'hidden';
                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Animation du bouton flottant
        document.querySelector('.floating-action').addEventListener('click', function() {
            this.style.transform = 'scale(0.9) rotate(90deg)';
            setTimeout(() => {
                this.style.transform = 'scale(1.1) rotate(90deg)';
            }, 150);
        });

        // Effet de brillance sur les badges
        document.querySelectorAll('.status-badge').forEach(badge => {
            badge.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
                this.style.boxShadow = '0 4px 15px rgba(0,0,0,0.2)';
            });

            badge.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = 'none';
            });
        });

        // Ajout du CSS pour l'animation ripple
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
