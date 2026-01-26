<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Recettes et Ingrédients - Découvrez nos délicieuses recettes</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-white dark:bg-slate-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-slate-800 shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-orange-600 dark:text-orange-400">🍳 Recettes et Ingrédients</h1>
                    </div>
                    <div class="flex items-center gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-orange-600 dark:hover:text-orange-400 transition">
                                Connexion
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition">
                                    S'inscrire
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <section class="bg-gradient-to-r from-orange-50 to-amber-50 dark:from-slate-800 dark:to-slate-700 py-20 px-4">
            <div class="max-w-7xl mx-auto text-center">
                <h2 class="text-5xl md:text-6xl font-bold mb-6 text-gray-900 dark:text-white">
                    Découvrez des délicieuses recettes
                </h2>
                <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-8">
                    Explorez notre collection de recettes savoureuses et apprenez à cuisiner les meilleurs plats avec des ingrédients frais
                </p>
                @guest
                    <div class="flex gap-4 justify-center">
                        <a href="{{ route('login') }}" class="px-8 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition text-lg font-semibold">
                            Commencer
                        </a>
                        <a href="{{ route('register') }}" class="px-8 py-3 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition text-lg font-semibold">
                            Créer un compte
                        </a>
                    </div>
                @else
                    <div class="flex gap-4 justify-center">
                        <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition text-lg font-semibold">
                            Voir les recettes
                        </a>
                    </div>
                @endguest
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-20 px-4">
            <div class="max-w-7xl mx-auto">
                <h3 class="text-4xl font-bold text-center mb-16">Pourquoi nous choisir ?</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="p-8 bg-gray-50 dark:bg-slate-800 rounded-xl hover:shadow-lg transition">
                        <div class="text-4xl mb-4">🥘</div>
                        <h4 class="text-2xl font-bold mb-3">Recettes Variées</h4>
                        <p class="text-gray-600 dark:text-gray-400">
                            Des centaines de recettes du monde entier pour tous les goûts et niveaux de compétence culinaire.
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="p-8 bg-gray-50 dark:bg-slate-800 rounded-xl hover:shadow-lg transition">
                        <div class="text-4xl mb-4">🥕</div>
                        <h4 class="text-2xl font-bold mb-3">Ingrédients Frais</h4>
                        <p class="text-gray-600 dark:text-gray-400">
                            Découvrez les meilleurs ingrédients et où les trouver pour réussir vos plats à chaque fois.
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="p-8 bg-gray-50 dark:bg-slate-800 rounded-xl hover:shadow-lg transition">
                        <div class="text-4xl mb-4">👨‍🍳</div>
                        <h4 class="text-2xl font-bold mb-3">Tutoriels Étape par Étape</h4>
                        <p class="text-gray-600 dark:text-gray-400">
                            Chaque recette est accompagnée d'instructions détaillées et faciles à suivre pour une cuisine réussie.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Recipes Section -->
        <section class="py-20 px-4 bg-gray-50 dark:bg-slate-800">
            <div class="max-w-7xl mx-auto">
                <h3 class="text-4xl font-bold text-center mb-16">Recettes Populaires</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Recipe Card 1 -->
                    <div class="bg-white dark:bg-slate-700 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition">
                        <div class="bg-gradient-to-r from-orange-400 to-red-400 h-48"></div>
                        <div class="p-6">
                            <h4 class="text-2xl font-bold mb-2">Pâtes Carbonara</h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                Un classique italien savoureux et facile à préparer en moins de 30 minutes.
                            </p>
                            <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                <span>⏱️ 30 min</span>
                                <span>👥 4 portions</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recipe Card 2 -->
                    <div class="bg-white dark:bg-slate-700 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition">
                        <div class="bg-gradient-to-r from-green-400 to-teal-400 h-48"></div>
                        <div class="p-6">
                            <h4 class="text-2xl font-bold mb-2">Salade Niçoise</h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                Une salade fraîche et nutritive, parfaite pour l'été et les repas légers.
                            </p>
                            <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                <span>⏱️ 20 min</span>
                                <span>👥 6 portions</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recipe Card 3 -->
                    <div class="bg-white dark:bg-slate-700 rounded-xl overflow-hidden shadow-md hover:shadow-xl transition">
                        <div class="bg-gradient-to-r from-yellow-400 to-orange-400 h-48"></div>
                        <div class="p-6">
                            <h4 class="text-2xl font-bold mb-2">Coq au Vin</h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                Un plat savoureux et réconfortant, parfait pour les repas en famille.
                            </p>
                            <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                <span>⏱️ 90 min</span>
                                <span>👥 6 portions</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-20 px-4 bg-orange-600 dark:bg-orange-700 text-white">
            <div class="max-w-7xl mx-auto text-center">
                <h3 class="text-4xl font-bold mb-6">Prêt à commencer votre aventure culinaire ?</h3>
                <p class="text-xl mb-8 text-orange-100">
                    Rejoignez notre communauté de cuisiniers passionnés et partagez vos recettes préférées.
                </p>
                @guest
                    <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-orange-600 font-bold rounded-lg hover:bg-gray-100 transition text-lg">
                        Créer un compte gratuit
                    </a>
                @else
                    <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-white text-orange-600 font-bold rounded-lg hover:bg-gray-100 transition text-lg">
                        Aller au tableau de bord
                    </a>
                @endguest
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 dark:bg-gray-950 text-gray-300 py-12 px-4 mt-auto">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <h5 class="text-lg font-bold text-white mb-4">Recettes et Ingrédients</h5>
                        <p class="text-gray-400">Votre guide complet pour cuisiner comme un professionnel.</p>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold text-white mb-4">Navigation</h5>
                        <ul class="space-y-2">
                            <li><a href="#" class="hover:text-white transition">Accueil</a></li>
                            <li><a href="#" class="hover:text-white transition">Recettes</a></li>
                            <li><a href="#" class="hover:text-white transition">Ingrédients</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold text-white mb-4">Légal</h5>
                        <ul class="space-y-2">
                            <li><a href="#" class="hover:text-white transition">Politique de confidentialité</a></li>
                            <li><a href="#" class="hover:text-white transition">Conditions d'utilisation</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold text-white mb-4">Contact</h5>
                        <p class="text-gray-400">Email: info@recetteset ingrédients.com</p>
                    </div>
                </div>
                <div class="border-t border-gray-700 pt-8 text-center text-gray-400">
                    <p>&copy; 2026 Recettes et Ingrédients. Tous droits réservés.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
