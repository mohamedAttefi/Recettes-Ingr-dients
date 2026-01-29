<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $recipe->title }} - Recettes et Ingrédients</title>
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
            --warm-white: #FDFCFA;
            --soft-gray: #F5F3F0;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }
        
        .recipe-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('{{ $recipe->image_url ?? "https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" }}');
            background-size: cover;
            background-position: center;
            height: 500px;
            position: relative;
        }
        
        .difficulty-badge {
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
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
        
        .ingredient-checkbox:checked + label {
            text-decoration: line-through;
            color: #94a3b8;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            flex-shrink: 0;
        }
        
        .nutrition-item {
            border-radius: 12px;
            padding: 16px;
            text-align: center;
            background: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .nutrition-item:hover {
            transform: translateY(-5px);
        }
        
        .print-button {
            transition: all 0.3s ease;
        }
        
        .print-button:hover {
            transform: rotate(15deg);
        }
        
        .rating-star {
            color: #e5e7eb;
            font-size: 24px;
            transition: color 0.2s;
        }
        
        .rating-star.active {
            color: #fbbf24;
        }
        
        .serving-control {
            background: white;
            border-radius: 12px;
            padding: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .serving-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 2px solid #e2e8f0;
            background: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .serving-btn:hover {
            border-color: var(--burnt-orange);
            background: rgba(232, 97, 60, 0.05);
        }
        
        .category-tag {
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .share-button {
            transition: all 0.3s ease;
        }
        
        .share-button:hover {
            transform: scale(1.1);
        }
        
        .image-modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
        }
        
        .image-modal.active {
            display: flex;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .timer-item {
            background: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        .timer-progress {
            height: 8px;
            background: #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 12px;
        }
        
        .timer-progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            width: 0%;
            transition: width 1s linear;
        }
        
        .comment-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            flex-shrink: 0;
        }
        
        .ingredient-section {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .recipe-card {
            transition: all 0.3s ease;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        .recipe-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
        }
        
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            cursor: pointer;
            z-index: 100;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }
        
        .scroll-top.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .mobile-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            border-top: 1px solid #e2e8f0;
            padding: 12px;
            z-index: 90;
            display: none;
        }
        
        @media (max-width: 768px) {
            .recipe-hero {
                height: 350px;
            }
            
            .mobile-nav {
                display: flex;
            }
            
            .desktop-only {
                display: none;
            }
        }
        
        .save-recipe-btn.active {
            color: #ef4444;
            animation: heartBeat 0.5s;
        }
        
        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }
        
        .cooking-mode {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: white;
            z-index: 2000;
            display: none;
            flex-direction: column;
        }
        
        .cooking-mode.active {
            display: flex;
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
                        <span class="text-xl font-bold text-gray-800">Recettes et Ingrédients</span>
                    </a>
                </div>
                
                <div class="flex items-center gap-4">
                    <button onclick="toggleCookingMode()" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition flex items-center gap-2">
                        <i class="fas fa-utensils"></i>
                        <span class="hidden md:inline">Mode Cuisson</span>
                    </button>
                    <button onclick="window.print()" class="p-2 text-gray-600 hover:text-orange-500 transition print-button">
                        <i class="fas fa-print text-xl"></i>
                    </button>
                    @auth
                    <a href="{{ route('myRecipe') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                        Mes Recettes
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Recipe Hero Section -->
    <div class="recipe-hero">
        <div class="h-full flex items-end">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pb-12">
                <div class="text-white">
                    <div class="flex flex-wrap items-center gap-4 mb-4">
                        <span class="category-tag">
                            <i class="fas {{ $recipe->category->icon }}"></i>
                            
                        </span>
                        <span class="difficulty-badge {{ 'difficulty-' . $recipe->difficulty }}">
                            <i class="fas fa-signal"></i>
                            {{ $recipe->difficulty }}
                        </span>
                        @if($recipe->cuisine)
                        <span style="background-color: {{ $recipe->cuisine->color }}" class=" backdrop-blur-sm px-4 py-2 rounded-full text-sm">
                            <i class="fas fa-globe-americas mr-2"></i>
                            {{ $recipe->cuisine->name }}
                        </span>
                        @endif
                    </div>
                    
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 font-['Playfair+Display']">
                        {{ $recipe->title }}
                    </h1>
                    
                    <p class="text-lg text-gray-200 max-w-3xl mb-6">
                        {{ $recipe->description }}
                    </p>
                    
                    <div class="flex flex-wrap items-center gap-6">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-user-friends text-gray-300"></i>
                            <span class="font-semibold">{{ $recipe->personnes }} portions</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-clock text-gray-300"></i>
                            <span class="font-semibold">{{ $recipe->temp_prepa + $recipe->temp_cuission }} min total</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Ingredients & Info -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Recipe Stats & Actions -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-2">
                            <button onclick="toggleFavorite()" id="favoriteBtn"
                                    class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center hover:bg-red-50 transition">
                                <i class="fas fa-heart text-gray-400 text-xl"></i>
                            </button>
                            <button onclick="shareRecipe()"
                                    class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center hover:bg-blue-50 transition share-button">
                                <i class="fas fa-share-alt text-gray-400 text-xl"></i>
                            </button>
                        </div>
                        
                        @if(Auth::check() && Auth::id() == $recipe->user_id)
                        <div class="flex gap-2">
                            <a href=""
                               class="px-4 py-2 bg-orange-100 text-orange-600 rounded-lg hover:bg-orange-200 transition flex items-center gap-2">
                                <i class="fas fa-edit"></i>
                                <span class="desktop-only">Modifier</span>
                            </a>
                        </div>
                        @endif
                    </div>
                    
                    <!-- Servings Control -->
                    <div class="mb-6">
                        <label class="block font-semibold text-gray-700 mb-3">Nombre de portions</label>
                        <div class="serving-control">
                            <div class="flex items-center justify-between">
                                <button onclick="adjustServings(-1)" class="serving-btn">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span id="servingCount" class="text-2xl font-bold">{{ $recipe->personnes }}</span>
                                <button onclick="adjustServings(1)" class="serving-btn">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Timers -->
                    <div class="space-y-4">
                        <div class="timer-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold text-gray-700">Préparation</span>
                                <span id="prepTimer" class="text-2xl font-bold text-gray-800">{{ $recipe->temp_prepa }} min</span>
                            </div>
                            <button onclick="startTimer('prep', {{ $recipe->temp_prepa }})"
                                    class="w-full py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                                <i class="fas fa-play mr-2"></i>Démarrer le minuteur
                            </button>
                            <div class="timer-progress">
                                <div id="prepProgress" class="timer-progress-fill"></div>
                            </div>
                        </div>
                        
                        @if($recipe->cook_time)
                        <div class="timer-item">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold text-gray-700">Cuisson</span>
                                <span id="cookTimer" class="text-2xl font-bold text-gray-800">{{ $recipe->temp_cuission }} min</span>
                            </div>
                            <button onclick="startTimer('cook', {{ $recipe->temp_cuission }})"
                                    class="w-full py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                                <i class="fas fa-play mr-2"></i>Démarrer le minuteur
                            </button>
                            <div class="timer-progress">
                                <div id="cookProgress" class="timer-progress-fill"></div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Ingredients -->
                <div class="ingredient-section">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                            <i class="fas fa-carrot text-orange-500"></i>
                            Ingrédients
                        </h2>
                        <button onclick="checkAllIngredients()" class="text-sm text-orange-600 hover:text-orange-700 font-semibold">
                            <i class="fas fa-check-double mr-1"></i>Tout cocher
                        </button>
                    </div>
                    
                    <div id="ingredientsList" class="space-y-4">
                        @foreach($recipe->ingredients as $ingredient)
                        <div class="flex items-start">
                            <input type="checkbox" id="ingredient-{{ $ingredient->id }}" 
                                   class="ingredient-checkbox mt-1 mr-3" 
                                   onchange="updateShoppingList(this, {{ $ingredient->id }})">
                            <label for="ingredient-{{ $ingredient->id }}" class="flex-1 cursor-pointer">
                                <span class="text-gray-600">{{ $ingredient->nom }}</span>
                            </label>

                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Nutrition Facts (Optional) -->
                @if($recipe->astuces)
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-3">
                        <i class="fas fa-apple-alt text-green-500"></i>
                        Astuces de chef
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="nutrition-item">
                            <div class="text-2xl font-bold text-gray-800 mb-1">{{ $recipe->astuces }}</div>
                        </div>
                        
                    </div>
                </div>
                @endif
            </div>
            
            <div class="lg:col-span-2 space-y-8">

                
                <!-- Preparation Steps -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                        <i class="fas fa-list-ol text-orange-500"></i>
                        Étapes de Préparation
                    </h2>
                    
                    <div class="space-y-8">
                        @foreach($recipe->etapes as $step)
                        <div class="flex gap-6">
                            <div class="step-number">{{ $step->numero_etape }}</div>
                            <div class="flex-1">
                                <p class="text-gray-700 text-lg leading-relaxed">{{ $step->description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                
               
                <!-- Author & Info -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-full bg-gradient-to-r from-orange-500 to-red-500 flex items-center justify-center text-white text-xl font-bold">
                                {{ strtoupper(substr($recipe->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">{{ $recipe->user->name }}</h4>
                                <p class="text-gray-600 text-sm">Publié le {{ $recipe->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-2xl font-bold text-orange-500">{{ $recipe->rating ?? '4.8' }}/5</div>
                            <div class="flex justify-end">
                                @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star rating-star {{ $i <= ($recipe->rating ?? 4.8) ? 'active' : '' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    @if($recipe->comments)
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Commentaires ({{ $recipe->comments_count ?? 12 }})</h3>
                    
                    
                    <!-- Comments List -->
                    <div class="space-y-6">
                        @for($i = 1; $i <= 3; $i++)
                        <div class="flex gap-4 pb-6 border-b border-gray-100">
                            <div class="comment-avatar">U{{ $i }}</div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h4 class="font-bold text-gray-800">Utilisateur {{ $i }}</h4>
                                        <p class="text-gray-500 text-sm">Il y a {{ $i }} jour{{ $i > 1 ? 's' : '' }}</p>
                                    </div>
                                    <div class="flex text-yellow-400">
                                        @for($j = 1; $j <= 5; $j++)
                                        <i class="fas fa-star {{ $j <= (6-$i) ? 'active' : '' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-gray-700">
                                    {{ ['Super recette ! J\'ai adoré.', 'Très facile à suivre, merci pour le partage.', 'Parfait pour un dîner en famille.'][$i-1] }}
                                </p>
                                <div class="flex gap-4 mt-3">
                                    <button class="text-gray-500 hover:text-orange-500 text-sm flex items-center gap-1">
                                        <i class="far fa-thumbs-up"></i> Utile
                                    </button>
                                    <button class="text-gray-500 hover:text-orange-500 text-sm flex items-center gap-1">
                                        <i class="far fa-comment"></i> Répondre
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                    @else
                    <div class="mb-6">
            <i class="fas fa-comment-slash text-5xl text-gray-300 mb-4"></i>
            <h4 class="text-xl font-semibold text-gray-700 mb-2">Aucun commentaire pour l'instant</h4>
            <p class="text-gray-500 max-w-md mx-auto">
                Soyez le premier à partager votre avis sur cette recette !
            </p>
        </div>
                    @endif
                    @auth
                    <div class="mb-8">
                        <textarea id="commentInput"
                                  class="w-full border border-gray-300 rounded-lg p-4 focus:ring-2 focus:ring-orange-500 focus:border-transparent" 
                                  placeholder="Ajouter un commentaire..." 
                                  rows="3"></textarea>
                        <div class="flex justify-between items-center mt-4">
                            <button onclick="addComment()" 
                                    class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition">
                                Publier
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="text-center py-6 border-2 border-dashed border-gray-200 rounded-lg mb-8">
                        <p class="text-gray-600 mb-4">Connectez-vous pour ajouter un commentaire</p>
                        <a href="{{ route('login') }}"
                           class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition inline-block">
                            Se connecter
                        </a>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="mobile-nav">
        <div class="grid grid-cols-4 gap-2">
            <button onclick="scrollToIngredients()" class="flex flex-col items-center text-gray-600 hover:text-orange-500 transition">
                <i class="fas fa-carrot text-xl mb-1"></i>
                <span class="text-xs">Ingrédients</span>
            </button>
            <button onclick="scrollToSteps()" class="flex flex-col items-center text-gray-600 hover:text-orange-500 transition">
                <i class="fas fa-list-ol text-xl mb-1"></i>
                <span class="text-xs">Étapes</span>
            </button>
            <button onclick="toggleCookingMode()" class="flex flex-col items-center text-gray-600 hover:text-orange-500 transition">
                <i class="fas fa-utensils text-xl mb-1"></i>
                <span class="text-xs">Cuisson</span>
            </button>
            <button onclick="shareRecipe()" class="flex flex-col items-center text-gray-600 hover:text-orange-500 transition">
                <i class="fas fa-share-alt text-xl mb-1"></i>
                <span class="text-xs">Partager</span>
            </button>
        </div>
    </div>

    <!-- Scroll to Top -->
    <div class="scroll-top" onclick="scrollToTop()">
        <i class="fas fa-chevron-up"></i>
    </div>

    <!-- Image Modal -->
    <div class="image-modal" id="imageModal" onclick="closeImageModal()">
        <img id="modalImage" class="max-w-4xl max-h-[90vh] object-contain">
        <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white text-3xl hover:text-gray-300">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Cooking Mode -->
    <div class="cooking-mode" id="cookingMode">
        <div class="flex-1 overflow-auto">
            <div class="max-w-3xl mx-auto p-6">
                <!-- Header -->
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl font-bold">Mode Cuisson</h2>
                    <button onclick="toggleCookingMode()" class="text-2xl text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <!-- Current Step -->
                <div class="bg-orange-50 border-l-4 border-orange-500 p-6 rounded-r-lg mb-8">
                    <div class="flex items-start gap-4">
                        <div class="text-orange-500 text-3xl">
                            <i class="fas fa-fire"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-800 mb-2 text-lg">Étape en cours</h3>
                            <p class="text-gray-700" id="currentStepText">Préparation des ingrédients</p>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-800" id="stepTimer">05:00</div>
                            <button onclick="pauseTimer()" class="text-sm text-orange-600 hover:text-orange-700">
                                <i class="fas fa-pause"></i> Pause
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Ingredients Check -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold mb-4">Ingrédients nécessaires</h3>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($recipe->ingredients as $ingredient)
                        <div class="flex items-center">
                            <input type="checkbox" class="mr-3">
                            <span>{{ $ingredient->quantity }} {{ $ingredient->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Steps Navigation -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold mb-4">Étapes</h3>
                    <div class="space-y-4">
                        @foreach($recipe->etapes as $step)
                        <div class="flex items-center gap-4 p-4 bg-white rounded-lg border hover:border-orange-300 cursor-pointer"
                             onclick="setCurrentStep({{ $step->order }})">
                            <div class="w-8 h-8 bg-orange-100 text-orange-600 rounded-full flex items-center justify-center font-bold">
                                {{ $step->order }}
                            </div>
                            <div class="flex-1">
                                <p class="text-gray-700 line-clamp-2">{{ $step->content }}</p>
                            </div>
                            <div class="text-orange-500">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Controls -->
        <div class="border-t bg-white p-4">
            <div class="max-w-3xl mx-auto flex justify-between items-center">
                <button onclick="previousStep()" class="px-6 py-3 border border-gray-300 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-chevron-left mr-2"></i>Précédent
                </button>
                <div class="flex items-center gap-4">
                    <button onclick="pauseTimer()" class="px-6 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                        <i class="fas fa-pause mr-2"></i>Pause
                    </button>
                    <button onclick="nextStep()" class="px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600">
                        Suivant<i class="fas fa-chevron-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variables globales
        let currentpersonnes = {{ $recipe->personnes }};
        let baseIngredients = @json($recipe->ingredients->map(function($ing) {
            return ['quantity' => $ing->quantity, 'name' => $ing->name];
        }));
        let activeTimers = {};
        let userRating = 0;

        // Ajuster les portions
        function adjustServings(change) {
            const newServings = currentServings + change;
            if (newServings < 1 || newServings > 20) return;
            
            currentServings = newServings;
            document.getElementById('servingCount').textContent = newServings;
            updateIngredientsQuantities();
        }

        // Mettre à jour les quantités des ingrédients
        function updateIngredientsQuantities() {
            const ratio = currentServings / {{ $recipe->personnes }};
            
            baseIngredients.forEach((ingredient, index) => {
                const quantitySpan = document.querySelector(`#ingredientsList .flex:nth-child(${index + 1}) .font-medium`);
                if (quantitySpan && ingredient.quantity) {
                    const originalQty = parseFloat(ingredient.quantity) || 1;
                    const newQty = Math.round(originalQty * ratio * 10) / 10;
                    quantitySpan.textContent = newQty + (ingredient.quantity.replace(/[0-9.,]/g, '') || '');
                }
            });
        }

        // Gestion des favoris
        function toggleFavorite() {
            const btn = document.getElementById('favoriteBtn');
            const icon = btn.querySelector('i');
            
            if (icon.classList.contains('text-gray-400')) {
                icon.classList.remove('text-gray-400');
                icon.classList.add('text-red-500');
                btn.classList.add('active');
                
                // Envoyer la requête AJAX
                fetch('/api/recettes/{{ $recipe->id }}/favori', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                });
            } else {
                icon.classList.remove('text-red-500');
                icon.classList.add('text-gray-400');
                btn.classList.remove('active');
                
                // Envoyer la requête AJAX pour retirer
                fetch('/api/recettes/{{ $recipe->id }}/favori', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                });
            }
        }

        // Partager la recette
        function shareRecipe() {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $recipe->title }}',
                    text: 'Découvrez cette délicieuse recette !',
                    url: window.location.href
                });
            } else {
                // Fallback pour les navigateurs qui ne supportent pas l'API Share
                navigator.clipboard.writeText(window.location.href);
                alert('Lien copié dans le presse-papier !');
            }
        }

        // Gestion des minuteurs
        function startTimer(type, minutes) {
            if (activeTimers[type]) {
                clearInterval(activeTimers[type]);
                delete activeTimers[type];
            }
            
            let seconds = minutes * 60;
            const timerElement = document.getElementById(type + 'Timer');
            const progressElement = document.getElementById(type + 'Progress');
            
            activeTimers[type] = setInterval(() => {
                seconds--;
                const mins = Math.floor(seconds / 60);
                const secs = seconds % 60;
                
                timerElement.textContent = `${mins}:${secs < 10 ? '0' : ''}${secs}`;
                progressElement.style.width = `${100 - (seconds / (minutes * 60) * 100)}%`;
                
                if (seconds <= 0) {
                    clearInterval(activeTimers[type]);
                    delete activeTimers[type];
                    
                    // Notification sonore (si supporté)
                    if ('Notification' in window && Notification.permission === 'granted') {
                        new Notification('Timer terminé !', {
                            body: `Le timer ${type === 'prep' ? 'de préparation' : 'de cuisson'} est terminé.`,
                            icon: '/icon.png'
                        });
                    }
                    
                }
            }, 1000);
        }

        // Gestion des ingrédients
        function checkAllIngredients() {
            const checkboxes = document.querySelectorAll('.ingredient-checkbox');
            const allChecked = Array.from(checkboxes).every(cb => cb.checked);
            
            checkboxes.forEach(cb => {
                cb.checked = !allChecked;
                cb.dispatchEvent(new Event('change'));
            });
        }

        function updateShoppingList(checkbox, ingredientId) {
            // Implémentez la logique pour mettre à jour la liste de courses
            console.log('Ingrédient', ingredientId, 'coché:', checkbox.checked);
        }

        function addToShoppingList(ingredientId) {
            // Implémentez la logique pour ajouter à la liste de courses
            console.log('Ajouter l\'ingrédient', ingredientId, 'à la liste de courses');
        }

        function addAllToShoppingList() {
            // Implémentez la logique pour ajouter tous les ingrédients
            console.log('Ajouter tous les ingrédients à la liste de courses');
        }

        // Mode cuisson
        function toggleCookingMode() {
            const mode = document.getElementById('cookingMode');
            mode.classList.toggle('active');
            
            if (mode.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }

        function setCurrentStep(stepNumber) {
            // Implémentez la logique pour définir l'étape en cours
            console.log('Définir l\'étape', stepNumber, 'comme étape en cours');
        }

        function nextStep() {
            // Implémentez la logique pour passer à l'étape suivante
            console.log('Passer à l\'étape suivante');
        }

        function previousStep() {
            // Implémentez la logique pour passer à l'étape précédente
            console.log('Passer à l\'étape précédente');
        }

        function pauseTimer() {
            // Implémentez la logique pour mettre en pause le timer
            console.log('Mettre en pause le timer');
        }

        // Gestion des commentaires
        function setRating(rating) {
            userRating = rating;
            const stars = document.querySelectorAll('#ratingStars i');
            stars.forEach((star, index) => {
                star.classList.toggle('text-yellow-400', index < rating);
                star.classList.toggle('text-gray-300', index >= rating);
            });
        }

        function addComment() {
            const comment = document.getElementById('commentInput').value;
            if (!comment.trim()) {
                alert('Veuillez saisir un commentaire');
                return;
            }
            
            // Implémentez la logique pour ajouter le commentaire
            console.log('Ajouter le commentaire:', comment, 'avec la note:', userRating);
        }

        // Navigation mobile
        function scrollToIngredients() {
            document.querySelector('.ingredient-section').scrollIntoView({ behavior: 'smooth' });
        }

        function scrollToSteps() {
            document.querySelector('.bg-white.rounded-2xl.shadow-lg.p-8').scrollIntoView({ behavior: 'smooth' });
        }

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Gestion des images
        function openImageModal(src) {
            document.getElementById('modalImage').src = src;
            document.getElementById('imageModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            document.getElementById('imageModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        // Scroll to top button
        window.addEventListener('scroll', () => {
            const scrollTop = document.querySelector('.scroll-top');
            if (window.scrollY > 300) {
                scrollTop.classList.add('visible');
            } else {
                scrollTop.classList.remove('visible');
            }
        });

        // Initialisation
        document.addEventListener('DOMContentLoaded', () => {
            // Vérifier si la recette est dans les favoris
            // Vous pouvez ajouter une vérification AJAX ici
            
            // Initialiser les étoiles de notation
            setRating(0);
            
            // Fermer le modal image en cliquant en dehors
            document.getElementById('imageModal').addEventListener('click', (e) => {
                if (e.target.id === 'imageModal') {
                    closeImageModal();
                }
            });
            
            // Empêcher la fermeture du modal en cliquant sur l'image
            document.getElementById('modalImage').addEventListener('click', (e) => {
                e.stopPropagation();
            });
        });
    </script>
</body>
</html>