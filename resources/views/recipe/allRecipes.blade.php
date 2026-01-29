<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toutes les Recettes - Recettes et Ingrédients</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            background: #0f172a;
        }

        /* Gradient Animation */
        .hero-bg {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 30%, #ff4757 70%, #ff1493 100%);
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Floating Animation */
        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        /* 3D Card Effect */
        .card-3d {
            transform-style: preserve-3d;
            perspective: 1000px;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .card-3d:hover {
            transform: translateY(-15px) rotateX(5deg) rotateY(5deg);
            box-shadow: 0 25px 50px -12px rgba(255, 107, 53, 0.4);
        }

        /* Glassmorphism */
        .glassmorphism {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
        }

        .dark-glassmorphism {
            backdrop-filter: blur(15px);
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Neon Glow */
        .neon-glow {
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.4),
                0 0 40px rgba(255, 107, 53, 0.2),
                0 0 80px rgba(255, 107, 53, 0.1);
        }

        .neon-glow-green {
            box-shadow: 0 0 20px rgba(72, 187, 120, 0.4),
                0 0 40px rgba(72, 187, 120, 0.2);
        }

        .neon-glow-blue {
            box-shadow: 0 0 20px rgba(66, 153, 225, 0.4),
                0 0 40px rgba(66, 153, 225, 0.2);
        }

        .neon-glow-purple {
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.4),
                0 0 40px rgba(168, 85, 247, 0.2);
        }

        .neon-glow-pink {
            box-shadow: 0 0 20px rgba(236, 72, 153, 0.4),
                0 0 40px rgba(236, 72, 153, 0.2);
        }

        /* Typing Animation */
        .typing {
            overflow: hidden;
            border-right: 3px solid;
            white-space: nowrap;
            margin: 0 auto;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent;
            }

            50% {
                border-color: #ff6b35;
            }
        }

        /* Counter Animation */
        .counter {
            animation: countUp 1.5s ease-out forwards;
            opacity: 0;
        }

        @keyframes countUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border-radius: 4px;
        }

        /* Progress Bar */
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.1);
        }

        .progress-fill {
            height: 100%;
            border-radius: 4px;
            background: linear-gradient(90deg, #ff6b35, #f7931e);
            transition: width 1.5s ease-in-out;
        }

        /* Particle Container */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        /* Recipe Card Styles */
        .recipe-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 16px;
            overflow: hidden;
            position: relative;
        }

        .recipe-card:hover {
            transform: translateY(-8px);
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
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: white;
        }

        .category-dessert {
            background: linear-gradient(135deg, #EC4899 0%, #F472B6 100%);
            color: white;
        }

        .filter-chip {
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }

        .filter-chip:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .filter-chip.active {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: white;
            border-color: #ff6b35;
        }

        .search-bar {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .search-bar:focus-within {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 107, 53, 0.5);
        }

        .sort-select {
            padding: 10px 40px 10px 16px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23ffffff'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E") no-repeat right 12px center;
            background-size: 16px;
            appearance: none;
            font-family: inherit;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.2s ease;
        }

        .sort-select:focus {
            outline: none;
            border-color: #ff6b35;
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
        }

        .view-toggle-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.7);
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.2s ease;
        }

        .view-toggle-btn:hover {
            border-color: #ff6b35;
            color: #ff6b35;
        }

        .view-toggle-btn.active {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: white;
            border-color: #ff6b35;
        }

        .pagination-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.7);
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.2s ease;
        }

        .pagination-btn:hover:not(.disabled) {
            border-color: #ff6b35;
            color: #ff6b35;
        }

        .pagination-btn.active {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: white;
            border-color: #ff6b35;
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
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s ease;
            z-index: 10;
        }

        .favorite-btn:hover {
            background: rgba(0, 0, 0, 0.7);
            color: #ef4444;
            transform: scale(1.1);
        }

        .favorite-btn.active {
            color: #ef4444;
            animation: heartBeat 0.5s;
        }

        @keyframes heartBeat {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }
        }

        .empty-state {
            background: rgba(255, 255, 255, 0.03);
            border: 2px dashed rgba(255, 255, 255, 0.1);
            border-radius: 16px;
        }

        @media (max-width: 768px) {
            .recipe-hero {
                height: 350px;
            }
        }
    </style>
</head>

<body class="text-white min-h-screen">
    <!-- Animated Particles Background -->
    <div id="particles-js"></div>

    <!-- Sidebar Navigation -->
    @include('header')

    <!-- Main Content -->
    <div class="ml-0 lg:ml-64 transition-all duration-300">
        <!-- Top Navigation -->
        <header class="sticky top-0 z-30 glassmorphism">
            <div class="flex justify-between items-center p-6">
                <div class="flex items-center space-x-4">
                    <button id="sidebar-toggle" class="lg:hidden text-2xl">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="text-2xl font-bold text-white font-['Poppins']">Toutes les Recettes</h2>
                </div>

                <div class="flex items-center space-x-6">
                    <!-- Search Bar -->
                    <div class="relative">
                        <div class="search-bar flex items-center">
                            <i class="fas fa-search text-gray-400 ml-4"></i>
                            <input type="text"
                                id="searchInput"
                                placeholder="Rechercher une recette..."
                                class="flex-1 px-4 py-3 bg-transparent focus:outline-none rounded-r-lg w-64 md:w-80">
                        </div>
                    </div>

                    <!-- View Toggle -->
                    <div class="flex items-center p-1 rounded-lg" style="background: rgba(255, 255, 255, 0.05);">
                        <button class="view-toggle-btn active" onclick="changeView('grid')">
                            <i class="fas fa-th-large"></i>
                        </button>
                        <button class="view-toggle-btn" onclick="changeView('list')">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>

                    <!-- New Recipe Button -->
                    <a href="{{ route('addRecipe') }}" class="hidden md:flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-orange-600 to-red-600 text-white rounded-xl hover:from-orange-700 hover:to-red-700 transition duration-300 shadow-lg">
                        <i class="fas fa-plus"></i>
                        <span>Nouvelle Recette</span>
                    </a>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero-bg min-h-[50vh] flex items-center justify-center relative overflow-hidden">
            <div class="container mx-auto px-6 relative z-10">
                <div class="text-center" data-aos="fade-up">
                    <h2 class="text-4xl lg:text-6xl font-extrabold mb-6 text-white font-['Poppins']">
                        Découvrez l'Univers Culinaire
                    </h2>
                    <p class="text-xl text-orange-100 max-w-3xl mx-auto mb-10">
                        Explorez notre collection de {{ $totalRecipes ?? '1,247' }} recettes créées par des passionnés de cuisine du monde entier
                    </p>

                    
                </div>
            </div>

            <!-- Floating Elements -->
            <div class="absolute top-20 left-10 floating">
                <span class="text-5xl">🍕</span>
            </div>
            <div class="absolute bottom-20 right-10 floating" style="animation-delay: 2s;">
                <span class="text-5xl">🍣</span>
            </div>
            <div class="absolute top-1/2 left-1/4 floating" style="animation-delay: 1s;">
                <span class="text-5xl">🥗</span>
            </div>
            <div class="absolute top-1/3 right-1/4 floating" style="animation-delay: 3s;">
                <span class="text-5xl">🍰</span>
            </div>
        </section>

        <!-- Main Content -->
        <div class="container mx-auto px-6 py-12">
            <!-- Stats & Controls -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mb-12">
                <!-- Filters Sidebar -->
                <div class="lg:col-span-1">
                    <div class="dark-glassmorphism rounded-2xl p-6" data-aos="fade-right">
                        <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                            <i class="fas fa-filter text-orange-400"></i>
                            Filtres Avancés
                        </h3>

                        <!-- Categories -->
                        <div class="mb-8">
                            <h4 class="font-semibold text-gray-300 mb-4">Catégories</h4>
                            <div class="space-y-2">
                                @foreach($categories as $category)
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="rounded bg-gray-700 border-gray-600 text-orange-500 focus:ring-orange-400 mr-3">
                                    <span class="text-gray-300">{{ $category->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <button onclick="resetFilters()"
                            class="w-full py-3 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-800 transition font-medium">
                            <i class="fas fa-redo mr-2"></i>
                            Réinitialiser
                        </button>
                    </div>
                </div>

                <!-- Recipes Grid -->
                <div class="lg:col-span-3">
                    <!-- Controls Bar -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8" data-aos="fade-up">
                        <div>
                            <h3 class="text-2xl font-bold text-white">
                                Nos Recettes
                            </h3>
                        </div>


                    </div>

                    <!-- Recipes Grid -->
                    <div id="recipesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
                        @foreach($recipes as $recipe)
                        <div class="recipe-card card-3d dark-glassmorphism neon-glow">
                            <div class="relative overflow-hidden">
                                <img src="{{ $recipe->image }}"
                                    alt="{{ $recipe->title }}"
                                    class="recipe-image">
                                <button class="favorite-btn" onclick="toggleFavorite(1)">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <div class="absolute bottom-3 left-3">
                                    <span class="difficulty-badge difficulty-medium">{{ $recipe->difficulty }}</span>
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-bold text-white line-clamp-1">{{ $recipe->title }}</h3>
                                    <span class="text-gray-400 text-sm">{{ $recipe->temp_prepa }} min</span>
                                </div>
                                <p class="text-gray-400 text-sm mb-4 line-clamp-2">
                                    {{ $recipe->description }}
                                </p>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center text-gray-400 text-sm">
                                        <i class="fas fa-user-friends mr-1"></i>
                                        <span>{{ $recipe->personnes }} portions</span>
                                    </div>
                                    <span class="category-tag" style="background-color:{{ $recipe->cuisine->color }}">
                                        <i class="fas {{ $recipe->category->icon }}"></i>
                                        {{ $recipe->cuisine->name }}
                                    </span>
                                </div>

                                <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-700">
                                    <a href="{{ route('showRecipe') }}?id={{ $recipe->id }}"
                                        class="text-orange-400 hover:text-orange-300 font-medium text-sm">
                                        Voir <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Empty State -->
                    <div id="emptyState" class="empty-state p-12 text-center hidden" data-aos="fade-up">
                        <div class="max-w-md mx-auto">
                            <div class="text-6xl mb-6">🍽️</div>
                            <h3 class="text-2xl font-bold text-white mb-3">Aucune recette trouvée</h3>
                            <p class="text-gray-400 mb-6">
                                Aucune recette ne correspond à vos critères de recherche.
                            </p>
                            <button onclick="resetFilters()"
                                class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg hover:shadow-lg transition">
                                Réinitialiser les filtres
                            </button>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center" data-aos="fade-up">
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

            <!-- Featured Section -->
            <div class="mt-16" data-aos="fade-up">
                <h3 class="text-2xl font-bold text-white mb-8 font-['Poppins']">Recettes du Moment</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="card-3d dark-glassmorphism p-6">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-xl bg-gradient-to-r from-orange-500 to-red-500 flex items-center justify-center">
                                <i class="fas fa-crown text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-white">Recette du Jour</h4>
                                <p class="text-gray-400 text-sm">Ratatouille Provençale</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-3d dark-glassmorphism p-6">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-xl bg-gradient-to-r from-green-500 to-teal-500 flex items-center justify-center">
                                <i class="fas fa-bolt text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-white">Plus Rapide</h4>
                                <p class="text-gray-400 text-sm">Salade César - 20 min</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-3d dark-glassmorphism p-6">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-xl bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center">
                                <i class="fas fa-heart text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-white">Plus Populaire</h4>
                                <p class="text-gray-400 text-sm">Tiramisu - 312 ♥</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="dark-glassmorphism border-t border-white/10 py-8 mt-16">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-6 md:mb-0">
                        <div class="flex items-center">
                            <div class="floating mr-3">
                                <span class="text-2xl">🍳</span>
                            </div>
                            <h2 class="text-xl font-bold text-white">Recettes et Ingrédients</h2>
                        </div>
                        <p class="text-gray-400 mt-2">Votre compagnon culinaire ultime</p>
                    </div>

                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-pinterest text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="text-center mt-8 pt-8 border-t border-white/10">
                    <p class="text-gray-500">&copy; 2023 Recettes et Ingrédients. Tous droits réservés. Créé avec passion.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        // Particles.js Configuration
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 60,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#ff6b35'
                },
                shape: {
                    type: 'circle'
                },
                opacity: {
                    value: 0.5,
                    random: true
                },
                size: {
                    value: 3,
                    random: true
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ff6b35',
                    opacity: 0.2,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 3,
                    direction: 'none',
                    random: true,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'repulse'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    }
                },
                modes: {
                    repulse: {
                        distance: 100,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 4
                    }
                }
            },
            retina_detect: true
        });

        // Sidebar Toggle for Mobile
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.fixed');
            const mainContent = document.querySelector('.ml-0');

            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                mainContent.classList.remove('ml-0');
                mainContent.classList.add('ml-64');
            } else {
                sidebar.classList.add('hidden');
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-0');
            }
        });

        // Variables
        let currentView = 'grid';
        let activeFilters = new Set(['all']);
        let favorites = new Set([2, 5]);

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

            document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
                cb.checked = false;
            });

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
                recipe.style.display = 'block';
                visibleCount++;
            });

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
            }
        }

        // Sort recipes
        function sortRecipes(criteria) {
            const recipesGrid = document.getElementById('recipesGrid');
            const recipes = Array.from(recipesGrid.querySelectorAll('.recipe-card'));

            recipes.sort((a, b) => {
                switch (criteria) {
                    case 'popular':
                        const aLikes = parseInt(a.querySelector('.fa-heart').parentElement.nextElementSibling.textContent);
                        const bLikes = parseInt(b.querySelector('.fa-heart').parentElement.nextElementSibling.textContent);
                        return bLikes - aLikes;
                    case 'rating':
                        const aRating = parseFloat(a.querySelector('.fa-star').parentElement.nextElementSibling.textContent);
                        const bRating = parseFloat(b.querySelector('.fa-star').parentElement.nextElementSibling.textContent);
                        return bRating - aRating;
                    case 'time':
                        const aTime = parseFloat(a.querySelector('.text-gray-400').textContent);
                        const bTime = parseFloat(b.querySelector('.text-gray-400').textContent);
                        return aTime - bTime;
                    default:
                        return 0;
                }
            });

            recipes.forEach(recipe => recipesGrid.appendChild(recipe));
        }

        // Search function
        document.getElementById('searchInput').addEventListener('input', function() {
            const query = this.value.toLowerCase();
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

            const emptyState = document.getElementById('emptyState');
            if (visibleCount === 0 && query) {
                emptyState.querySelector('h3').textContent = 'Aucun résultat trouvé';
                emptyState.querySelector('p').textContent = `Aucune recette ne correspond à "${query}"`;
                emptyState.classList.remove('hidden');
                document.getElementById('recipesGrid').classList.add('hidden');
            } else if (visibleCount === 0) {
                emptyState.classList.remove('hidden');
                document.getElementById('recipesGrid').classList.add('hidden');
            } else {
                emptyState.classList.add('hidden');
                document.getElementById('recipesGrid').classList.remove('hidden');
            }
        });

        // Initialize favorites
        document.addEventListener('DOMContentLoaded', () => {
            favorites.forEach(id => {
                const btn = document.querySelector(`.favorite-btn:nth-child(${id})`);
                if (btn) btn.classList.add('active');
            });
        });
    </script>
</body>

</html>