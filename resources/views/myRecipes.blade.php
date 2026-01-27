<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mes Recettes - Recettes et Ingrédients</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --burnt-orange: #E8613C;
            --terracotta: #D84A2E;
            --cream: #FFF8F0;
            --sage: #8B9A7E;
            --charcoal: #2C2C2C;
            --gold: #D4AF37;
            --warm-white: #FDFCFA;
            --soft-gray: #F5F3F0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--soft-gray);
            color: var(--charcoal);
        }

        /* Sidebar */
        .sidebar {
            background: linear-gradient(180deg, #2C2C2C 0%, #1a1a1a 100%);
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.12);
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 280px;
            z-index: 50;
            overflow-y: auto;
        }

        .sidebar-logo {
            padding: 32px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-item {
            position: relative;
            display: flex;
            align-items: center;
            padding: 14px 24px;
            margin: 4px 12px;
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            font-weight: 500;
            font-size: 15px;
        }

        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 0;
            background: var(--burnt-orange);
            border-radius: 0 3px 3px 0;
            transition: height 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .sidebar-item:hover {
            color: white;
            background: rgba(255, 255, 255, 0.05);
            transform: translateX(4px);
        }

        .sidebar-item.active {
            color: var(--burnt-orange);
            background: rgba(232, 97, 60, 0.1);
        }

        .sidebar-item.active::before {
            height: 60%;
        }

        .sidebar-badge {
            margin-left: auto;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .user-profile {
            padding: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: auto;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: white;
            border-bottom: 1px solid #E8E5E1;
            padding: 24px 40px;
            position: sticky;
            top: 0;
            z-index: 40;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        }

        .search-container {
            position: relative;
        }

        .search-input {
            width: 320px;
            padding: 12px 16px 12px 44px;
            border: 2px solid #E8E5E1;
            border-radius: 12px;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            background: var(--warm-white);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--burnt-orange);
            box-shadow: 0 0 0 4px rgba(232, 97, 60, 0.1);
            background: white;
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .view-toggle {
            display: flex;
            background: var(--soft-gray);
            padding: 4px;
            border-radius: 10px;
            gap: 4px;
        }

        .view-toggle-btn {
            padding: 8px 12px;
            border-radius: 8px;
            border: none;
            background: transparent;
            color: #666;
            cursor: pointer;
            transition: all 0.2s;
        }

        .view-toggle-btn.active {
            background: white;
            color: var(--burnt-orange);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        }

        /* Content Area */
        .content-area {
            padding: 40px;
        }

        /* Filter Panel */
        .filter-panel {
            background: white;
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            height: fit-content;
            position: sticky;
            top: 120px;
        }

        .filter-section {
            margin-bottom: 28px;
        }

        .filter-title {
            font-weight: 700;
            font-size: 14px;
            color: var(--charcoal);
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            padding: 8px 0;
        }

        .filter-checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid #D1D1D1;
            border-radius: 5px;
            margin-right: 12px;
            accent-color: var(--burnt-orange);
            cursor: pointer;
        }

        .filter-label {
            flex: 1;
            font-size: 14px;
            color: #555;
            cursor: pointer;
        }

        .filter-count {
            font-size: 12px;
            color: #999;
            font-weight: 500;
        }

        /* Recipe Cards */
        .recipe-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 28px;
        }

        .recipe-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            cursor: pointer;
            animation: fadeInUp 0.5s ease-out backwards;
        }

        .recipe-card:nth-child(1) {
            animation-delay: 0s;
        }

        .recipe-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .recipe-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .recipe-card:nth-child(4) {
            animation-delay: 0.3s;
        }

        .recipe-card:nth-child(5) {
            animation-delay: 0.4s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .recipe-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 32px rgba(232, 97, 60, 0.15);
        }

        .recipe-image-container {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .recipe-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .recipe-card:hover .recipe-image {
            transform: scale(1.08);
        }

        .favorite-btn {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            z-index: 2;
        }

        .favorite-btn:hover {
            background: white;
            transform: scale(1.1);
        }

        .difficulty-badge {
            position: absolute;
            bottom: 16px;
            left: 16px;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            backdrop-filter: blur(8px);
        }

        .difficulty-easy {
            background: rgba(34, 197, 94, 0.95);
            color: white;
        }

        .difficulty-medium {
            background: rgba(251, 146, 60, 0.95);
            color: white;
        }

        .difficulty-hard {
            background: rgba(239, 68, 68, 0.95);
            color: white;
        }

        .recipe-content {
            padding: 24px;
        }

        .recipe-title {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            font-weight: 700;
            color: var(--charcoal);
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .recipe-time {
            font-size: 13px;
            color: #999;
            font-weight: 500;
        }

        .recipe-description {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            margin: 16px 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .recipe-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #F0F0F0;
        }

        .recipe-servings {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #666;
        }

        .recipe-tags {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .recipe-tag {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .tag-vegetarian {
            background: #E0F2FE;
            color: #0369A1;
        }

        .tag-meat {
            background: #FEE2E2;
            color: #991B1B;
        }

        .tag-cuisine {
            background: #F0FDF4;
            color: #166534;
        }

        .tag-quick {
            background: #FEF3C7;
            color: #92400E;
        }

        .recipe-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #F0F0F0;
        }

        .recipe-action-btn {
            background: none;
            border: none;
            color: #999;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: color 0.2s;
            padding: 6px 0;
        }

        .recipe-action-btn:hover {
            color: var(--burnt-orange);
        }

        .recipe-action-btn.primary {
            color: var(--burnt-orange);
            font-weight: 600;
        }

        /* Category Pills */
        .category-pills {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 32px;
        }

        .category-pill {
            padding: 10px 20px;
            border-radius: 24px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            border: 2px solid transparent;
        }

        .category-pill.active {
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(232, 97, 60, 0.3);
        }

        .category-pill:not(.active) {
            background: white;
            color: #666;
            border-color: #E8E5E1;
        }

        .category-pill:not(.active):hover {
            border-color: var(--burnt-orange);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        /* Action Buttons */
        .action-btn {
            padding: 12px 24px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .action-btn-primary {
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(232, 97, 60, 0.3);
        }

        .action-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(232, 97, 60, 0.4);
        }

        .action-btn-secondary {
            background: white;
            color: var(--burnt-orange);
            border: 2px solid var(--burnt-orange);
        }

        .action-btn-secondary:hover {
            background: var(--burnt-orange);
            color: white;
        }

        .action-btn-tertiary {
            background: white;
            color: #666;
            border: 2px solid #E8E5E1;
        }

        .action-btn-tertiary:hover {
            border-color: #999;
        }

        /* Add Recipe Card */
        .add-recipe-card {
            background: linear-gradient(135deg, #FFFBF5 0%, #FFF8F0 100%);
            border: 2px dashed #D4AF37;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 24px;
            min-height: 400px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .add-recipe-card:hover {
            border-color: var(--burnt-orange);
            background: linear-gradient(135deg, #FFF8F0 0%, #FFE8DC 100%);
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(232, 97, 60, 0.15);
        }

        .add-recipe-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            margin-bottom: 24px;
            transition: transform 0.3s;
        }

        .add-recipe-card:hover .add-recipe-icon {
            transform: rotate(90deg) scale(1.1);
        }

        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 40px;
            right: 40px;
            width: 68px;
            height: 68px;
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 8px 24px rgba(232, 97, 60, 0.4);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            z-index: 100;
            border: none;
        }

        .fab:hover {
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 12px 32px rgba(232, 97, 60, 0.5);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 48px;
        }

        .pagination-btn {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #E8E5E1;
            background: white;
            color: #666;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .pagination-btn:hover:not(.disabled) {
            border-color: var(--burnt-orange);
            color: var(--burnt-orange);
        }

        .pagination-btn.active {
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
            border-color: transparent;
        }

        .pagination-btn.disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .recipe-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .content-area {
                padding: 24px 20px;
            }

            .header {
                padding: 20px;
            }

            .search-input {
                width: 100%;
            }

            .fab {
                bottom: 24px;
                right: 24px;
                width: 60px;
                height: 60px;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #F5F3F0;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--burnt-orange), var(--terracotta));
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--terracotta);
        }

        /* Mobile Overlay */
        .mobile-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 45;
            display: none;
        }

        .mobile-overlay.active {
            display: block;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <div style="display: flex; align-items: center;">
                <span style="font-size: 32px; margin-right: 12px;">🍳</span>
                <h1 style="font-family: 'Playfair Display', serif; font-size: 20px; font-weight: 700; color: white;">Recettes & Ingrédients</h1>
            </div>
        </div>

        <nav style="padding: 24px 0; flex: 1;">
            <a href="dashboard.html" class="sidebar-item">
                <i class="fas fa-home" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Tableau de Bord</span>
            </a>

            <a href="mes-recettes.html" class="sidebar-item active">
                <i class="fas fa-book" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Mes Recettes</span>
                <span class="sidebar-badge" style="background: rgba(232, 97, 60, 0.2); color: var(--burnt-orange);">24</span>
            </a>

            <a href="ingredients.html" class="sidebar-item">
                <i class="fas fa-carrot" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Mes Ingrédients</span>
            </a>

            <a href="favoris.html" class="sidebar-item">
                <i class="fas fa-heart" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Favoris</span>
                <span class="sidebar-badge" style="background: rgba(236, 72, 153, 0.2); color: #EC4899;">8</span>
            </a>

            <a href="planning.html" class="sidebar-item">
                <i class="fas fa-calendar-alt" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Planning</span>
            </a>

            <a href="liste-courses.html" class="sidebar-item">
                <i class="fas fa-shopping-cart" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Liste de Courses</span>
                <span class="sidebar-badge" style="background: rgba(34, 197, 94, 0.2); color: #22C55E;">12</span>
            </a>

            <div style="border-top: 1px solid rgba(255, 255, 255, 0.1); margin: 24px 12px; padding-top: 24px;">
                <a href="parametres.html" class="sidebar-item">
                    <i class="fas fa-cog" style="width: 20px;"></i>
                    <span style="margin-left: 12px;">Paramètres</span>
                </a>

                <a href="profil.html" class="sidebar-item">
                    <i class="fas fa-user" style="width: 20px;"></i>
                    <span style="margin-left: 12px;">Mon Profil</span>
                </a>
            </div>
        </nav>

        <div class="user-profile">
            <div style="display: flex; align-items: center;">
                <div style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%); display: flex; align-items: center; justify-content: center; font-weight: 700; color: white; font-size: 18px;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div style="margin-left: 12px;">
                    <p style="font-weight: 600; color: white; font-size: 15px;">{{ Auth::user()->name }}</p>
                    <p style="font-size: 13px; color: rgba(255, 255, 255, 0.5);">Cuisinier passionné</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="header">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <button id="menuToggle" style="display: none; background: none; border: none; font-size: 24px; color: var(--charcoal); cursor: pointer;">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div>
                        <h2 style="font-family: 'Playfair Display', serif; font-size: 28px; font-weight: 700; color: var(--charcoal); margin-bottom: 4px;">Mes Recettes</h2>
                        <p style="color: #999; font-size: 14px;">Gérez et explorez vos créations culinaires</p>
                    </div>
                </div>

                <div style="display: flex; align-items: center; gap: 16px;">
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Rechercher une recette...">
                    </div>

                    <div class="view-toggle">
                        <button class="view-toggle-btn active">
                            <i class="fas fa-th-large"></i>
                        </button>
                        <button class="view-toggle-btn">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <div class="content-area">
            <div style="display: grid; grid-template-columns: 260px 1fr; gap: 32px;">
                <!-- Filter Panel -->
                <div>
                    <div class="filter-panel">
                        <h3 style="font-weight: 700; font-size: 16px; margin-bottom: 24px; display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-filter" style="color: var(--burnt-orange);"></i>
                            Filtres
                        </h3>

                        <!-- Categories -->
                        <div class="filter-section">
                            <h4 class="filter-title">Catégories</h4>
                            <div class="filter-option">
                                <input type="checkbox" class="filter-checkbox">
                                <label class="filter-label">Entrées</label>
                                <span class="filter-count">6</span>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" class="filter-checkbox" checked>
                                <label class="filter-label">Plats Principaux</label>
                                <span class="filter-count">12</span>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" class="filter-checkbox">
                                <label class="filter-label">Desserts</label>
                                <span class="filter-count">8</span>
                            </div>
                            <div class="filter-option">
                                <input type="checkbox" class="filter-checkbox">
                                <label class="filter-label">Apéritifs</label>
                                <span class="filter-count">3</span>
                            </div>
                        </div>
                        <button class="action-btn action-btn-tertiary" style="width: 100%; justify-content: center;">
                            <i class="fas fa-times"></i>
                            Réinitialiser
                        </button>
                    </div>
                </div>
                    <!-- Recipe Grid -->
                    <div class="recipe-grid">
                        <!-- Recipe Card 1 -->
                        @forelse($recipes as $recipe)
                        <div class="recipe-card">
                            <div class="recipe-image-container">
                                <img src="{{ $recipe->image ?? 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80' }}"
                                    alt="{{ $recipe->title }}"
                                    class="recipe-image">
                                <button class="favorite-btn">
                                    <i class="fas fa-heart" style="color: #EF4444;"></i>
                                </button>
                            </div>
                            <div class="recipe-content">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                                    <h4 class="recipe-title">{{ $recipe->title }}</h4>
                                </div>
                                <p class="recipe-description">{{ $recipe->description }}</p>
                                <div class="recipe-actions">
                                    <button class="recipe-action-btn primary">
                                        <i class="fas fa-eye"></i> Voir
                                    </button>
                                    <button class="recipe-action-btn">
                                        <i class="fas fa-edit"></i> Éditer
                                    </button>
                                    <button class="recipe-action-btn">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route("addRecipe") }}" class="fab">
                            <i class="fas fa-plus"></i>
                        </a>
                        @empty
                        <div class="add-recipe-card">
                            <div class="add-recipe-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                            <h4 style="font-family: 'Playfair Display', serif; font-size: 22px; font-weight: 700; margin-bottom: 12px; color: var(--charcoal);">Ajouter une recette</h4>
                            <p style="color: #666; text-align: center; margin-bottom: 24px; line-height: 1.6;">Créez votre propre recette et partagez votre créativité culinaire.</p>
                            <a href="{{ route("addRecipe") }}" class="action-btn action-btn-primary">
                                <i class="fas fa-plus"></i>
                                Créer une recette
                            </a>
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');

        // Show menu toggle on mobile
        if (window.innerWidth <= 1024) {
            menuToggle.style.display = 'block';
        }

        window.addEventListener('resize', () => {
            if (window.innerWidth <= 1024) {
                menuToggle.style.display = 'block';
            } else {
                menuToggle.style.display = 'none';
                sidebar.classList.remove('open');
                mobileOverlay.classList.remove('active');
            }
        });

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            mobileOverlay.classList.toggle('active');
        });

        mobileOverlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            mobileOverlay.classList.remove('active');
        });

        // View toggle
        document.querySelectorAll('.view-toggle-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.view-toggle-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Favorite toggle
        document.querySelectorAll('.favorite-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const icon = this.querySelector('i');
                if (icon.classList.contains('far')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    icon.style.color = '#EF4444';
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    icon.style.color = '#999';
                }
            });
        });

        // Category pills
        document.querySelectorAll('.category-pill').forEach(pill => {
            pill.addEventListener('click', function() {
                document.querySelectorAll('.category-pill').forEach(p => p.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Recipe card click
        document.querySelectorAll('.recipe-card:not(.add-recipe-card)').forEach(card => {
            card.addEventListener('click', function(e) {
                if (!e.target.closest('button')) {
                    console.log('View recipe details');
                }
            });
        });

        // Action buttons
        document.querySelectorAll('.recipe-action-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
</body>

</html>