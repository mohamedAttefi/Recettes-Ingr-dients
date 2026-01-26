<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - Recettes et Ingrédients</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-orange-50 to-amber-50 dark:from-slate-900 dark:to-slate-800">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full bg-white dark:bg-slate-800 rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-orange-600 dark:text-orange-400 mb-2">🍳 Recettes et Ingrédients</h1>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Connexion</h2>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Adresse Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                        placeholder="votre@email.com"
                    >
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Mot de passe
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-slate-700 dark:text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center">
                    <input
                        type="checkbox"
                        name="remember"
                        id="remember"
                        class="rounded border-gray-300 text-orange-600 focus:ring-orange-500"
                    >
                    <label for="remember" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                        Se souvenir de moi
                    </label>
                </div>
                <button
                    type="submit"
                    class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200"
                >
                    Se connecter
                </button>
            </form>
            <div class="mt-6 text-center">
                <p class="text-gray-600 dark:text-gray-400">
                    Vous n'avez pas de compte?
                    <a href="{{ route('register') }}" class="text-orange-600 dark:text-orange-400 hover:underline font-semibold">
                        S'inscrire
                    </a>
                </p>
            </div>
            <div class="mt-4 text-center">
                <a href="/" class="text-gray-600 dark:text-gray-400 hover:text-orange-600 dark:hover:text-orange-400 transition">
                    ← Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</body>
</html>
