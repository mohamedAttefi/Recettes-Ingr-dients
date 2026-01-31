<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toutes les Recettes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
            color: #212529;
        }

        .controls-bar {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 1rem 0;
            margin-bottom: 1rem
        }

        .controls-container {
            max-width: 1200px;
            margin: auto;
            padding: 0 1rem;
            display: flex;
            gap: 1rem;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .search-filter-group {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-wrapper {
            position: relative;
        }

        .search-input {
            padding: 0.6rem 0.75rem 0.6rem 2.2rem;
            border: 1px solid #d1d5db;
            border-radius: 9999px;
            min-width: 220px;
        }

        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .filter-tabs {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: 0.45rem 0.9rem;
            border-radius: 9999px;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filter-tab:hover {
            background: #e5e7eb;
        }

        .filter-tab.active {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .btn-primary-custom {
            background: #2563eb;
            color: white;
            padding: 0.6rem 1rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }


        /* Navbar */
        .navbar {
            background: white;
            border-bottom: 1px solid #e9ecef;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
            color: #2563eb;
            text-decoration: none;
        }

        .navbar-nav {
            display: flex;
            gap: 24px;
            align-items: center;
        }

        .nav-link {
            color: #495057;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.2s;
        }

        .nav-link:hover {
            color: #2563eb;
        }

        .nav-link.active {
            color: #2563eb;
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            padding: 60px 24px;
            border-radius: 12px;
            margin-bottom: 40px;
            text-align: center;
            color: white;
        }

        .page-title {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .page-subtitle {
            font-size: 16px;
            opacity: 0.9;
        }



        /* Recipe Grid */
        .recipe-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
        }

        /* Recipe Card */
        .recipe-card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s;
            cursor: pointer;
        }

        .recipe-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .recipe-image-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .recipe-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .recipe-card:hover .recipe-image {
            transform: scale(1.05);
        }

        .favorite-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 36px;
            height: 36px;
            background: white;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            z-index: 10;
        }

        .favorite-btn:hover {
            transform: scale(1.1);
        }

        .favorite-btn.active {
            color: #dc3545;
        }

        .difficulty-badge {
            position: absolute;
            bottom: 12px;
            left: 12px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: white;
        }

        .difficulty-easy {
            background: #10b981;
        }

        .difficulty-medium {
            background: #f59e0b;
        }

        .difficulty-hard {
            background: #ef4444;
        }

        .recipe-content {
            padding: 20px;
        }

        .recipe-title {
            font-size: 18px;
            font-weight: 600;
            color: #212529;
            margin-bottom: 8px;
        }

        .recipe-description {
            font-size: 14px;
            color: #6c757d;
            line-height: 1.5;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .recipe-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid #e9ecef;
        }

        .recipe-time {
            font-size: 13px;
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .recipe-servings {
            font-size: 13px;
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .category-badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            background: #e0f2fe;
            color: #0369a1;
        }

        /* View Button */
        .view-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: #2563eb;
            color: white;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            margin-top: 12px;
        }

        .view-btn:hover {
            background: #1d4ed8;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-icon {
            font-size: 80px;
            color: #dee2e6;
            margin-bottom: 24px;
        }

        .empty-title {
            font-size: 24px;
            font-weight: 700;
            color: #212529;
            margin-bottom: 12px;
        }

        .empty-description {
            color: #6c757d;
            margin-bottom: 32px;
            font-size: 16px;
        }

        .btn-primary {
            padding: 12px 24px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 48px;
        }

        .pagination-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ced4da;
            background: white;
            border-radius: 6px;
            color: #495057;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .pagination-btn:hover:not(.disabled) {
            border-color: #2563eb;
            color: #2563eb;
        }

        .pagination-btn.active {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .pagination-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-content h4 {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 4px;
        }

        .stat-content p {
            font-size: 24px;
            font-weight: 700;
            color: #212529;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 12px 16px;
            }

            .navbar-nav {
                display: none;
            }

            .container {
                padding: 24px 16px;
            }

            .page-title {
                font-size: 28px;
            }



            .recipe-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('header')

    <!-- Main Container -->
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Découvrez Nos Recettes</h1>
            <p class="page-subtitle">Explorez notre collection de {{ $totalRecipes ?? '247' }} recettes délicieuses</p>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); color: white;">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="stat-content">
                    <h4>Total Recettes</h4>
                    <p>{{ $totalRecipes ?? '247' }}</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white;">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="stat-content">
                    <h4>Recette du Jour</h4>
                    <p>Ratatouille</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white;">
                    <i class="fas fa-fire"></i>
                </div>
                <div class="stat-content">
                    <h4>Plus Populaire</h4>
                    <p>Tiramisu</p>
                </div>
            </div>
        </div>

        <div class="controls-bar">
            <div class="controls-container">

                <!-- Search + Filter -->
                <form method="GET" action="{{ route('allRecipes') }}" class="search-filter-group">

                    <!-- Search -->
                    <div class="search-wrapper">
                        <i class="fas fa-search search-icon"></i>
                        <input
                            type="text"
                            name="q"
                            value="{{ request('q') }}"
                            placeholder="Rechercher une recette..."
                            class="search-input">
                    </div>

                    <!-- Category buttons -->
                    <div class="filter-tabs">

                        <!-- All -->
                        <button
                            type="submit"
                            name="category"
                            value=""
                            class="filter-tab {{ request('category') ? '' : 'active' }}">
                            Toutes
                        </button>

                        @foreach($categories ?? [] as $category)
                        <button
                            type="submit"
                            name="category"
                            value="{{ $category->id }}"
                            class="filter-tab {{ request('category') == $category->id ? 'active' : '' }}">
                            {{ $category->name }}
                        </button>
                        @endforeach

                    </div>
                </form>

                <!-- Add recipe -->
                <a href="{{ route('addRecipe') }}" class="btn-primary-custom">
                    <i class="fas fa-plus"></i>
                    <span>Nouvelle Recette</span>
                </a>

            </div>
        </div>


        <!-- Filter Tabs -->


        <!-- Recipe Grid -->
        <div class="recipe-grid" id="recipesGrid">
            @forelse($recipes ?? [] as $recipe)
            <div class="recipe-card"
                data-category="{{ $recipe->category->name ?? '' }}"
                data-difficulty="{{ $recipe->difficulty ?? '' }}">
                <div class="recipe-image-container">
                    <img src="{{ $recipe->image ?? 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500' }}"
                        alt="{{ $recipe->title }}"
                        class="recipe-image">
                    <button class="favorite-btn" onclick="toggleFavorite(this, {{ $recipe->id }})">
                        <i class="far fa-heart"></i>
                    </button>
                    <span class="difficulty-badge difficulty-{{ $recipe->difficulty ?? 'medium' }}">
                        {{ ucfirst($recipe->difficulty ?? 'Moyen') }}
                    </span>
                </div>
                <div class="recipe-content">
                    <h3 class="recipe-title">{{ $recipe->title }}</h3>
                    <p class="recipe-description">{{ $recipe->description }}</p>

                    <div style="display: flex; gap: 8px; margin: 12px 0;">
                        <span class="category-badge">
                            <i class="fas fa-utensils"></i> {{ $recipe->category->name ?? 'Plat' }}
                        </span>
                        @if($recipe->cuisine)
                        <span class="category-badge" style="background: {{ $recipe->cuisine->color ?? '#e0f2fe' }};">
                            {{ $recipe->cuisine->name }}
                        </span>
                        @endif
                    </div>

                    <div class="recipe-meta">
                        <div class="recipe-time">
                            <i class="far fa-clock"></i>
                            <span>{{ $recipe->temp_prepa ?? 30 }} min</span>
                        </div>
                        <div class="recipe-servings">
                            <i class="fas fa-user-friends"></i>
                            <span>{{ $recipe->personnes ?? 4 }} pers</span>
                        </div>
                    </div>

                    <a href="{{ route('showRecipe') }}?id={{ $recipe->id }}" class="view-btn">
                        <i class="fas fa-eye"></i> Voir la recette
                    </a>
                </div>
            </div>
            @empty
            <div class="empty-state" style="grid-column: 1 / -1;">
                <div class="empty-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h3 class="empty-title">Aucune recette disponible</h3>
                <p class="empty-description">Commencez à créer vos délicieuses recettes maintenant !</p>
                <a href="{{ route('addRecipe') }}" class="btn-primary">
                    <i class="fas fa-plus"></i> Créer une recette
                </a>
            </div>
            @endforelse
        </div>

        <!-- Empty State (for filtered results) -->
        <div id="emptyState" class="empty-state" style="display: none;">
            <div class="empty-icon">
                <i class="fas fa-search"></i>
            </div>
            <h3 class="empty-title">Aucune recette trouvée</h3>
            <p class="empty-description">Essayez d'ajuster vos filtres de recherche</p>
            <button onclick="resetFilters()" class="btn-primary">
                <i class="fas fa-redo"></i> Réinitialiser les filtres
            </button>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <button class="pagination-btn disabled">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="pagination-btn active">1</button>
            <button class="pagination-btn">2</button>
            <button class="pagination-btn">3</button>
            <span style="padding: 0 8px; color: #6c757d;">...</span>
            <button class="pagination-btn">10</button>
            <button class="pagination-btn">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            filterRecipes();
        });

        // Category filter
        document.getElementById('categoryFilter').addEventListener('change', function() {
            filterRecipes();
        });

        // Difficulty filter
        document.getElementById('difficultyFilter').addEventListener('change', function() {
            filterRecipes();
        });

        // Filter by category tabs
        function filterByCategory(category) {
            // Update active tab
            document.querySelectorAll('.filter-tab').forEach(tab => {
                tab.classList.remove('active');
                if ((category === 'all' && tab.textContent.includes('Toutes')) ||
                    tab.textContent.trim() === category) {
                    tab.classList.add('active');
                }
            });

            // Reset category dropdown if "Toutes" is selected
            if (category === 'all') {
                document.getElementById('categoryFilter').value = '';
            }

            filterRecipes();
        }

        // Main filter function
        function filterRecipes() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const categoryFilter = document.getElementById('categoryFilter').value.toLowerCase();
            const difficultyFilter = document.getElementById('difficultyFilter').value.toLowerCase();
            const activeTab = document.querySelector('.filter-tab.active')?.textContent.trim().toLowerCase();

            const cards = document.querySelectorAll('.recipe-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const title = card.querySelector('.recipe-title')?.textContent.toLowerCase() || '';
                const description = card.querySelector('.recipe-description')?.textContent.toLowerCase() || '';
                const category = card.dataset.category?.toLowerCase() || '';
                const difficulty = card.dataset.difficulty?.toLowerCase() || '';

                // Check all filters
                const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm);
                const matchesCategory = !categoryFilter || category.includes(categoryFilter);
                const matchesDifficulty = !difficultyFilter || difficulty === difficultyFilter;
                const matchesTab = !activeTab || activeTab === 'toutes' || category.includes(activeTab);

                if (matchesSearch && matchesCategory && matchesDifficulty && matchesTab) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide empty state
            const emptyState = document.getElementById('emptyState');
            const recipesGrid = document.getElementById('recipesGrid');

            if (visibleCount === 0) {
                emptyState.style.display = 'block';
                recipesGrid.style.display = 'none';
            } else {
                emptyState.style.display = 'none';
                recipesGrid.style.display = 'grid';
            }
        }

        // Reset filters
        function resetFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('categoryFilter').value = '';
            document.getElementById('difficultyFilter').value = '';

            document.querySelectorAll('.filter-tab').forEach(tab => {
                tab.classList.remove('active');
                if (tab.textContent.includes('Toutes')) {
                    tab.classList.add('active');
                }
            });

            filterRecipes();
        }

        // Toggle favorite
        function toggleFavorite(btn, recipeId) {
            const icon = btn.querySelector('i');

            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                btn.classList.add('active');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                btn.classList.remove('active');
            }

            // Here you can add AJAX call to save favorite to database
            console.log('Toggle favorite for recipe:', recipeId);
        }

        // Pagination functionality
        document.querySelectorAll('.pagination-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if (!this.classList.contains('disabled')) {
                    document.querySelectorAll('.pagination-btn').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    // Add pagination logic here
                }
            });
        });
    </script>
</body>

</html>