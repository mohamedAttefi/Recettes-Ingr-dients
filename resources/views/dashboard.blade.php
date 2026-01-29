<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Recettes et Ingrédients</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            background: #0f172a;
        }
        
        /* Gradient Animation */
        .hero-bg {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 30%, #ff4757 70%, #ff1493 100%);
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Floating Animation */
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        /* 3D Card Effect */
        .card-3d {
            transform-style: preserve-3d;
            perspective: 1000px;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .card-3d:hover {
            transform: translateY(-15px) rotateX(5deg) rotateY(5deg);
            box-shadow: 0 25px 50px -12px rgba(255, 107, 53, 0.4);
        }
        
        /* Glassmorphism */
        .glassmorphism {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.18);
        }
        
        .dark-glassmorphism {
            backdrop-filter: blur(15px);
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        
        /* Neon Glow */
        .neon-glow {
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.4), 
                        0 0 40px rgba(255, 107, 53, 0.2),
                        0 0 80px rgba(255, 107, 53, 0.1);
        }
        
        .neon-glow-green {
            box-shadow: 0 0 20px rgba(72, 187, 120, 0.4), 
                        0 0 40px rgba(72, 187, 120, 0.2);
        }
        
        .neon-glow-blue {
            box-shadow: 0 0 20px rgba(66, 153, 225, 0.4), 
                        0 0 40px rgba(66, 153, 225, 0.2);
        }
        
        /* Typing Animation */
        .typing {
            overflow: hidden;
            border-right: 3px solid;
            white-space: nowrap;
            margin: 0 auto;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }
        
        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        
        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: #ff6b35; }
        }
        
        /* Counter Animation */
        .counter {
            animation: countUp 1.5s ease-out forwards;
            opacity: 0;
        }
        
        @keyframes countUp {
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border-radius: 4px;
        }
        
        /* Sidebar Animation */
        .sidebar-item {
            transition: all 0.3s ease;
        }
        
        .sidebar-item:hover {
            transform: translateX(10px);
            background: rgba(255, 107, 53, 0.1);
        }
        
        /* Progress Bar */
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .progress-fill {
            height: 100%;
            border-radius: 4px;
            background: linear-gradient(90deg, #ff6b35, #f7931e);
            transition: width 1.5s ease-in-out;
        }
        
        /* Notification Bell */
        .notification-bell {
            animation: bellRing 2s ease-in-out infinite;
            transform-origin: top center;
        }
        
        @keyframes bellRing {
            0%, 100% { transform: rotate(0deg); }
            10%, 30%, 50%, 70%, 90% { transform: rotate(-10deg); }
            20%, 40%, 60%, 80% { transform: rotate(10deg); }
        }
        
        /* Particle Container */
        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }
    </style>
</head>
<body class="text-white min-h-screen">
    <!-- Animated Particles Background -->
    <div id="particles-js"></div>
    @include("header")
    <!-- Main Content -->
    <div class="ml-0 lg:ml-64 transition-all duration-300">
        <!-- Top Navigation -->
        <header class="sticky top-0 z-30 glassmorphism">
            <div class="flex justify-between items-center p-6">
                <div class="flex items-center space-x-4">
                    <button id="sidebar-toggle" class="lg:hidden text-2xl">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h2 class="text-2xl font-bold text-white font-['Poppins']">Tableau de Bord</h2>
                </div>
                
                <div class="flex items-center space-x-6">
                    <!-- Search Bar -->
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Rechercher une recette..." class="pl-12 pr-4 py-3 bg-white/10 border border-white/20 rounded-2xl focus:outline-none focus:ring-2 focus:ring-orange-500/50 w-64">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    
                    <!-- Notifications -->
                    <div class="relative">
                        <button class="notification-bell text-2xl text-orange-300">
                            <i class="fas fa-bell"></i>
                        </button>
                        <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full text-xs flex items-center justify-center">3</span>
                    </div>
                    
                    <!-- Logout Button -->
                    
                        @csrf
                        <button type="submit" class="flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-xl hover:from-red-700 hover:to-red-800 transition duration-300 shadow-lg">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="hidden md:inline">Déconnexion</span>
                        </button>
                    
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="hero-bg min-h-[70vh] flex items-center justify-center relative overflow-hidden">
            <div class="container mx-auto px-6 relative z-10">
                <div class="text-center" data-aos="fade-up">
                    <h2 class="text-5xl lg:text-7xl font-extrabold mb-6 typing text-white font-['Poppins']">
                        Bienvenue, {{ Auth::user()->name ?? 'Chef' }} !
                    </h2>
                    <p class="text-xl text-orange-100 max-w-3xl mx-auto mb-10">
                        Prêt à créer des chefs-d'œuvre culinaires ? Explorez vos recettes, gérez vos ingrédients et laissez votre créativité s'exprimer.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <button class="px-8 py-4 bg-white text-orange-600 font-bold rounded-xl hover:bg-orange-50 transition duration-300 shadow-2xl neon-glow flex items-center">
                            <i class="fas fa-plus mr-3"></i>Nouvelle Recette
                        </button>
                        <button class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-xl hover:bg-white/10 transition duration-300 flex items-center">
                            <i class="fas fa-play-circle mr-3"></i>Vidéo Tutoriels
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Floating Elements -->
            <div class="absolute top-20 left-10 floating">
                <span class="text-5xl">🥑</span>
            </div>
            <div class="absolute bottom-20 right-10 floating" style="animation-delay: 2s;">
                <span class="text-5xl">🍅</span>
            </div>
            <div class="absolute top-1/2 left-1/4 floating" style="animation-delay: 1s;">
                <span class="text-5xl">🌶️</span>
            </div>
            <div class="absolute top-1/3 right-1/4 floating" style="animation-delay: 3s;">
                <span class="text-5xl">🧄</span>
            </div>
        </section>

        <!-- Main Dashboard Content -->
        <div class="container mx-auto px-6 py-12">
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12" data-aos="fade-up">
                <div class="dark-glassmorphism p-6 rounded-2xl border border-white/10">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-400 text-sm">Recettes créées</p>
                            <p class="text-3xl font-bold mt-2 text-white">{{ count($recipes) }}</p>
                        </div>
                    </div>
                    <div class="progress-bar mt-4">
                        <div class="progress-fill" style="width: {{ min($recipes->count() * 10, 100) }}%"></div>
                    </div>
                </div>
                
                <div class="dark-glassmorphism p-6 rounded-2xl border border-white/10">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-400 text-sm">Ingrédients disponibles</p>
                            <p class="text-3xl font-bold mt-2 text-white">45</p>
                        </div>

                    </div>
                    <div class="progress-bar mt-4">
                        <div class="progress-fill" style="width: 75%"></div>
                    </div>
                </div>
                
                <div class="dark-glassmorphism p-6 rounded-2xl border border-white/10">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-400 text-sm">Recettes favorites</p>
                            <p class="text-3xl font-bold mt-2 text-white">8</p>
                        </div>

                    </div>
                    <div class="progress-bar mt-4">
                        <div class="progress-fill" style="width: 40%"></div>
                    </div>
                </div>
                
                <div class="dark-glassmorphism p-6 rounded-2xl border border-white/10">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-400 text-sm">Temps de cuisine</p>
                            <p class="text-3xl font-bold mt-2 text-white">36h</p>
                        </div>

                    </div>
                    <div class="progress-bar mt-4">
                        <div class="progress-fill" style="width: 90%"></div>
                    </div>
                </div>
            </div>
            
            <!-- Main Actions Grid -->
            <div class="mb-12">
                <h3 class="text-3xl font-bold text-white mb-8 font-['Poppins']" data-aos="fade-right">Actions Rapides</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Mes Recettes Card -->
                    <div class="card-3d bg-gradient-to-br from-orange-500 via-red-500 to-pink-600 text-white p-8 rounded-2xl cursor-pointer neon-glow" data-aos="flip-left">
                        <div class="flex items-center mb-6">
                            <div class="w-14 h-14 rounded-xl bg-white/20 flex items-center justify-center mr-4">
                                <i class="fas fa-book text-2xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold">Mes Recettes</h4>
                        </div>
                        <p class="text-orange-100 mb-6 text-lg">Gérez vos recettes favorites et créez-en de nouvelles avec créativité.</p>
                        <div class="flex justify-between items-center">
                            <button class="px-6 py-3 bg-white text-orange-600 rounded-xl font-semibold hover:bg-orange-50 transition duration-300">
                                Explorer <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                            <span class="text-sm opacity-80">12 recettes</span>
                        </div>
                    </div>

                    <!-- Mes Ingrédients Card -->
                    <div class="card-3d bg-gradient-to-br from-green-500 via-teal-500 to-blue-600 text-white p-8 rounded-2xl cursor-pointer neon-glow-green" data-aos="flip-left" data-aos-delay="200">
                        <div class="flex items-center mb-6">
                            <div class="w-14 h-14 rounded-xl bg-white/20 flex items-center justify-center mr-4">
                                <i class="fas fa-carrot text-2xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold">Mes Ingrédients</h4>
                        </div>
                        <p class="text-green-100 mb-6 text-lg">Consultez et organisez vos ingrédients disponibles avec précision.</p>
                        <div class="flex justify-between items-center">
                            <button class="px-6 py-3 bg-white text-green-600 rounded-xl font-semibold hover:bg-green-50 transition duration-300">
                                Voir Liste <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                            <span class="text-sm opacity-80">45 ingrédients</span>
                        </div>
                    </div>

                    <!-- Profil Card -->
                    <div class="card-3d bg-gradient-to-br from-yellow-500 via-orange-500 to-red-500 text-white p-8 rounded-2xl cursor-pointer neon-glow" data-aos="flip-left" data-aos-delay="400">
                        <div class="flex items-center mb-6">
                            <div class="w-14 h-14 rounded-xl bg-white/20 flex items-center justify-center mr-4">
                                <i class="fas fa-user-cog text-2xl"></i>
                            </div>
                            <h4 class="text-2xl font-bold">Profil</h4>
                        </div>
                        <p class="text-yellow-100 mb-6 text-lg">Modifiez vos paramètres et préférences pour une expérience personnalisée.</p>
                        <div class="flex justify-between items-center">
                            <button class="px-6 py-3 bg-white text-yellow-600 rounded-xl font-semibold hover:bg-yellow-50 transition duration-300">
                                Modifier <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                            <span class="text-sm opacity-80">Niveau 5</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity & Quick Tips -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <!-- Recent Activity -->
                <div class="dark-glassmorphism rounded-2xl p-8" data-aos="fade-right">
                    <h4 class="text-2xl font-bold text-white mb-6 flex items-center">
                        <i class="fas fa-history mr-3 text-orange-400"></i>Activité Récente
                    </h4>
                    <div class="space-y-6">
                        <div class="flex items-center p-4 rounded-xl bg-white/5">
                            <div class="w-10 h-10 rounded-full bg-orange-500/20 flex items-center justify-center mr-4">
                                <i class="fas fa-plus text-orange-400"></i>
                            </div>
                            <div>
                                <p class="font-medium">Nouvelle recette ajoutée</p>
                                <p class="text-sm text-gray-400">"Ratatouille Provençale" - Il y a 2 heures</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 rounded-xl bg-white/5">
                            <div class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center mr-4">
                                <i class="fas fa-star text-green-400"></i>
                            </div>
                            <div>
                                <p class="font-medium">Recette mise en favoris</p>
                                <p class="text-sm text-gray-400">"Tiramisu Italien" - Il y a 1 jour</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 rounded-xl bg-white/5">
                            <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center mr-4">
                                <i class="fas fa-shopping-cart text-blue-400"></i>
                            </div>
                            <div>
                                <p class="font-medium">Liste de courses mise à jour</p>
                                <p class="text-sm text-gray-400">Ajout de 5 ingrédients - Il y a 2 jours</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Tips -->
                <div class="dark-glassmorphism rounded-2xl p-8" data-aos="fade-left">
                    <h4 class="text-2xl font-bold text-white mb-6 flex items-center">
                        <i class="fas fa-lightbulb mr-3 text-yellow-400"></i>Astuces du Chef
                    </h4>
                    <div class="space-y-6">
                        <div class="p-4 rounded-xl bg-gradient-to-r from-orange-500/10 to-red-500/10 border border-orange-500/20">
                            <p class="font-medium mb-2">🌡️ Température parfaite</p>
                            <p class="text-sm text-gray-300">Laissez votre viande reposer 10 minutes après la cuisson pour préserver ses jus.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-gradient-to-r from-green-500/10 to-teal-500/10 border border-green-500/20">
                            <p class="font-medium mb-2">🧅 Coupe optimale</p>
                            <p class="text-sm text-gray-300">Pour des oignons parfaitement émincés, utilisez un couteau bien aiguisé et humide.</p>
                        </div>
                        <div class="p-4 rounded-xl bg-gradient-to-r from-blue-500/10 to-purple-500/10 border border-blue-500/20">
                            <p class="font-medium mb-2">⏱️ Gestion du temps</p>
                            <p class="text-sm text-gray-300">Préparez tous vos ingrédients avant de commencer la cuisson (mise en place).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <footer class="dark-glassmorphism border-t border-white/10 py-8">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-6 md:mb-0">
                        <div class="flex items-center">
                            <div class="floating mr-3">
                                <span class="text-2xl">🍳</span>
                            </div>
                            <h2 class="text-xl font-bold text-white">Recettes et Ingrédients</h2>
                        </div>
                        <p class="text-gray-400 mt-2">Votre compagnon culinaire ultime</p>
                    </div>
                    
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-pinterest text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="text-center mt-8 pt-8 border-t border-white/10">
                    <p class="text-gray-500">&copy; 2023 Recettes et Ingrédients. Tous droits réservés. Créé avec passion.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });
        
        // Particles.js Configuration
        particlesJS('particles-js', {
            particles: {
                number: { value: 60, density: { enable: true, value_area: 800 } },
                color: { value: '#ff6b35' },
                shape: { type: 'circle' },
                opacity: { value: 0.5, random: true },
                size: { value: 3, random: true },
                line_linked: { 
                    enable: true, 
                    distance: 150, 
                    color: '#ff6b35', 
                    opacity: 0.2, 
                    width: 1 
                },
                move: { 
                    enable: true, 
                    speed: 3, 
                    direction: 'none', 
                    random: true, 
                    straight: false, 
                    out_mode: 'out', 
                    bounce: false 
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { 
                    onhover: { enable: true, mode: 'repulse' }, 
                    onclick: { enable: true, mode: 'push' } 
                },
                modes: { 
                    repulse: { distance: 100, duration: 0.4 }, 
                    push: { particles_nb: 4 } 
                }
            },
            retina_detect: true
        });
        
        // Sidebar Toggle for Mobile
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.fixed');
            const mainContent = document.querySelector('.ml-0');
            
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                mainContent.classList.remove('ml-0');
                mainContent.classList.add('ml-64');
            } else {
                sidebar.classList.add('hidden');
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-0');
            }
        });
        
        // Animated counters for stats
        function animateCounter(element, target) {
            let count = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                count += increment;
                if (count >= target) {
                    element.innerText = target;
                    clearInterval(timer);
                } else {
                    element.innerText = Math.ceil(count);
                }
            }, 20);
        }
        
        // Animate counters when they come into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.innerText);
                    animateCounter(counter, target);
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });
        
        // Observe all counter elements
        document.querySelectorAll('.dark-glassmorphism .text-3xl').forEach(counter => {
            observer.observe(counter);
        });
        
        // Add hover effect to cards
        document.querySelectorAll('.card-3d').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.zIndex = '10';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.zIndex = '1';
            });
        });
    </script>
</body>
</html>