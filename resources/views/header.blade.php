<style>
    .glassmorphism {
        backdrop-filter: blur(15px);
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.12);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
    }

    .dark-glassmorphism {
        backdrop-filter: blur(15px);
        background: rgba(15, 23, 42);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .sidebar-item {
        transition: all 0.3s ease;
    }

    .sidebar-item:hover {
        transform: translateX(10px);
        background: rgba(255, 107, 53, 0.1);
    }
</style>
<div class="fixed left-0 top-0 h-full w-20 lg:w-64 z-40 dark-glassmorphism border-r border-white/10">
    <div class="flex flex-col h-full p-6">
        <!-- Logo -->
        <div class="flex items-center mb-10">
            <div class="floating mr-3">
                <span class="text-3xl"></span>
            </div>
            <h1 class="text-xl lg:text-2xl font-bold text-white hidden lg:block font-['Poppins']">Recettes et Ingrédients</h1>
        </div>

        <!-- Navigation Items -->
        <nav class="flex-1 space-y-4">
            <a href="/dashboard" class="sidebar-item flex items-center p-3 rounded-xl bg-gradient-to-r from-orange-600/30 to-red-600/30 border border-orange-500/30">
                <i class="fas fa-home text-xl lg:text-lg mr-4 text-orange-400"></i>
                <span class="hidden lg:block font-medium">Tableau de Bord</span>
            </a>

            <a href="{{ route("myRecipe") }}" class="sidebar-item flex items-center p-3 rounded-xl hover:bg-white/5">
                <i class="fas fa-book text-xl lg:text-lg mr-4 text-green-400"></i>
                <span class="hidden lg:block">Mes Recettes</span>
            </a>

            <a href="{{ route("allRecipes") }}" class="sidebar-item flex items-center p-3 rounded-xl hover:bg-white/5">
                <i class="fas fa-carrot text-xl lg:text-lg mr-4 text-blue-400"></i>
                <span class="hidden lg:block">Tout les recettes</span>
            </a>

            <a href="#" class="sidebar-item flex items-center p-3 rounded-xl hover:bg-white/5">
                <i class="fas fa-heart text-xl lg:text-lg mr-4 text-pink-400"></i>
                <span class="hidden lg:block">Favoris</span>
            </a>

            <a href="#" class="sidebar-item flex items-center p-3 rounded-xl hover:bg-white/5">
                <i class="fas fa-chart-bar text-xl lg:text-lg mr-4 text-yellow-400"></i>
                <span class="hidden lg:block">Statistiques</span>
            </a>

            <a href="#" class="sidebar-item flex items-center p-3 rounded-xl hover:bg-white/5">
                <i class="fas fa-cog text-xl lg:text-lg mr-4 text-gray-400"></i>
                <span class="hidden lg:block">Paramètres</span>
            </a>
        </nav>
        <!-- User Profile -->
        <div class="mt-auto pt-6 border-t border-white/10">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-orange-500 to-red-500 flex items-center justify-center">
                    <span class="font-bold text-white">{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</span>
                </div>
                <div class="ml-3 hidden lg:block">
                    <p class="font-semibold text-white">{{ Auth::user()->name ?? 'Utilisateur' }}</p>
                    <p class="text-xs text-gray-400">Cuisinier passionné</p>
                </div>
            </div>
        </div>
    </div>
</div>