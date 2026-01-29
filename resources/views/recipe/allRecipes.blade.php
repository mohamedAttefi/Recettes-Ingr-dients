<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toutes les Recettes - Recettes et Ingrédients</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Inter:wght@300;400;500;600;700&display=swap');
        
        :root {
            --burnt-orange: #E8613C;
            --terracotta: #D84A2E;
            --cream: #FFF8F0;
            --sage: #8B9A7E;
            --charcoal: #2C2C2C;
            --gold: #D4AF37;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }
        
        .recipe-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: relative;
        }
        
        .recipe-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(232, 97, 60, 0.15);
        }
        
        .recipe-image {
            height: 200px;
            width: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .recipe-card:hover .recipe-image {
            transform: scale(1.05);
        }
        
        .difficulty-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .difficulty-easy {
            background: linear-gradient(135deg, #10B981 0%, #34D399 100%);
            color: white;
        }
        
        .difficulty-medium {
            background: linear-gradient(135deg, #F59E0B 0%, #FBBF24 100%);
            color: white;
        }
        
        .difficulty-hard {
            background: linear-gradient(135deg, #EF4444 0%, #F87171 100%);
            color: white;
        }
        
        .category-tag {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .category-entree {
            background: linear-gradient(135deg, #8B5CF6 0%, #A78BFA 100%);
            color: white;
        }
        
        .category-plat {
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
        }
        
        .category-dessert {
            background: linear-gradient(135deg, #EC4899 0%, #F472B6 100%);
            color: white;
        }
        
        .category-aperitif {
            background: linear-gradient(135deg, #3B82F6 0%, #60A5FA 100%);
            color: white;
        }
        
        .filter-panel {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 24px;
            height: fit-content;
        }
        
        .search-bar {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }
        
        .search-bar:focus-within {
            box-shadow: 0 6px 25px rgba(232, 97, 60, 0.15);
        }
        
        .filter-chip {
            padding: 8px 16px;
            background: #f1f5f9;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            color: #475569;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }
        
        .filter-chip:hover {
            background: #e2e8f0;
        }
        
        .filter-chip.active {
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
            border-color: var(--burnt-orange);
        }
        
        .sort-select {
            padding: 10px 40px 10px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            background: white url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E") no-repeat right 12px center;
            background-size: 16px;
            appearance: none;
            font-family: inherit;
            font-size: 14px;
            color: #475569;
            transition: all 0.2s ease;
        }
        
        .sort-select:focus {
            outline: none;
            border-color: var(--burnt-orange);
            box-shadow: 0 0 0 3px rgba(232, 97, 60, 0.1);
        }
        
        .empty-state {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 2px dashed #cbd5e1;
            border-radius: 16px;
        }
        
        .pagination-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            color: #64748b;
            transition: all 0.2s ease;
        }
        
        .pagination-btn:hover:not(.disabled) {
            border-color: var(--burnt-orange);
            color: var(--burnt-orange);
        }
        
        .pagination-btn.active {
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
            border-color: var(--burnt-orange);
        }
        
        .pagination-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        
        .favorite-btn {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            transition: all 0.3s ease;
            z-index: 10;
        }
        
        .favorite-btn:hover {
            background: white;
            color: #ef4444;
            transform: scale(1.1);
        }
        
        .favorite-btn.active {
            color: #ef4444;
            animation: heartBeat 0.5s;
        }
        
        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }
        
        .loading-shimmer {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }
        
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        
        .view-toggle-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            color: #64748b;
            transition: all 0.2s ease;
        }
        
        .view-toggle-btn:hover {
            border-color: var(--burnt-orange);
            color: var(--burnt-orange);
        }
        
        .view-toggle-btn.active {
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
            border-color: var(--burnt-orange);
        }
        
        .stats-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-4px);
        }
        
        @media (max-width: 768px) {
            .filter-panel {
                position: static;
                margin-bottom: 24px;
            }
            
            .recipe-card {
                margin-bottom: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <span class="text-3xl mr-2">🍳</span>
                        <span class="text-xl font-bold text-gray-800 hidden md:inline">Recettes et Ingrédients</span>
                    </a>
                </div>
                
                <div class="flex items-center gap-4">
                    @auth
                    <a href="" 
                       class="px-4 py-2 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg hover:from-orange-600 hover:to-red-600 transition flex items-center gap-2">
                        <i class="fas fa-plus"></i>
                        <span class="hidden md:inline">Nouvelle Recette</span>
                    </a>
                    
                    <a href="" 
                       class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition flex items-center gap-2">
                        <i class="fas fa-user"></i>
                        <span class="hidden md:inline">Mon Compte</span>
                    </a>
                    @else
                    <a href="{{ route('login') }}" 
                       class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                        Se connecter
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 font-['Playfair+Display']">
                    Découvrez des Recettes Extraordinaires
                </h1>
                <p class="text-xl text-orange-100 max-w-3xl mx-auto mb-8">
                    Explorez notre collection de recettes créées par des passionnés de cuisine
                </p>
                
                <!-- Search Bar -->
                <div class="max-w-2xl mx-auto">
                    <div class="search-bar flex items-center">
                        <i class="fas fa-search text-gray-400 ml-4"></i>
                        <input type="text" 
                               id="searchInput"
                               placeholder="Rechercher une recette, un ingrédient..."
                               class="flex-1 px-4 py-4 focus:outline-none rounded-r-lg">
                        <button onclick="performSearch()" 
                                class="px-6 py-4 bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-r-lg hover:from-orange-700 hover:to-red-700 transition">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Bar -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Recettes</p>
                        <p class="text-3xl font-bold text-gray-800">1,247</p>
                    </div>
                    <div class="text-orange-500 text-3xl">
                        <i class="fas fa-book-open"></i>
                    </div>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Chefs Actifs</p>
                        <p class="text-3xl font-bold text-gray-800">342</p>
                    </div>
                    <div class="text-green-500 text-3xl">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Moyenne Préparation</p>
                        <p class="text-3xl font-bold text-gray-800">35 min</p>
                    </div>
                    <div class="text-blue-500 text-3xl">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>
            
            <div class="stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Recette du Jour</p>
                        <p class="text-3xl font-bold text-gray-800">Ratatouille</p>
                    </div>
                    <div class="text-purple-500 text-3xl">
                        <i class="fas fa-crown"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Filters Sidebar -->
            <div class="lg:col-span-1">
                <div class="filter-panel">
                    <h3 class="text-lg font-bold text-gray-800 mb-6 flex items-center gap-2">
                        <i class="fas fa-filter text-orange-500"></i>
                        Filtres
                    </h3>
                    
                    <!-- Categories -->
                    <div class="mb-8">
                        <h4 class="font-semibold text-gray-700 mb-4">Catégories</h4>
                        <div class="space-y-2">
                            <div class="filter-chip active" onclick="toggleFilter('all')">
                                Toutes les recettes
                                <span class="ml-auto text-xs bg-white/20 px-2 py-1 rounded">1,247</span>
                            </div>
                            <div class="filter-chip" onclick="toggleFilter('plat')">
                                <i class="fas fa-utensils"></i>
                                Plats Principaux
                                <span class="ml-auto text-xs bg-gray-100 px-2 py-1 rounded text-gray-600">543</span>
                            </div>
                            <div class="filter-chip" onclick="toggleFilter('dessert')">
                                <i class="fas fa-ice-cream"></i>
                                Desserts
                                <span class="ml-auto text-xs bg-gray-100 px-2 py-1 rounded text-gray-600">289</span>
                            </div>
                            <div class="filter-chip" onclick="toggleFilter('entree')">
                                <i class="fas fa-apple-alt"></i>
                                Entrées
                                <span class="ml-auto text-xs bg-gray-100 px-2 py-1 rounded text-gray-600">187</span>
                            </div>
                            <div class="filter-chip" onclick="toggleFilter('aperitif')">
                                <i class="fas fa-wine-glass"></i>
                                Apéritifs
                                <span class="ml-auto text-xs bg-gray-100 px-2 py-1 rounded text-gray-600">96</span>
                            </div>
                            <div class="filter-chip" onclick="toggleFilter('boisson')">
                                <i class="fas fa-glass-whiskey"></i>
                                Boissons
                                <span class="ml-auto text-xs bg-gray-100 px-2 py-1 rounded text-gray-600">132</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Difficulty -->
                    <div class="mb-8">
                        <h4 class="font-semibold text-gray-700 mb-4">Difficulté</h4>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-400 mr-3">
                                <span class="difficulty-badge difficulty-easy">Facile</span>
                                <span class="ml-auto text-gray-500 text-sm">623</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-400 mr-3" checked>
                                <span class="difficulty-badge difficulty-medium">Moyen</span>
                                <span class="ml-auto text-gray-500 text-sm">452</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-400 mr-3">
                                <span class="difficulty-badge difficulty-hard">Difficile</span>
                                <span class="ml-auto text-gray-500 text-sm">172</span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Time -->
                    <div class="mb-8">
                        <h4 class="font-semibold text-gray-700 mb-4">Temps de préparation</h4>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-400 mr-3">
                                <span class="text-gray-700">Moins de 30 min</span>
                                <span class="ml-auto text-gray-500 text-sm">489</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-400 mr-3" checked>
                                <span class="text-gray-700">30 à 60 min</span>
                                <span class="ml-auto text-gray-500 text-sm">532</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-400 mr-3">
                                <span class="text-gray-700">Plus de 60 min</span>
                                <span class="ml-auto text-gray-500 text-sm">226</span>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Dietary -->
                    <div class="mb-8">
                        <h4 class="font-semibold text-gray-700 mb-4">Régime alimentaire</h4>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-400 mr-3">
                                <span class="text-gray-700">Végétarien</span>
                                <span class="ml-auto text-gray-500 text-sm">312</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-400 mr-3">
                                <span class="text-gray-700">Végan</span>
                                <span class="ml-auto text-gray-500 text-sm">187</span>
                            </label>
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-400 mr-3">
                                <span class="text-gray-700">Sans gluten</span>
                                <span class="ml-auto text-gray-500 text-sm">143</span>
                            </label>
                        </div>
                    </div>
                    
                    <button onclick="resetFilters()" 
                            class="w-full py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                        <i class="fas fa-redo mr-2"></i>
                        Réinitialiser les filtres
                    </button>
                </div>
            </div>
            
            <!-- Recipes Grid -->
            <div class="lg:col-span-3">
                <!-- Controls Bar -->
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">
                            Toutes les Recettes
                            <span class="text-gray-500 font-normal text-lg ml-2">(1,247 résultats)</span>
                        </h2>
                        <p class="text-gray-600 mt-1">Découvrez notre sélection de recettes</p>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <!-- View Toggle -->
                        <div class="flex items-center bg-gray-100 rounded-lg p-1">
                            <button class="view-toggle-btn active" onclick="changeView('grid')">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button class="view-toggle-btn" onclick="changeView('list')">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                        
                        <!-- Sort -->
                        <select class="sort-select" onchange="sortRecipes(this.value)">
                            <option value="newest">Plus récentes</option>
                            <option value="popular">Plus populaires</option>
                            <option value="rating">Mieux notées</option>
                            <option value="time">Plus rapides</option>
                            <option value="difficulty">Difficulté</option>
                        </select>
                    </div>
                </div>
                
                <!-- Active Filters -->
                <div class="flex flex-wrap gap-2 mb-6">
                    <div class="filter-chip active">
                        Toutes <button onclick="removeFilter('all')" class="ml-2"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="filter-chip">
                        Moyen <button onclick="removeFilter('difficulty-medium')" class="ml-2"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="filter-chip">
                        30-60 min <button onclick="removeFilter('time-30-60')" class="ml-2"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                
                <!-- Recipes Grid -->
                <div id="recipesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Recipe Card 1 -->
                    <div class="recipe-card">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                                 alt="Ratatouille Provençale" 
                                 class="recipe-image">
                            <button class="favorite-btn" onclick="toggleFavorite(1)">
                                <i class="fas fa-heart"></i>
                            </button>
                            <div class="absolute bottom-3 left-3">
                                <span class="difficulty-badge difficulty-medium">Moyen</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-xl font-bold text-gray-800 line-clamp-1">Ratatouille Provençale</h3>
                                <span class="text-gray-500 text-sm">45 min</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                Un classique de la cuisine méditerranéenne avec des légumes de saison mijotés à l'huile d'olive.
                            </p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-user-friends mr-1"></i>
                                    <span>4 portions</span>
                                </div>
                                <span class="category-tag category-plat">
                                    <i class="fas fa-utensils"></i>
                                    Plat
                                </span>
                            </div>
                            
                            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-heart text-red-400 mr-1"></i>
                                    <span class="mr-3">128</span>
                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                    <span>4.8</span>
                                </div>
                                <a href="/recettes/1" 
                                   class="text-orange-500 hover:text-orange-600 font-medium text-sm">
                                    Voir la recette <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recipe Card 2 -->
                    <div class="recipe-card">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1563379926898-05f4575a45d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                                 alt="Bœuf Bourguignon" 
                                 class="recipe-image">
                            <button class="favorite-btn active" onclick="toggleFavorite(2)">
                                <i class="fas fa-heart"></i>
                            </button>
                            <div class="absolute bottom-3 left-3">
                                <span class="difficulty-badge difficulty-hard">Difficile</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-xl font-bold text-gray-800 line-clamp-1">Bœuf Bourguignon</h3>
                                <span class="text-gray-500 text-sm">2h 30min</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                Plat traditionnel français au vin rouge, carottes, oignons et lardons, mijoté lentement.
                            </p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-user-friends mr-1"></i>
                                    <span>6 portions</span>
                                </div>
                                <span class="category-tag category-plat">
                                    <i class="fas fa-utensils"></i>
                                    Plat
                                </span>
                            </div>
                            
                            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-heart text-red-400 mr-1"></i>
                                    <span class="mr-3">256</span>
                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                    <span>4.9</span>
                                </div>
                                <a href="/recettes/2" 
                                   class="text-orange-500 hover:text-orange-600 font-medium text-sm">
                                    Voir la recette <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recipe Card 3 -->
                    <div class="recipe-card">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                                 alt="Pizza Margherita" 
                                 class="recipe-image">
                            <button class="favorite-btn" onclick="toggleFavorite(3)">
                                <i class="fas fa-heart"></i>
                            </button>
                            <div class="absolute bottom-3 left-3">
                                <span class="difficulty-badge difficulty-easy">Facile</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-xl font-bold text-gray-800 line-clamp-1">Pizza Margherita</h3>
                                <span class="text-gray-500 text-sm">30 min</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                Pizza traditionnelle italienne avec sauce tomate, mozzarella fraîche et basilic.
                            </p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-user-friends mr-1"></i>
                                    <span>2-3 portions</span>
                                </div>
                                <span class="category-tag category-plat">
                                    <i class="fas fa-utensils"></i>
                                    Plat
                                </span>
                            </div>
                            
                            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-heart text-red-400 mr-1"></i>
                                    <span class="mr-3">189</span>
                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                    <span>4.7</span>
                                </div>
                                <a href="/recettes/3" 
                                   class="text-orange-500 hover:text-orange-600 font-medium text-sm">
                                    Voir la recette <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recipe Card 4 -->
                    <div class="recipe-card">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                                 alt="Salade César" 
                                 class="recipe-image">
                            <button class="favorite-btn" onclick="toggleFavorite(4)">
                                <i class="fas fa-heart"></i>
                            </button>
                            <div class="absolute bottom-3 left-3">
                                <span class="difficulty-badge difficulty-easy">Facile</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-xl font-bold text-gray-800 line-clamp-1">Salade César au Poulet</h3>
                                <span class="text-gray-500 text-sm">20 min</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                Salade fraîche avec poulet grillé, croûtons, parmesan et sauce césar maison.
                            </p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-user-friends mr-1"></i>
                                    <span>2 portions</span>
                                </div>
                                <span class="category-tag category-entree">
                                    <i class="fas fa-apple-alt"></i>
                                    Entrée
                                </span>
                            </div>
                            
                            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-heart text-red-400 mr-1"></i>
                                    <span class="mr-3">145</span>
                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                    <span>4.6</span>
                                </div>
                                <a href="/recettes/4" 
                                   class="text-orange-500 hover:text-orange-600 font-medium text-sm">
                                    Voir la recette <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recipe Card 5 -->
                    <div class="recipe-card">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                                 alt="Pancakes aux Myrtilles" 
                                 class="recipe-image">
                            <button class="favorite-btn active" onclick="toggleFavorite(5)">
                                <i class="fas fa-heart"></i>
                            </button>
                            <div class="absolute bottom-3 left-3">
                                <span class="difficulty-badge difficulty-medium">Moyen</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-xl font-bold text-gray-800 line-clamp-1">Pancakes aux Myrtilles</h3>
                                <span class="text-gray-500 text-sm">25 min</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                Pancakes moelleux garnis de myrtilles fraîches, parfaits pour un petit-déjeuner gourmand.
                            </p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-user-friends mr-1"></i>
                                    <span>4 portions</span>
                                </div>
                                <span class="category-tag category-dessert">
                                    <i class="fas fa-ice-cream"></i>
                                    Dessert
                                </span>
                            </div>
                            
                            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-heart text-red-400 mr-1"></i>
                                    <span class="mr-3">203</span>
                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                    <span>4.8</span>
                                </div>
                                <a href="/recettes/5" 
                                   class="text-orange-500 hover:text-orange-600 font-medium text-sm">
                                    Voir la recette <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recipe Card 6 -->
                    <div class="recipe-card">
                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                                 alt="Tiramisu" 
                                 class="recipe-image">
                            <button class="favorite-btn" onclick="toggleFavorite(6)">
                                <i class="fas fa-heart"></i>
                            </button>
                            <div class="absolute bottom-3 left-3">
                                <span class="difficulty-badge difficulty-hard">Difficile</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="text-xl font-bold text-gray-800 line-clamp-1">Tiramisu Italien</h3>
                                <span class="text-gray-500 text-sm">4h 30min</span>
                            </div>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                Dessert italien à base de mascarpone, café et biscuits cuillère, avec une touche de cacao.
                            </p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-user-friends mr-1"></i>
                                    <span>8 portions</span>
                                </div>
                                <span class="category-tag category-dessert">
                                    <i class="fas fa-ice-cream"></i>
                                    Dessert
                                </span>
                            </div>
                            
                            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                                <div class="flex items-center text-gray-500 text-sm">
                                    <i class="fas fa-heart text-red-400 mr-1"></i>
                                    <span class="mr-3">312</span>
                                    <i class="fas fa-star text-yellow-400 mr-1"></i>
                                    <span>4.9</span>
                                </div>
                                <a href="/recettes/6" 
                                   class="text-orange-500 hover:text-orange-600 font-medium text-sm">
                                    Voir la recette <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Empty State (Hidden by default) -->
                <div id="emptyState" class="empty-state p-12 text-center hidden">
                    <div class="max-w-md mx-auto">
                        <div class="text-6xl mb-6">🍽️</div>
                        <h3 class="text-2xl font-bold text-gray-700 mb-3">Aucune recette trouvée</h3>
                        <p class="text-gray-600 mb-6">
                            Aucune recette ne correspond à vos critères de recherche. Essayez de modifier vos filtres.
                        </p>
                        <button onclick="resetFilters()" 
                                class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg hover:shadow-lg transition">
                            Réinitialiser les filtres
                        </button>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    <nav class="flex items-center gap-2">
                        <button class="pagination-btn disabled">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="pagination-btn active">1</button>
                        <button class="pagination-btn">2</button>
                        <button class="pagination-btn">3</button>
                        <button class="pagination-btn">4</button>
                        <span class="px-2 text-gray-500">...</span>
                        <button class="pagination-btn">12</button>
                        <button class="pagination-btn">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <span class="text-3xl mr-2">🍳</span>
                        <span class="text-xl font-bold">Recettes et Ingrédients</span>
                    </div>
                    <p class="text-gray-400">
                        Votre compagnon culinaire pour découvrir, créer et partager des recettes extraordinaires.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Explorer</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Toutes les recettes</a></li>
                        <li><a href="#" class="hover:text-white transition">Recettes du jour</a></li>
                        <li><a href="#" class="hover:text-white transition">Top chefs</a></li>
                        <li><a href="#" class="hover:text-white transition">Catégories</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Communauté</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">Forum</a></li>
                        <li><a href="#" class="hover:text-white transition">Événements</a></li>
                        <li><a href="#" class="hover:text-white transition">Concours</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Newsletter</h4>
                    <p class="text-gray-400 mb-4">
                        Recevez nos meilleures recettes chaque semaine.
                    </p>
                    <div class="flex">
                        <input type="email" placeholder="Votre email" 
                               class="flex-1 px-4 py-2 rounded-l-lg text-gray-900">
                        <button class="px-4 py-2 bg-orange-500 rounded-r-lg hover:bg-orange-600 transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500 text-sm">
                <p>&copy; 2023 Recettes et Ingrédients. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Variables globales
        let currentView = 'grid';
        let activeFilters = new Set(['all']);
        let favorites = new Set([2, 5]); // IDs des recettes favorites

        // Toggle favorite
        function toggleFavorite(recipeId) {
            const btn = document.querySelector(`.favorite-btn:nth-child(${recipeId})`);
            const icon = btn.querySelector('i');
            
            if (favorites.has(recipeId)) {
                favorites.delete(recipeId);
                btn.classList.remove('active');
            } else {
                favorites.add(recipeId);
                btn.classList.add('active');
            }
            
            // Envoyer la requête AJAX
            fetch(`/api/recettes/${recipeId}/favori`, {
                method: favorites.has(recipeId) ? 'POST' : 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            });
        }

        // Toggle filter
        function toggleFilter(filter) {
            const chips = document.querySelectorAll('.filter-chip');
            chips.forEach(chip => {
                if (chip.textContent.includes(filter) || (filter === 'all' && chip.textContent.includes('Toutes'))) {
                    chip.classList.toggle('active');
                    
                    if (chip.classList.contains('active')) {
                        activeFilters.add(filter);
                    } else {
                        activeFilters.delete(filter);
                    }
                }
            });
            
            filterRecipes();
        }

        // Remove filter
        function removeFilter(filter) {
            activeFilters.delete(filter);
            filterRecipes();
        }

        // Reset all filters
        function resetFilters() {
            activeFilters.clear();
            activeFilters.add('all');
            
            // Réinitialiser les cases à cocher
            document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                cb.checked = false;
            });
            
            // Réinitialiser les chips
            document.querySelectorAll('.filter-chip').forEach(chip => {
                chip.classList.remove('active');
                if (chip.textContent.includes('Toutes')) {
                    chip.classList.add('active');
                }
            });
            
            filterRecipes();
        }

        // Filter recipes
        function filterRecipes() {
            const recipes = document.querySelectorAll('.recipe-card');
            let visibleCount = 0;
            
            recipes.forEach(recipe => {
                let shouldShow = true;
                
                // Appliquer la logique de filtrage ici
                // Pour l'exemple, on montre tout
                
                if (shouldShow) {
                    recipe.style.display = 'block';
                    visibleCount++;
                } else {
                    recipe.style.display = 'none';
                }
            });
            
            // Afficher/masquer l'état vide
            const emptyState = document.getElementById('emptyState');
            if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
                document.getElementById('recipesGrid').classList.add('hidden');
            } else {
                emptyState.classList.add('hidden');
                document.getElementById('recipesGrid').classList.remove('hidden');
            }
        }

        // Change view mode
        function changeView(mode) {
            currentView = mode;
            const grid = document.getElementById('recipesGrid');
            const buttons = document.querySelectorAll('.view-toggle-btn');
            
            buttons.forEach(btn => btn.classList.remove('active'));
            document.querySelector(`[onclick="changeView('${mode}')"]`).classList.add('active');
            
            if (mode === 'grid') {
                grid.className = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6';
            } else {
                grid.className = 'grid grid-cols-1 gap-6';
                document.querySelectorAll('.recipe-card').forEach(card => {
                    card.classList.add('flex');
                    card.querySelector('.recipe-image').classList.add('w-1/3', 'h-auto');
                });
            }
        }

        // Sort recipes
        function sortRecipes(criteria) {
            const recipesGrid = document.getElementById('recipesGrid');
            const recipes = Array.from(recipesGrid.querySelectorAll('.recipe-card'));
            
            recipes.sort((a, b) => {
                switch(criteria) {
                    case 'newest':
                        return Math.random() - 0.5; // Pour l'exemple
                    case 'popular':
                        const aLikes = parseInt(a.querySelector('.fa-heart').parentElement.nextElementSibling.textContent);
                        const bLikes = parseInt(b.querySelector('.fa-heart').parentElement.nextElementSibling.textContent);
                        return bLikes - aLikes;
                    case 'rating':
                        const aRating = parseFloat(a.querySelector('.fa-star').parentElement.nextElementSibling.textContent);
                        const bRating = parseFloat(b.querySelector('.fa-star').parentElement.nextElementSibling.textContent);
                        return bRating - aRating;
                    case 'time':
                        const aTime = parseFloat(a.querySelector('.text-gray-500').textContent);
                        const bTime = parseFloat(b.querySelector('.text-gray-500').textContent);
                        return aTime - bTime;
                    default:
                        return 0;
                }
            });
            
            // Réorganiser les recettes
            recipes.forEach(recipe => recipesGrid.appendChild(recipe));
        }

        // Search function
        function performSearch() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const recipes = document.querySelectorAll('.recipe-card');
            let visibleCount = 0;
            
            recipes.forEach(recipe => {
                const title = recipe.querySelector('h3').textContent.toLowerCase();
                const description = recipe.querySelector('p').textContent.toLowerCase();
                
                if (title.includes(query) || description.includes(query)) {
                    recipe.style.display = 'block';
                    visibleCount++;
                } else {
                    recipe.style.display = 'none';
                }
            });
            
            // Afficher l'état vide si besoin
            const emptyState = document.getElementById('emptyState');
            if (visibleCount === 0 && query) {
                emptyState.querySelector('h3').textContent = 'Aucun résultat trouvé';
                emptyState.querySelector('p').textContent = `Aucune recette ne correspond à "${query}"`;
                emptyState.classList.remove('hidden');
            } else if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }

        // Initialization
        document.addEventListener('DOMContentLoaded', () => {
            // Initialiser les favoris
            favorites.forEach(id => {
                const btn = document.querySelector(`.favorite-btn:nth-child(${id})`);
                if (btn) btn.classList.add('active');
            });
            
            // Recherche avec la touche Entrée
            document.getElementById('searchInput').addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    performSearch();
                }
            });
            
            // Initialiser les cases à cocher
            document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                cb.addEventListener('change', filterRecipes);
            });
        });
    </script>
</body>
</html>