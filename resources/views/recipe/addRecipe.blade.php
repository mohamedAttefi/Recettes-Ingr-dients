<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer une Recette - Recettes et Ingrédients</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --burnt-orange: #E8613C;
            --terracotta: #D84A2E;
            --cream: #FFF8F0;
            --sage: #8B9A7E;
            --charcoal: #2C2C2C;
            --gold: #D4AF37;
            --warm-white: #FDFCFA;
            --soft-gray: #F5F3F0;
            --success-green: #10B981;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--soft-gray);
            color: var(--charcoal);
        }

        /* Sidebar */
        .sidebar {
            background: linear-gradient(180deg, #2C2C2C 0%, #1a1a1a 100%);
            box-shadow: 4px 0 24px rgba(0, 0, 0, 0.12);
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: 280px;
            z-index: 50;
            overflow-y: auto;
        }

        .sidebar-logo {
            padding: 32px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-item {
            position: relative;
            display: flex;
            align-items: center;
            padding: 14px 24px;
            margin: 4px 12px;
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            font-weight: 500;
            font-size: 15px;
        }

        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 0;
            background: var(--burnt-orange);
            border-radius: 0 3px 3px 0;
            transition: height 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .sidebar-item:hover {
            color: white;
            background: rgba(255, 255, 255, 0.05);
            transform: translateX(4px);
        }

        .sidebar-item.active {
            color: var(--burnt-orange);
            background: rgba(232, 97, 60, 0.1);
        }

        .sidebar-item.active::before {
            height: 60%;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: white;
            border-bottom: 1px solid #E8E5E1;
            padding: 24px 40px;
            position: sticky;
            top: 0;
            z-index: 40;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        }

        /* Form Container */
        .form-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px;
        }

        .form-card {
            background: white;
            border-radius: 24px;
            padding: 48px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06);
            margin-bottom: 32px;
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 28px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 15px;
            color: var(--charcoal);
            margin-bottom: 12px;
        }

        .form-label .required {
            color: var(--burnt-orange);
            margin-left: 4px;
        }

        .form-input,
        .form-textarea,
        .form-select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #E8E5E1;
            border-radius: 12px;
            font-size: 15px;
            font-family: 'DM Sans', sans-serif;
            color: var(--charcoal);
            background: var(--warm-white);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--burnt-orange);
            box-shadow: 0 0 0 4px rgba(232, 97, 60, 0.1);
            background: white;
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* Image Upload */
        .image-upload-area {
            border: 2px dashed #D4AF37;
            border-radius: 20px;
            padding: 60px 24px;
            text-align: center;
            background: linear-gradient(135deg, #FFFBF5 0%, #FFF8F0 100%);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .image-upload-area:hover {
            border-color: var(--burnt-orange);
            background: linear-gradient(135deg, #FFF8F0 0%, #FFE8DC 100%);
            transform: translateY(-2px);
        }

        .image-upload-area.dragover {
            border-color: var(--burnt-orange);
            background: linear-gradient(135deg, #FFE8DC 0%, #FFD4C4 100%);
            transform: scale(1.02);
        }

        .upload-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 32px;
        }

        .image-preview {
            display: none;
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            max-height: 400px;
        }

        .image-preview img {
            width: 100%;
            height: auto;
            display: block;
        }

        .image-preview-actions {
            position: absolute;
            top: 16px;
            right: 16px;
            display: flex;
            gap: 8px;
        }

        /* Dynamic Lists */
        .dynamic-list {
            margin-top: 16px;
        }

        .list-item {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
            align-items: flex-start;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .list-item-number {
            width: 36px;
            height: 36px;
            background: var(--soft-gray);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--burnt-orange);
            flex-shrink: 0;
            margin-top: 6px;
        }

        .list-item-inputs {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 12px;
        }

        .remove-btn {
            width: 36px;
            height: 36px;
            background: #FEE2E2;
            color: #DC2626;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            flex-shrink: 0;
            margin-top: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-btn:hover {
            background: #FCA5A5;
            transform: scale(1.05);
        }

        .add-item-btn {
            width: 100%;
            padding: 14px;
            border: 2px dashed #D1D1D1;
            background: transparent;
            color: #666;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 12px;
        }

        .add-item-btn:hover {
            border-color: var(--burnt-orange);
            color: var(--burnt-orange);
            background: rgba(232, 97, 60, 0.05);
        }

        /* Tags Input */
        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 12px;
            border: 2px solid #E8E5E1;
            border-radius: 12px;
            background: var(--warm-white);
            min-height: 52px;
            transition: all 0.3s;
        }

        .tags-container:focus-within {
            border-color: var(--burnt-orange);
            box-shadow: 0 0 0 4px rgba(232, 97, 60, 0.1);
            background: white;
        }

        .tag {
            padding: 8px 16px;
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            animation: tagPop 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes tagPop {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .tag-remove {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            padding: 0;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background 0.2s;
        }

        .tag-remove:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .tag-input {
            border: none;
            outline: none;
            background: transparent;
            flex: 1;
            min-width: 120px;
            font-size: 15px;
            font-family: 'DM Sans', sans-serif;
            padding: 6px;
        }

        /* Difficulty Selector */
        .difficulty-selector {
            display: flex;
            gap: 12px;
        }

        .difficulty-option {
            flex: 1;
            padding: 20px 16px;
            border: 2px solid #E8E5E1;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .difficulty-option:hover {
            border-color: var(--burnt-orange);
            transform: translateY(-2px);
        }

        .difficulty-option.selected {
            border-color: var(--burnt-orange);
            background: rgba(232, 97, 60, 0.05);
        }

        .difficulty-icon {
            font-size: 28px;
        }

        .difficulty-label {
            font-weight: 600;
            font-size: 14px;
        }

        .difficulty-desc {
            font-size: 12px;
            color: #666;
            margin-top: 4px;
        }

        /* Time Inputs */
        .time-inputs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .time-input {
            position: relative;
        }

        .time-input input {
            padding-right: 50px;
        }

        .time-unit {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 14px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 16px;
            justify-content: flex-end;
            padding-top: 32px;
            border-top: 1px solid #E8E5E1;
            margin-top: 32px;
        }

        .btn {
            padding: 16px 32px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(232, 97, 60, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(232, 97, 60, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #666;
            border: 2px solid #E8E5E1;
        }

        .btn-secondary:hover {
            border-color: #999;
            background: #f8f8f8;
        }

        /* Helper Text */
        .helper-text {
            font-size: 13px;
            color: #999;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Success Message */
        .success-message {
            display: none;
            background: linear-gradient(135deg, #10B981 0%, #34D399 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Toast Notification */
        .toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 1000;
            transform: translateX(150%);
            transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--success-green);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 24px 20px;
            }

            .form-card {
                padding: 28px 24px;
            }

            .header {
                padding: 20px;
            }

            .action-buttons {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .difficulty-selector {
                flex-direction: column;
            }

            .time-inputs {
                grid-template-columns: 1fr;
            }

            .list-item-inputs {
                grid-template-columns: 1fr;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #F5F3F0;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--burnt-orange), var(--terracotta));
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-logo">
            <div style="display: flex; align-items: center;">
                <span style="font-size: 32px; margin-right: 12px;">🍳</span>
                <h1 style="font-family: 'Playfair Display', serif; font-size: 20px; font-weight: 700; color: white;">Recettes & Ingrédients</h1>
            </div>
        </div>

        <nav style="padding: 24px 0; flex: 1;">
            <a href="dashboard.html" class="sidebar-item">
                <i class="fas fa-home" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Tableau de Bord</span>
            </a>

            <a href="mes-recettes.html" class="sidebar-item">
                <i class="fas fa-book" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Mes Recettes</span>
                <span style="margin-left: auto; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: 600; background: rgba(232, 97, 60, 0.2); color: var(--burnt-orange);">24</span>
            </a>

            <a href="ingredients.html" class="sidebar-item">
                <i class="fas fa-carrot" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Mes Ingrédients</span>
            </a>

            <a href="favoris.html" class="sidebar-item">
                <i class="fas fa-heart" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Favoris</span>
                <span style="margin-left: auto; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: 600; background: rgba(236, 72, 153, 0.2); color: #EC4899;">8</span>
            </a>

            <div style="border-top: 1px solid rgba(255, 255, 255, 0.1); margin: 24px 12px; padding-top: 24px;">
                <a href="parametres.html" class="sidebar-item">
                    <i class="fas fa-cog" style="width: 20px;"></i>
                    <span style="margin-left: 12px;">Paramètres</span>
                </a>

                <a href="profil.html" class="sidebar-item">
                    <i class="fas fa-user" style="width: 20px;"></i>
                    <span style="margin-left: 12px;">Mon Profil</span>
                </a>
            </div>
        </nav>

        <div class="user-profile">
            <div style="display: flex; align-items: center;">
                <div style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%); display: flex; align-items: center; justify-content: center; font-weight: 700; color: white; font-size: 18px;">
                    C
                </div>
                <div style="margin-left: 12px;">
                    <p style="font-weight: 600; color: white; font-size: 15px;">Chef Martin</p>
                    <p style="font-size: 13px; color: rgba(255, 255, 255, 0.5);">Cuisinier passionné</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <button id="menuToggle" style="display: none; background: none; border: none; font-size: 24px; color: var(--charcoal); cursor: pointer; padding: 8px;">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div>
                        <h2 style="font-family: 'Playfair Display', serif; font-size: 28px; font-weight: 700; color: var(--charcoal); margin-bottom: 4px;">Créer une Recette</h2>
                        <p style="color: #999; font-size: 14px;">Partagez votre créativité culinaire avec la communauté</p>
                    </div>
                </div>

                <div style="display: flex; gap: 12px;">
                    <button id="saveDraftBtn" class="btn btn-secondary">
                        <i class="fas fa-save"></i>
                        Sauvegarder
                    </button>
                    <a href="mes-recettes.html" style="text-decoration: none;">
                        <button class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            Annuler
                        </button>
                    </a>
                </div>
            </div>
        </header>

        <!-- Success Message -->
        <div class="success-message" id="successMessage">
            <div style="display: flex; align-items: center; gap: 12px;">
                <i class="fas fa-check-circle" style="font-size: 24px;"></i>
                <div>
                    <p style="font-weight: 600; font-size: 16px;">Recette sauvegardée en brouillon !</p>
                    <p style="font-size: 14px; opacity: 0.9;">Vous pouvez continuer à modifier ou publier plus tard.</p>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <form id="recipeForm" method="POST" action="{{ route("addRecipe") }}">
                @csrf

                <!-- Informations de Base -->
                <div class="form-card">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
                        <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h2 style="font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 700; color: var(--charcoal);">Informations de Base</h2>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Nom de la recette <span class="required">*</span>
                        </label>
                        <input type="text" name="title" class="form-input" placeholder="Ex: Ratatouille Provençale" required>
                        @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="helper-text">
                            <i class="fas fa-lightbulb"></i>
                            Donnez un nom descriptif et appétissant à votre recette
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Description
                        </label>
                        <textarea name="description" class="form-textarea" placeholder="Décrivez brièvement votre recette, son origine, ou ce qui la rend spéciale..." rows="4"></textarea>
                        @error('description')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="helper-text">
                            <i class="fas fa-lightbulb"></i>
                            Une bonne description attire les cuisiniers !
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
                        <div class="form-group">
                            <label class="form-label">
                                Catégorie <span class="required">*</span>
                            </label>
                            <select name="category" class="form-select" required>
                                <option value="">Sélectionnez une catégorie</option>
                                @foreach($categories as $categorie)
                                <option value="{{ $categorie->id_category }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Type de cuisine
                            </label>
                            <select name="cuisine" class="form-select">
                                <option value="">Origine de la recette</option>
                                @foreach($cuisines as $cuisine)
                                <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Difficulté <span class="required">*</span>
                        </label>
                        <input type="hidden" name="difficulty" id="difficultyInput" required>
                        <div class="difficulty-selector">
                            <div class="difficulty-option" data-value="easy">
                                <div class="difficulty-icon">🥄</div>
                                <div class="difficulty-label">Facile</div>
                                <div class="difficulty-desc">Idéal pour débutants</div>
                            </div>
                            <div class="difficulty-option" data-value="medium">
                                <div class="difficulty-icon">👨‍🍳</div>
                                <div class="difficulty-label">Moyen</div>
                                <div class="difficulty-desc">Quelques techniques requises</div>
                            </div>
                            <div class="difficulty-option" data-value="hard">
                                <div class="difficulty-icon">🌟</div>
                                <div class="difficulty-label">Expert</div>
                                <div class="difficulty-desc">Pour les chefs expérimentés</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Temps & Portions
                        </label>
                        <div class="time-inputs">
                            <div class="time-input">
                                <input type="number" name="prep_time" class="form-input" placeholder="30" min="0" required>
                                @error('prep_time')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <span class="time-unit">min (préparation)</span>
                            </div>
                            <div class="time-input">
                                <input type="number" name="cook_time" class="form-input" placeholder="45" min="0">
                                @error('cook_time')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <span class="time-unit">min (cuisson)</span>
                            </div>
                            <div class="time-input">
                                <input type="number" name="servings" class="form-input" placeholder="4" min="1" required>
                                @error('servings')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <span class="time-unit">portions</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image de la Recette -->
                <div class="form-card">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
                        <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                            <i class="fas fa-image"></i>
                        </div>
                        <h2 style="font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 700; color: var(--charcoal);">Image de la Recette</h2>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Lien vers une image
                        </label>
                        <input type="url" name="image" class="form-input" placeholder="https://example.com/recipe-image.jpg">
                        @error('image')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <div class="helper-text">
                            <i class="fas fa-link"></i>
                            Vous pouvez aussi utiliser une URL d'image existante
                        </div>
                    </div>
                </div>

                <!-- Ingrédients -->
                <div class="form-card">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
                        <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                            <i class="fas fa-carrot"></i>
                        </div>
                        <h2 style="font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 700; color: var(--charcoal);">Ingrédients</h2>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Liste des ingrédients <span class="required">*</span>
                        </label>
                        <div id="ingredientsList" class="dynamic-list">
                            <div class="list-item">
                                <div class="list-item-number">1</div>
                                <div class="list-item-inputs">
                                    <input type="text" class="form-input" placeholder="Ingrédient (ex: tomates)" name="ingredients[0][name]" required>
                                    @error('ingredients')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="button" class="remove-btn" onclick="removeIngredient(this)">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="addIngredientBtn" class="add-item-btn">
                            <i class="fas fa-plus"></i>
                            Ajouter un ingrédient
                        </button>
                        <div class="helper-text">
                            <i class="fas fa-lightbulb"></i>
                            Pour les ingrédients optionnels, ajoutez "(optionnel)" dans le nom
                        </div>
                    </div>
                </div>

                <!-- Étapes de Préparation -->
                <div class="form-card">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
                        <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                            <i class="fas fa-list-ol"></i>
                        </div>
                        <h2 style="font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 700; color: var(--charcoal);">Étapes de Préparation</h2>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Instructions détaillées <span class="required">*</span>
                        </label>
                        <div id="stepsList" class="dynamic-list">
                            <div class="list-item">
                                <div class="list-item-number">1</div>
                                <textarea class="form-textarea list-item-input" placeholder="Décrivez la première étape de préparation..." rows="3" name="steps[0]" required></textarea>
                                @error('steps')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <button type="button" class="remove-btn" onclick="removeStep(this)">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" id="addStepBtn" class="add-item-btn">
                            <i class="fas fa-plus"></i>
                            Ajouter une étape
                        </button>
                        <div class="helper-text">
                            <i class="fas fa-lightbulb"></i>
                            Soyez précis : température, durée, conseils de cuisson...
                        </div>
                    </div>
                </div>

                <div class="form-card">
                    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 32px;">
                        <div style="width: 48px; height: 48px; background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px;">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h2 style="font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 700; color: var(--charcoal);">Tags et Informations</h2>
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Notes du chef (optionnel)
                        </label>
                        <textarea name="chef_notes" class="form-textarea" placeholder="Conseils personnels, variantes, astuces de conservation..." rows="4"></textarea>
                        @error('chef_notes')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Boutons d'Action -->
                <div class="action-buttons">
                    <button type="button" id="previewBtn" class="btn btn-secondary">
                        <i class="fas fa-eye"></i>
                        Prévisualiser
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                        Publier la Recette
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <div class="toast-icon">
            <i class="fas fa-check"></i>
        </div>
        <div>
            <p style="font-weight: 600; font-size: 16px; color: var(--charcoal);">Recette créée !</p>
            <p style="font-size: 14px; color: #666;">Redirection vers vos recettes...</p>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');

        if (window.innerWidth <= 1024) {
            menuToggle.style.display = 'block';
        }

        window.addEventListener('resize', () => {
            menuToggle.style.display = window.innerWidth <= 1024 ? 'block' : 'none';
        });

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });

        // Difficulty selector
        document.querySelectorAll('.difficulty-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.difficulty-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                this.classList.add('selected');
                document.getElementById('difficultyInput').value = this.dataset.value;
            });
        });

        // Set default difficulty to "medium"
        document.querySelector('.difficulty-option[data-value="medium"]').classList.add('selected');
        document.getElementById('difficultyInput').value = 'medium';

        // Image upload functionality
        const imageInput = document.getElementById('imageInput');
        const previewImg = document.getElementById('previewImg');

        


        
        let ingredientCount = document.querySelectorAll('.list-item').lenght;
        console.log(ingredientCount)
        document.getElementById('addIngredientBtn').addEventListener('click', function() {
            ingredientCount++;
            const ingredientsList = document.getElementById('ingredientsList');
            const newItem = document.createElement('div');
            newItem.className = 'list-item';
            newItem.innerHTML = `
                <div class="list-item-number">${ingredientCount}</div>
                <div class="list-item-inputs">
                    <input type="text" class="form-input" placeholder="Ingrédient" name="ingredients[${ingredientCount-1}][name]" required>
                </div>
                <button type="button" class="remove-btn" onclick="removeIngredient(this)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            `;
            ingredientsList.appendChild(newItem);
            updateIngredientNumbers();
        });

        function removeIngredient(btn) {
            const item = btn.closest('.list-item');
            item.remove();
            updateIngredientNumbers();
        }

        function updateIngredientNumbers() {
            const items = document.querySelectorAll('#ingredientsList .list-item');
            items.forEach((item, index) => {
                item.querySelector('.list-item-number').textContent = index + 1;
                const quantityInput = item.querySelector('input[name^="ingredients"]');
                const nameInput = item.querySelector('input[name$="[name]"]');
                if (quantityInput) quantityInput.name = `ingredients[${index}][quantity]`;
                if (nameInput) nameInput.name = `ingredients[${index}][name]`;
            });
            ingredientCount = items.length;
        }

        // Steps management
        let stepCount = 1;
        document.getElementById('addStepBtn').addEventListener('click', function() {
            stepCount++;
            const stepsList = document.getElementById('stepsList');
            const newItem = document.createElement('div');
            newItem.className = 'list-item';
            newItem.innerHTML = `
                <div class="list-item-number">${stepCount}</div>
                <textarea class="form-textarea list-item-input" placeholder="Décrivez cette étape..." rows="3" name="steps[${stepCount-1}]" required></textarea>
                <button type="button" class="remove-btn" onclick="removeStep(this)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            `;
            stepsList.appendChild(newItem);
            updateStepNumbers();
        });

        function removeStep(btn) {
            const item = btn.closest('.list-item');
            item.remove();
            updateStepNumbers();
        }

        function updateStepNumbers() {
            const items = document.querySelectorAll('#stepsList .list-item');
            items.forEach((item, index) => {
                item.querySelector('.list-item-number').textContent = index + 1;
                const textarea = item.querySelector('textarea');
                if (textarea) textarea.name = `steps[${index}]`;
            });
            stepCount = items.length;
        }
        // Save draft functionality
        document.getElementById('saveDraftBtn').addEventListener('click', function() {
            // Simulate saving to localStorage
            const formData = new FormData(document.getElementById('recipeForm'));
            const data = Object.fromEntries(formData);
            localStorage.setItem('recipeDraft', JSON.stringify(data));

            document.getElementById('successMessage').style.display = 'block';
            setTimeout(() => {
                document.getElementById('successMessage').style.display = 'none';
            }, 5000);
        });

        
        document.getElementById('previewBtn').addEventListener('click', function() {
            // Here you would normally open a preview modal or page
            alert('Prévisualisation - Cette fonctionnalité ouvrirait un aperçu de votre recette');
        });

        // Load draft if exists
        window.addEventListener('load', function() {
            const draft = localStorage.getItem('recipeDraft');
            if (draft) {
                if (confirm('Vous avez un brouillon non sauvegardé. Voulez-vous le charger ?')) {
                    const data = JSON.parse(draft);
                    // Here you would populate the form with draft data
                }
            }
        });
    </script>
</body>

</html>