<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Recettes et Ingrédients - L'Art de Cuisiner</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            body { font-family: 'Instrument Sans', sans-serif; }
            .recipe-card:hover .recipe-image { transform: scale(1.05); }
        </style>
    </head>
    <body class="bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 min-h-screen flex flex-col">
        
        <nav class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <div class="flex items-center gap-2">
                        <span class="text-3xl">🍳</span>
                        <h1 class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-orange-600 to-amber-500 bg-clip-text text-transparent">
                            Recettes&Ingrédients
                        </h1>
                    </div>
                    <div class="flex items-center gap-6">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-5 py-2.5 bg-orange-600 text-white font-medium rounded-full hover:bg-orange-700 shadow-lg shadow-orange-200 dark:shadow-none transition-all active:scale-95">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold hover:text-orange-600 transition">Connexion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-5 py-2.5 bg-slate-900 dark:bg-orange-600 text-white font-medium rounded-full hover:bg-slate-800 dark:hover:bg-orange-700 transition-all active:scale-95">
                                    S'inscrire
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <section class="relative overflow-hidden py-24 px-4">
            <div class="absolute inset-0 -z-10 bg-[radial-gradient(45%_45%_at_50%_50%,rgba(251,146,60,0.1)_0%,rgba(255,255,255,0)_100%)]"></div>
            <div class="max-w-4xl mx-auto text-center">
                <span class="inline-block px-4 py-1.5 mb-6 text-sm font-semibold tracking-wide text-orange-700 bg-orange-100 rounded-full dark:bg-orange-900/30 dark:text-orange-400">
                    ✨ Plus de 500 nouvelles recettes ce mois-ci
                </span>
                <h2 class="text-5xl md:text-7xl font-black mb-8 leading-[1.1] tracking-tight">
                    Cuisinez comme un <span class="text-orange-600">Chef</span> chez vous.
                </h2>
                <p class="text-lg md:text-xl text-slate-600 dark:text-slate-400 mb-10 max-w-2xl mx-auto leading-relaxed">
                    Découvrez des ingrédients d'exception et des techniques professionnelles simplifiées pour vos repas quotidiens.
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="#popular" class="px-8 py-4 bg-orange-600 text-white rounded-2xl hover:bg-orange-700 transition-all shadow-xl shadow-orange-200 dark:shadow-none font-bold text-lg">
                        Explorer les recettes
                    </a>
                    <button class="px-8 py-4 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-700 transition-all font-bold text-lg">
                        Comment ça marche ?
                    </button>
                </div>
            </div>
        </section>

        <section class="py-24 px-4 bg-white dark:bg-slate-900/50">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="group">
                        <div class="w-14 h-14 bg-orange-100 dark:bg-orange-900/30 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:rotate-12 transition-transform">🥘</div>
                        <h4 class="text-xl font-bold mb-3">Recettes Variées</h4>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed">Des centaines de recettes du monde entier pour tous les niveaux de compétence.</p>
                    </div>
                    <div class="group">
                        <div class="w-14 h-14 bg-emerald-100 dark:bg-emerald-900/30 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:rotate-12 transition-transform">🥕</div>
                        <h4 class="text-xl font-bold mb-3">Ingrédients Frais</h4>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed">Apprenez à choisir les meilleurs produits de saison chez vos producteurs locaux.</p>
                    </div>
                    <div class="group">
                        <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/30 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:rotate-12 transition-transform">👨‍🍳</div>
                        <h4 class="text-xl font-bold mb-3">Expertise Pro</h4>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed">Chaque étape est validée par des chefs pour garantir votre succès en cuisine.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="popular" class="py-24 px-4">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between items-end mb-12">
                    <div>
                        <h3 class="text-3xl font-bold mb-2">Recettes Populaires</h3>
                        <p class="text-slate-500">Les préférées de la communauté cette semaine</p>
                    </div>
                    <a href="#" class="text-orange-600 font-bold hover:underline">Voir tout →</a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="recipe-card group bg-white dark:bg-slate-800 rounded-3xl overflow-hidden border border-slate-100 dark:border-slate-700 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="relative h-64 overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10"></div>
                            <div class="recipe-image absolute inset-0 bg-[url('https://images.unsplash.com/photo-1633337474564-1d9478ca4e2e?auto=format&fit=crop&w=800')] bg-cover bg-center transition-transform duration-500"></div>
                            <span class="absolute top-4 left-4 z-20 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-slate-900">Italien</span>
                        </div>
                        <div class="p-8">
                            <h4 class="text-2xl font-bold mb-3 group-hover:text-orange-600 transition-colors">Pâtes Carbonara</h4>
                            <p class="text-slate-600 dark:text-slate-400 mb-6 line-clamp-2">L'authentique recette romaine sans crème, avec du guanciale et du pecorino.</p>
                            <div class="flex items-center justify-between text-sm font-medium text-slate-500">
                                <div class="flex gap-4">
                                    <span class="flex items-center gap-1">⏱️ 20m</span>
                                    <span class="flex items-center gap-1">🔥 Facile</span>
                                </div>
                                <button class="text-orange-600 hover:scale-110 transition-transform text-xl">❤️</button>
                            </div>
                        </div>
                    </div>
                    
                    </div>
            </div>
        </section>

        <footer class="bg-slate-900 text-slate-400 py-16 px-4">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 border-b border-slate-800 pb-12">
                <div class="col-span-1 md:col-span-1">
                    <h5 class="text-white font-bold text-lg mb-6 text-orange-500">Recettes&Ingrédients</h5>
                    <p class="leading-relaxed">Inspirer les cuisiniers amateurs à créer des moments inoubliables autour de la table.</p>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-6">Menu</h5>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#" class="hover:text-orange-500 transition">Toutes les recettes</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Planning repas</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">Ingrédients de saison</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-6">Légal</h5>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#" class="hover:text-orange-500 transition">Confidentialité</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition">CGU</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-bold mb-6">Newsletter</h5>
                    <div class="flex gap-2">
                        <input type="email" placeholder="Votre email" class="bg-slate-800 border-none rounded-lg px-4 py-2 w-full focus:ring-2 focus:ring-orange-500">
                        <button class="bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition">OK</button>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto pt-8 text-center text-sm">
                <p>&copy; 2026 Recettes et Ingrédients. Fait avec passion pour les gourmets.</p>
            </div>
        </footer>
    </body>
</html>