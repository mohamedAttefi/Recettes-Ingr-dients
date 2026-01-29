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
    
    /* Modal Styles */
    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(4px);
        z-index: 9999;
        display: none;
    }
    
    .modal-content {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(15, 23, 42, 0.95);
        border: 1px solid rgba(255, 107, 53, 0.3);
        border-radius: 16px;
        padding: 32px;
        z-index: 10000;
        display: none;
        max-width: 400px;
        width: 90%;
    }
</style>

<div class="fixed left-0 top-0 h-full w-20 lg:w-64 z-40 dark-glassmorphism border-r border-white/10">
    <div class="flex flex-col h-full p-6">
        <!-- Logo -->
        <div class="flex items-center mb-10">
            <div class="floating mr-3">
                <span class="text-3xl">🍳</span>
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
                <span class="hidden lg:block">Toutes les Recettes</span>
            </a>
        </nav>

        <div class="pt-6 border-t border-white/10">
            <div class="flex items-center mb-6">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-orange-500 to-red-500 flex items-center justify-center">
                    <span class="font-bold text-white">{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</span>
                </div>
                <div class="ml-3 hidden lg:block">
                    <p class="font-semibold text-white">{{ Auth::user()->name ?? 'Utilisateur' }}</p>
                    <p class="text-xs text-gray-400">Cuisinier passionné</p>
                </div>
            </div>
            
            <button type="button"
                    onclick="showLogoutConfirmation()"
                    class="sidebar-item flex items-center p-3 rounded-xl hover:bg-red-500/10 text-red-400 hover:text-red-300 w-full">
                <i class="fas fa-sign-out-alt text-xl lg:text-lg mr-4"></i>
                <span class="hidden lg:block font-medium">Déconnexion</span>
            </button>
        </div>
    </div>
</div>

<!-- Logout Confirmation Modal -->
<div id="logoutModalOverlay" class="modal-overlay" onclick="hideLogoutConfirmation()"></div>
<div id="logoutModal" class="modal-content">
    <div class="text-center">
        <div class="w-20 h-20 rounded-full bg-gradient-to-r from-red-500 to-orange-500 flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-sign-out-alt text-2xl text-white"></i>
        </div>
        
        <h3 class="text-xl font-bold text-white mb-2">Confirmer la déconnexion</h3>
        <p class="text-gray-400 mb-6">Êtes-vous sûr de vouloir vous déconnecter ?</p>
        
        <div class="flex gap-4">
            <button onclick="hideLogoutConfirmation()"
                    class="flex-1 py-3 border border-gray-600 text-gray-300 rounded-lg hover:bg-gray-800 transition">
                Annuler
            </button>
            
            <form method="POST" action="" class="flex-1">
                @csrf
                <button type="submit"
                        class="w-full py-3 bg-gradient-to-r from-red-500 to-orange-500 text-white rounded-lg hover:from-red-600 hover:to-orange-600 transition">
                    Déconnexion
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function showLogoutConfirmation() {
        document.getElementById('logoutModalOverlay').style.display = 'block';
        document.getElementById('logoutModal').style.display = 'block';
    }
    
    function hideLogoutConfirmation() {
        document.getElementById('logoutModalOverlay').style.display = 'none';
        document.getElementById('logoutModal').style.display = 'none';
    }
    
    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideLogoutConfirmation();
        }
    });
</script>