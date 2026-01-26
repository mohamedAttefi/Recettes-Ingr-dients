<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Recettes et Ingrédients</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 dark:bg-slate-900">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-slate-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <h1 class="text-2xl font-bold text-orange-600 dark:text-orange-400">🍳 Recettes et Ingrédients</h1>
                <div class="flex items-center gap-4">
                    <span class="text-gray-600 dark:text-gray-400">{{ Auth::user()->name ?? 'User' }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-lg p-8">
            <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Bienvenue dans votre tableau de bord!
            </h2>
            <p class="text-gray-600 dark:text-gray-400 text-lg">
                Cette section est en cours de développement. Bientôt, vous pourrez consulter et créer des recettes.
            </p>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gradient-to-r from-orange-400 to-red-400 text-white p-6 rounded-lg">
                    <h3 class="text-2xl font-bold mb-2">Mes Recettes</h3>
                    <p class="text-orange-100">Gérez vos recettes favorites</p>
                </div>
                <div class="bg-gradient-to-r from-green-400 to-teal-400 text-white p-6 rounded-lg">
                    <h3 class="text-2xl font-bold mb-2">Mes Ingrédients</h3>
                    <p class="text-green-100">Consultez vos ingrédients</p>
                </div>
                <div class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white p-6 rounded-lg">
                    <h3 class="text-2xl font-bold mb-2">Profil</h3>
                    <p class="text-yellow-100">Modifiez vos paramètres</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
