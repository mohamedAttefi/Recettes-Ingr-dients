<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - Recettes et Ingrédients</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff4757 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.3;
            z-index: -1;
        }
        
        .glass {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
        
        .glass-dark {
            backdrop-filter: blur(15px);
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .form-focus:focus {
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.3);
            border-color: #ff6b35;
            transform: translateY(-2px);
        }
        
        .btn-glow {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
            transition: all 0.3s ease;
        }
        
        .btn-glow:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.6);
        }
        
        .floating-icon {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .social-btn {
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body class="text-white">
    <!-- Background decorative elements -->
    <div class="absolute top-10 left-10 floating-icon text-5xl opacity-20">🥘</div>
    <div class="absolute bottom-10 right-10 floating-icon text-6xl opacity-20" style="animation-delay: 2s">🍳</div>
    <div class="absolute top-1/3 right-20 floating-icon text-4xl opacity-20" style="animation-delay: 4s">🧑‍🍳</div>
    <div class="absolute bottom-1/3 left-20 floating-icon text-5xl opacity-20" style="animation-delay: 1s">🥗</div>
    
    <div class="container mx-auto px-4 py-8 flex flex-col items-center justify-center min-h-screen">
        <div class="max-w-md w-full mb-8">
            <div class="text-center" data-aos="fade-down">
                <h1 class="text-5xl font-bold mb-2 font-['Poppins']">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-orange-200 to-yellow-200">Recettes et Ingrédients</span>
                </h1>
                <p class="text-lg text-orange-100">Découvrez, partagez, savourez</p>
            </div>
        </div>
        
        <div class="max-w-md w-full glass rounded-3xl p-10" data-aos="zoom-in" data-aos-delay="200">
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full glass-dark mb-4 pulse">
                    <i class="fas fa-utensils text-3xl text-orange-300"></i>
                </div>
                <h2 class="text-3xl font-bold text-white mb-2 font-['Poppins']">Connexion</h2>
                <p class="text-gray-200">Accédez à votre espace personnel</p>
            </div>
            
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div data-aos="fade-right" data-aos-delay="300">
                    <label class="block text-sm font-medium text-gray-200 mb-2">
                        <i class="fas fa-envelope mr-2 text-orange-300"></i>Adresse Email
                    </label>
                    <div class="relative">
                        <input type="email" name="email" required 
                               class="w-full pl-12 pr-4 py-4 border border-gray-600 rounded-xl bg-slate-800/70 text-white form-focus transition placeholder-gray-400" 
                               placeholder="votre@email.com"
                               value="{{ old('email') }}">
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-user-circle"></i>
                        </div>
                    </div>
                    @error('email')
                        <div class="flex items-center mt-2 text-red-300 text-sm">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                
                <div data-aos="fade-left" data-aos-delay="400">
                    <label class="block text-sm font-medium text-gray-200 mb-2">
                        <i class="fas fa-lock mr-2 text-orange-300"></i>Mot de passe
                    </label>
                    <div class="relative">
                        <input type="password" name="password" required 
                               class="w-full pl-12 pr-12 py-4 border border-gray-600 rounded-xl bg-slate-800/70 text-white form-focus transition placeholder-gray-400" 
                               placeholder="••••••••"
                               id="password-input">
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-key"></i>
                        </div>
                        <button type="button" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-orange-300" id="toggle-password">
                            <i class="fas fa-eye" id="toggle-icon"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="flex items-center mt-2 text-red-300 text-sm">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                
                <div class="flex items-center justify-between" data-aos="fade-up" data-aos-delay="500">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="rounded border-gray-600 text-orange-600 focus:ring-orange-500 focus:ring-2">
                        <label for="remember" class="ml-2 text-sm text-gray-200">Se souvenir de moi</label>
                    </div>
                    <div>
                        <a href="#" class="text-sm text-orange-300 hover:text-orange-200 hover:underline">Mot de passe oublié?</a>
                    </div>
                </div>
                
                <button type="submit" class="w-full btn-glow text-white font-bold py-4 px-4 rounded-xl transition duration-300 mt-2" data-aos="zoom-in" data-aos-delay="600">
                    <i class="fas fa-sign-in-alt mr-2"></i>Se connecter
                </button>
                
                <!-- Social login options -->
                
            </form>
            
            <div class="mt-10 text-center">
                <p class="text-gray-200">Vous n'avez pas de compte?
                    <a href="{{ route('register') }}" class="text-orange-300 font-semibold hover:text-orange-200 hover:underline ml-1">
                        S'inscrire maintenant
                    </a>
                </p>
            </div>
            
            <div class="mt-6 text-center">
                <a href="/" class="inline-flex items-center text-gray-200 hover:text-orange-300 transition">
                    <i class="fas fa-arrow-left mr-2"></i> Retour à l'accueil
                </a>
            </div>
        </div>
        
        <div class="mt-8 text-center text-gray-200 text-sm">
            <p>© 2023 Recettes et Ingrédients. Tous droits réservés.</p>
        </div>
    </div>
    
    <script>
        // Initialize AOS animations
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });
        
        // Toggle password visibility
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordInput = document.getElementById('password-input');
            const toggleIcon = document.getElementById('toggle-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });
        
        // Add form submission animation
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitBtn = document.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Connexion en cours...';
            submitBtn.disabled = true;
        });
        
        // Add input focus effects
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-orange-500/30');
                this.parentElement.classList.remove('ring-0');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-orange-500/30');
            });
        });
    </script>
</body>
</html>