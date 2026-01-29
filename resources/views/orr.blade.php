<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Commandes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        .hover\:scale-\[1\.02\]:hover {
            transform: scale(1.02);
        }

        .shadow-3xl {
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
        }

        .backdrop-blur-xl {
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
        }

        .backdrop-blur-sm {
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
        }

        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .text-5xl {
                font-size: 2.5rem;
            }

            .rounded-3xl {
                border-radius: 1.5rem;
            }
        }

        .group:hover .group-hover\:scale-105 {
            transform: scale(1.05);
        }

        .transform {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-violet-50 via-purple-50 to-indigo-100 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-0 -right-4 w-72 h-72 bg-violet-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000"></div>
        </div>

        <!-- Header Section -->
        <div class="relative z-10">
            <div class="bg-white/80 backdrop-blur-xl border-b border-violet-200/50 shadow-lg">
                <div class="container mx-auto px-6 py-12">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between">
                        <div class="mb-6 lg:mb-0">
                            <div class="flex items-center mb-4">
                                <a href="/welcome-client" class="w-16 h-16 bg-gradient-to-r from-violet-600 to-purple-600 rounded-2xl flex items-center justify-center mr-4 shadow-lg hover:from-violet-700 hover:to-purple-700 transition-all duration-300">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                </a>
                                <div>
                                    <h1 class="text-5xl font-black bg-gradient-to-r from-violet-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent mb-2">
                                        Mes Commandes
                                    </h1>
                                    <p class="text-lg text-gray-600 font-medium">Gérez et suivez toutes vos commandes en temps réel</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row items-start sm:items-center space

-y-3 sm:space-y-0 sm:space-x-4">
                            <div class="bg-gradient-to-r from-violet-500 to-purple-600 text-white px-6 py-3 rounded-2xl shadow-lg">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                    </svg>
   @php
    $ordersCount = $orders->count();
@endphp

<span>{{ $ordersCount }} commande{{ $ordersCount > 1 ? 's' : '' }}</span>

<div>
    @forelse($orders as $order)
        <div>
            Commande #{{ $order->id }} - Total : {{ number_format($order->total, 2, ',', ' ') }} €
        </div>
    @empty
        <div>Aucune commande pour le moment.</div>
    @endforelse
</div>

<span>{{ $ordersCount }} commande{{ $ordersCount > 1 ? 's' : '' }}</span>

                                    <span class="font-medium">commande{{ count($orders) > 1 ? 's' : '' }}</span>
                                </div>
                            </div>
                            <button class="bg-white/90 backdrop-blur-sm text-violet-700 px-6 py-3 rounded-2xl shadow-lg border border-violet-200 hover:bg-violet-50 transition-all duration-300 font-semibold">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                                    </svg>
                                    <span>Exporter</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="relative z-10 container mx-auto py-8">
            <h1 class="text-2xl font-bold mb-4 bg-gradient-to-r from-violet-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">Toutes les commandes</h1>
            @forelse($orders as $order)
                <div class="bg-white/90 backdrop-blur-xl shadow-2xl rounded-3xl overflow-hidden mb-8 border border-violet-200/50 hover:shadow-3xl hover:scale-[1.02] transition-all duration-500 group">
                    <!-- Order Header -->
                    <div class="bg-gradient-to-r from-violet-600 via-purple-600 to-indigo-600 px-8 py-6 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/10 to-transparent"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-12 -translate-x-12"></div>
                        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between text-white">
                            <div class="flex items-center space-x-6 mb-4 lg:mb-0">
                                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-4">
                                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1zM10 6a2 2 0 0 1 4 0v1h-4V6zm6 15H8a1 1 0 0 1-1-1V9h2v1a1 1 0 0 0 2 0V9h2v1a1 1 0 0 0 2 0V9h2v11a1 1 0 0 1-1 1z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold mb-1">Commande #{{ $order->id }}</h2>
                                    <div class="flex items-center space-x-3 text-violet-100">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="font-medium">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center space-y-3 sm:space-y-0 sm:space-x-6">
                                @php
                                    $statusConfig = [
                                        'pending' => ['bg' => 'bg-amber-500/90 backdrop-blur-sm text-white', 'icon' => '⏳', 'text' => 'En attente', 'glow' => 'shadow-amber-500/50'],
                                        'processing' => ['bg' => 'bg-blue-500/90 backdrop-blur-sm text-white', 'icon' => '⚡', 'text' => 'En cours', 'glow' => 'shadow-blue-500/50'],
                                        'shipped' => ['bg' => 'bg-indigo-500/90 backdrop-blur-sm text-white', 'icon' => '🚚', 'text' => 'Expédiée', 'glow' => 'shadow-indigo-500/50'],
                                        'delivered' => ['bg' => 'bg-emerald-500/90 backdrop-blur-sm text-white', 'icon' => '✅', 'text' => 'fLivrée', 'glow' => 'shadow-emerald-500/50'],
                                        'cancelled' => ['bg' => 'bg-rose-500/90 backdrop-blur-sm text-white', 'icon' => '❌', 'text' => 'Annulée', 'glow' => 'shadow-rose-500/50'],
                                    ];
                                    $config = $statusConfig[$order->status] ?? ['bg' => 'bg-gray-500/90 backdrop-blur-sm text-white', 'icon' => '📦', 'text' => ucfirst($order->status), 'glow' => 'shadow-gray-500/50'];
                                @endphp
                                <div class="inline-flex items-center px-5 py-3 rounded-2xl font-bold text-sm {{ $config['bg'] }} shadow-lg {{ $config['glow'] }}">
                                    <span class="text-lg mr-3">{{ $config['icon'] }}</span>
                                    <span>{{ $config['text'] }}</span>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-violet-200 font-medium mb-1">Total de la commande</p>
                                    <p class="text-3xl font-black">{{ number_format($order->total, 2, ',', ' ') }} €</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Order Details -->
                    <div class="p-8">
                        <div class="overflow-hidden rounded-2xl border border-violet-100">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gradient-to-r from-violet-50 to-purple-50">
                                        <th class="text-left py-6 px-6 text-violet-800 font-bold text-sm uppercase tracking-wider">Produit</th>
                                        <th class="text-center py-6 px-6 text-violet-800 font-bold text-sm uppercase tracking-wider">Quantité</th>
                                        <th class="text-right py-6 px-6 text-violet-800 font-bold text-sm uppercase tracking-wider">Prix</th>
                                        <th class="text-right py-6 px-6 text-violet-800 font-bold text-sm uppercase tracking-wider">Sous-total</th>
                                    </tr>
                                </thead>
                             <tbody class="divide-y divide-violet-100">
    @foreach($order->orderDetails as $detail)
        <tr class="hover:bg-gradient-to-r hover:from-violet-50/50 hover:to-purple-50/50 transition-all duration-300 group">
            <td class="py-6 px-6">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-violet-100 to-purple-100 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-8 h-8 text-violet-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1H5C3.9 1 3 1.9 3 3V19C3 20.1 3.9 21 5 21H11.81C11.42 20.34 11.17 19.6 11.07 18.84C9.5 18.31 8.66 16.6 9.2 15.03C9.61 13.83 10.73 13 12 13C12.44 13 12.88 13.1 13.28 13.29C15.57 11.5 18.86 11.66 21 14V9ZM17.75 21L15 18L16.16 16.84L17.75 18.43L21.34 14.84L22.5 16.25L17.75 21Z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-gray-900 text-lg mb-1">{{ $detail->product?->title ?? 'Produit supprimé' }}</p>
                        @if(!$detail->product)
                            <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-700">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                Produit indisponible
                            </div>
                        @endif
                    </div>
                </div>
            </td>
            <td class="py-6 px-6 text-center">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-r from-violet-500 to-purple-500 text-white rounded-2xl font-bold text-lg shadow-lg">
                    {{ $detail->quantity }}
                </div>
            </td>
            <td class="py-6 px-6 text-right">
                <span class="text-xl font-bold text-gray-900">{{ number_format($detail->price, 2, ',', ' ') }} €</span>
            </td>
            <td class="py-6 px-6 text-right">
                <span class="text-2xl font-black bg-gradient-to-r from-violet-600 to-purple-600 bg-clip-text text-transparent">
                    {{ number_format($detail->price * $detail->quantity, 2, ',', ' ') }} €
                </span>
            </td>
            <!-- Boutons Modifier / Supprimer -->
            <td class="py-6 px-6 text-right space-x-2">
                <a href="{{ route('orderdetails.edit', $detail->id) }}"
                   class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition">
                   Modifier
                </a>
                <form action="{{ route('orderdetails.destroy', $detail->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition">
                        Supprimer
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

                            </table>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white/90 backdrop-blur-xl shadow-2xl rounded-3xl p-16 text-center border border-violet-200/50">
                    <div class="w-32 h-32 bg-gradient-to-br from-violet-100 to-purple-100 rounded-3xl mx-auto mb-8 flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-violet-200/50 to-purple-200/50 animate-pulse"></div>
                        <svg class="w-16 h-16 text-violet-600 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </div>
                    <h3 class="text-4xl font-black bg-gradient-to-r from-violet-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent mb-6">
                        Aucune commande trouvée
                    </h3>
                    <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto font-medium leading-relaxed">
                        Votre parcours shopping commence ici ! Découvrez notre collection exceptionnelle et créez votre première commande dès maintenant.
                    </p>
                    <a href="/products" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-violet-600 via-purple-600 to-indigo-600 text-white font-bold text-lg rounded-2xl hover:from-violet-700 hover:via-purple-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                        <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 7h-3V6a4 4 0 0 0-8 0v1H5a1 1 0 0 0-1 1v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V8a1 1 0 0 0-1-1zM10 6a2 2 0 0 1 4 0v1h-4V6zm6 15H8a1 1 0 0 1-1-1V9h2v1a1 1 0 0 0 2 0V9h2v1a1 1 0 0 0 2 0V9h2v11a1 1 0 0 1-1 1z"/>
                        </svg>
                        Explorer la boutique
                    </a>
                </div>
            @endforelse

        </div>
    </div>
</body>
</html>
