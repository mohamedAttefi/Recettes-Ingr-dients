<nav class="bg-gray-800 border-b border-gray-700 sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-8">
            <h1 class="text-xl font-bold text-orange-500">Chef Dash</h1>
            
            <ul class="hidden lg:flex items-center gap-6 text-sm font-medium text-gray-300">
                <li><a href="/dashboard" class="hover:text-orange-500 transition">Tableau de Bord</a></li>
                <li><a href="/recipes" class="hover:text-orange-500 transition">Recettes</a></li>
                <li><a href="/ingredients" class="hover:text-orange-500 transition">Ingrédients</a></li>
                <li><a href="/favorites" class="hover:text-orange-500 transition">Favoris</a></li>
            </ul>
        </div>

        <div class="flex items-center gap-4">
            <div class="relative hidden md:block">
                <input type="text" placeholder="Rechercher..." class="bg-gray-700 px-4 py-1.5 pl-10 rounded-lg border border-gray-600 focus:outline-none focus:ring-1 focus:ring-orange-500 text-sm">
                <i class="fas fa-search absolute left-3 top-2.5 text-gray-400 text-xs"></i>
            </div>
            
            <button class="text-gray-400 hover:text-white"><i class="fas fa-bell"></i></button>
            <a href="/profile" class="text-gray-400 hover:text-white"><i class="fas fa-user-circle text-xl"></i></a>
            
            <form action="/logout" method="POST" class="inline">
                <button class="bg-red-600/20 text-red-500 border border-red-600/50 px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-red-600 hover:text-white transition">
                    DÉCONNEXION
                </button>
            </form>

            <button class="lg:hidden text-gray-400" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden lg:hidden bg-gray-800 border-t border-gray-700 px-6 py-4">
        <ul class="flex flex-col gap-4 text-sm font-medium text-gray-300">
            <li><a href="/dashboard" class="block hover:text-orange-500">Tableau de Bord</a></li>
            <li><a href="/recipes" class="block hover:text-orange-500">Recettes</a></li>
            <li><a href="/ingredients" class="block hover:text-orange-500">Ingrédients</a></li>
            <li><a href="/favorites" class="block hover:text-orange-500">Favoris</a></li>
        </ul>
    </div>
</nav>