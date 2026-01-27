<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>S'inscrire - Recettes et Ingrédients</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
    <style>
        /* Extraordinary Custom Styles */
        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        .hero-bg {
            background: linear-gradient(135deg, #ff6b35, #f7931e, #ff4757);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .glassmorphism {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .neon-glow {
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.5), 0 0 40px rgba(255, 107, 53, 0.3);
        }
        .form-glow:focus {
            box-shadow: 0 0 10px rgba(255, 107, 53, 0.8);
            border-color: #ff6b35;
        }
        .typing {
            overflow: hidden;
            border-right: 2px solid;
            white-space: nowrap;
            animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
        }
        @keyframes typing {
            from { width: 0; }
            to { width: 100%; }
        }
        @keyframes blink-caret {
            from, to { border-color: transparent; }
            50% { border-color: currentColor; }
        }
        .pulse-btn {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
</head>
<body class="bg-gray-900 text-white min-h-screen relative">
    <!-- Animated Particles Background -->
    <div id="particles-js"></div>

    <!-- Hero Section -->
    <section class="hero-bg min-h-screen flex items-center justify-center relative overflow-hidden">
        <div class="text-center z-10" data-aos="fade-up">
            <h1 class="text-5xl font-extrabold mb-4 text-white">
                🍳 <span class="typing">Recettes et Ingrédients</span>
            </h1>
            <h2 class="text-3xl font-bold text-orange-200 mb-8">
                Rejoignez Notre Communauté Culinaire
            </h2>
            <p class="text-lg text-orange-100 max-w-lg mx-auto mb-10">
                Créez votre compte et commencez à explorer un monde de saveurs extraordinaires.
            </p>
        </div>
        <!-- Floating Elements -->
        <div class="absolute top-20 left-10 floating">
            <span class="text-4xl">🥕</span>
        </div>
        <div class="absolute bottom-20 right-10 floating" style="animation-delay: 2s;">
            <span class="text-4xl">🍲</span>
        </div>
        <div class="absolute top-1/2 left-1/4 floating" style="animation-delay: 4s;">
            <span class="text-4xl">🧄</span>
        </div>
    </section>

    <!-- Registration Form -->
    <div class="min-h-screen flex items-center justify-center px-4 py-20 relative">
        <div class="max-w-md w-full glassmorphism rounded-3xl shadow-2xl p-10 border border-white/20" data-aos="zoom-in" data-aos-delay="300">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-white mb-2">S'inscrire</h2>
                <p class="text-gray-300">Remplissez le formulaire pour commencer votre aventure.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div data-aos="fade-right" data-aos-delay="400">
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                        Nom complet
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        required
                        class="w-full px-4 py-3 border border-gray-600 rounded-lg bg-slate-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent form-glow transition duration-300"
                        placeholder="Jean Dupont"
                    >
                    @error('name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div data-aos="fade-left" data-aos-delay="500">
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        Adresse Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                        class="w-full px-4 py-3 border border-gray-600 rounded-lg bg-slate-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent form-glow transition duration-300"
                        placeholder="votre@email.com"
                    >
                    @error('email')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div data-aos="fade-right" data-aos-delay="600">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                        Mot de passe
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="w-full px-4 py-3 border border-gray-600 rounded-lg bg-slate-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent form-glow transition duration-300"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div data-aos="fade-left" data-aos-delay="700">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">
                        Confirmer le mot de passe
                    </label>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        required
                        class="w-full px-4 py-3 border border-gray-600 rounded-lg bg-slate-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent form-glow transition duration-300"
                        placeholder="••••••••"
                    >
                    @error('password_confirmation')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300 shadow-lg neon-glow pulse-btn"
                    data-aos="zoom-in" data-aos-delay="800"
                >
                    S'inscrire Maintenant
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center" data-aos="fade-up" data-aos-delay="900">
                <p class="text-gray-400">
                    Vous avez déjà un compte?
                    <a href="{{ route('login') }}" class="text-orange-400 hover:text-orange-300 underline font-semibold transition duration-300">
                        Se connecter
                    </a>
                </p>
            </div>

            <!-- Home Link -->
            <div class="mt-4 text-center" data-aos="fade-up" data-aos-delay="1000">
                <a href="/" class="text-gray-400 hover:text-orange-400 transition duration-300 flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>

    <script>
        // Initialize AOS
        AOS.init();

        // Particles.js Configuration
        particlesJS('particles-js', {
            particles: {
                number: { value: 60, density: { enable: true, value_area: 800 } },
                color: { value: '#ff6b35' },
                shape: { type: 'circle' },
                opacity: { value: 0.5, random: true },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#ff6b35', opacity: 0.4, width: 1 },
                move: { enable: true, speed: 4, direction: 'none', random: true, straight: false, out_mode: 'out', bounce: false }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' } },
                modes: { repulse: { distance: 200, duration: 0.4 }, push: { particles_nb: 4 } }
            },
            retina_detect: true
        });
    </script>
</body>
</html>