<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mes Recettes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            margin-bottom: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #212529;
            margin-bottom: 4px;
        }

        .page-subtitle {
            color: #6c757d;
            font-size: 14px;
        }

        /* Search Bar */
        .search-container {
            position: relative;
            flex: 1;
            max-width: 400px;
        }

        .search-input {
            width: 100%;
            padding: 10px 14px 10px 40px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        /* Filter Tabs */
        .filter-tabs {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: 8px 16px;
            border: 1px solid #ced4da;
            background: white;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            color: #495057;
        }

        .filter-tab:hover {
            border-color: #2563eb;
            color: #2563eb;
        }

        .filter-tab.active {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
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
        }

        .favorite-btn:hover {
            transform: scale(1.1);
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

        .recipe-actions {
            display: flex;
            gap: 12px;
            padding-top: 16px;
            border-top: 1px solid #e9ecef;
        }

        .recipe-action-btn {
            flex: 1;
            padding: 8px 12px;
            background: white;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            color: #495057;
            text-decoration: none;
        }

        .recipe-action-btn:hover {
            background: #f8f9fa;
            border-color: #2563eb;
            color: #2563eb;
        }

        .recipe-action-btn.primary {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .recipe-action-btn.primary:hover {
            background: #1d4ed8;
        }

        .recipe-action-btn.danger:hover {
            border-color: #dc3545;
            color: #dc3545;
        }

        /* Add Recipe Card */
        .add-recipe-card {
            background: linear-gradient(135deg, #f0f7ff 0%, #e0f0ff 100%);
            border: 2px dashed #2563eb;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 48px 24px;
            min-height: 360px;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .add-recipe-card:hover {
            border-color: #1d4ed8;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            transform: translateY(-4px);
        }

        .add-icon {
            width: 80px;
            height: 80px;
            background: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .add-recipe-card:hover .add-icon {
            transform: rotate(90deg);
        }

        .add-title {
            font-size: 20px;
            font-weight: 700;
            color: #212529;
            margin-bottom: 8px;
        }

        .add-description {
            color: #6c757d;
            text-align: center;
            line-height: 1.5;
            font-size: 14px;
        }

        /* FAB Button */
        .fab {
            position: fixed;
            bottom: 32px;
            right: 32px;
            width: 60px;
            height: 60px;
            background: #2563eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            border: none;
        }

        .fab:hover {
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.5);
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

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-container {
                max-width: 100%;
            }

            .recipe-grid {
                grid-template-columns: 1fr;
            }

            .fab {
                bottom: 20px;
                right: 20px;
            }
        }
    </style>
</head>

<body>
    @include('header')

    <!-- Main Container -->
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Mes Recettes</h1>
                <p class="page-subtitle">Gérez et explorez vos créations culinaires</p>
            </div>
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Rechercher une recette...">
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <form>
                @foreach($categories as $category)
                <button name="category" value="{{ $category->id_category }}" class="filter-tab">{{ $category->name }}</button>
                @endforeach
            </form>
        </div>

        <!-- Recipe Grid -->
        <div class="recipe-grid">
            @foreach($recipes as $recipe)
            <div class="recipe-card">
                <div class="recipe-image-container">
                    <img src="{{ $recipe->image ?? 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80' }}"
                        alt="{{ $recipe->title }}"
                        class="recipe-image">
                    <button class="favorite-btn">
                        <i class="fas fa-heart" style="color: #dc3545;"></i>
                    </button>
                </div>
                <div class="recipe-content">
                    <h4 class="recipe-title">{{ $recipe->title }}</h4>
                    <p class="recipe-description">{{ $recipe->description }}</p>
                    <div class="recipe-actions">
                        <a href="{{ route('showRecipe') }}?id={{ $recipe->id }}" class="recipe-action-btn primary">
                            <i class="fas fa-eye"></i> Voir
                        </a>
                        <a href="{{ route('showEditRecipeForm') }}?id={{ $recipe->id }}" class="recipe-action-btn">
                            <i class="fas fa-edit"></i> Éditer
                        </a>
                        <form method="post" action="{{ route('delete') }}" style="display: inline;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $recipe->id }}">
                            <button type="button" data-recipe-title="{{ $recipe->title }}" class="recipe-action-btn danger delete-btn">
                                <i class="fas fa-trash-alt"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @if(empty($recipes))
            <!-- Empty State -->
            <div style="grid-column: 1 / -1;">
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h2 class="empty-title">Aucune recette pour le moment</h2>
                    <p class="empty-description">Commencez à créer vos délicieuses recettes maintenant !</p>
                    <a href="{{ route('addRecipe') }}" class="btn-primary">
                        <i class="fas fa-plus"></i> Créer une recette
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Floating Action Button -->
    <a href="{{ route('addRecipe') }}" class="fab">
        <i class="fas fa-plus"></i>
    </a>

    <script>
        // Filter tabs functionality
        document.querySelectorAll('.filter-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Favorite button functionality
        document.querySelectorAll('.favorite-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const icon = this.querySelector('i');
                if (icon.classList.contains('fas')) {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    icon.style.color = '#6c757d';
                } else {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    icon.style.color = '#dc3545';
                }
            });
        });

        // Delete button with SweetAlert
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const recipeTitle = this.getAttribute('data-recipe-title');
                const form = this.closest('form');

                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    html: `
                        <div class="text-center">
                            <p class="text-lg font-semibold mb-2">Supprimer la recette</p>
                            <p class="text-gray-600">"<strong>${recipeTitle}</strong>"</p>
                            <p class="text-sm text-gray-500 mt-2">Cette action est irréversible !</p>
                        </div>
                    `,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Annuler',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Search functionality
        const searchInput = document.querySelector('.search-input');
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            document.querySelectorAll('.recipe-card').forEach(card => {
                const title = card.querySelector('.recipe-title')?.textContent.toLowerCase() || '';
                const description = card.querySelector('.recipe-description')?.textContent.toLowerCase() || '';

                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>