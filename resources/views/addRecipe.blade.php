<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter une Recette - Recettes et Ingrédients</title>
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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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

        .sidebar-badge {
            margin-left: auto;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .user-profile {
            padding: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: auto;
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
            margin-bottom: 24px;
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

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--charcoal);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 28px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 14px;
            color: var(--charcoal);
            margin-bottom: 10px;
            letter-spacing: 0.3px;
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
            padding: 48px 24px;
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

        .image-action-btn {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            color: var(--charcoal);
        }

        .image-action-btn:hover {
            background: white;
            transform: scale(1.1);
        }

        /* Dynamic Lists */
        .dynamic-list {
            margin-top: 16px;
        }

        .list-item {
            display: flex;
            gap: 12px;
            margin-bottom: 12px;
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

        .list-item-input {
            flex: 1;
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

        /* Grid Layout for Small Inputs */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
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
            cursor: text;
            transition: all 0.3s;
        }

        .tags-container:focus-within {
            border-color: var(--burnt-orange);
            box-shadow: 0 0 0 4px rgba(232, 97, 60, 0.1);
            background: white;
        }

        .tag {
            padding: 6px 12px;
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
            border-radius: 20px;
            font-size: 13px;
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
            width: 16px;
            height: 16px;
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
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            padding: 6px;
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
        }

        /* Difficulty Selector */
        .difficulty-selector {
            display: flex;
            gap: 12px;
        }

        .difficulty-option {
            flex: 1;
            padding: 16px;
            border: 2px solid #E8E5E1;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: white;
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
            margin-bottom: 8px;
        }

        .difficulty-label {
            font-weight: 600;
            font-size: 14px;
        }

        /* Progress Indicator */
        .progress-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 3px;
            background: #E8E5E1;
            z-index: 0;
        }

        .progress-line-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            width: 0%;
            transition: width 0.5s ease;
        }

        .progress-step {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .progress-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #E8E5E1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #999;
            transition: all 0.3s;
        }

        .progress-step.active .progress-circle {
            background: linear-gradient(135deg, var(--burnt-orange) 0%, var(--terracotta) 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(232, 97, 60, 0.3);
        }

        .progress-step.completed .progress-circle {
            background: var(--sage);
            color: white;
        }

        .progress-label {
            margin-top: 8px;
            font-size: 12px;
            font-weight: 600;
            color: #999;
        }

        .progress-step.active .progress-label {
            color: var(--burnt-orange);
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
        }

        /* Mobile Overlay */
        .mobile-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 45;
            display: none;
        }

        .mobile-overlay.active {
            display: block;
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

        /* Helper Text */
        .helper-text {
            font-size: 13px;
            color: #999;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
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
                <span class="sidebar-badge" style="background: rgba(232, 97, 60, 0.2); color: var(--burnt-orange);">24</span>
            </a>

            <a href="ingredients.html" class="sidebar-item">
                <i class="fas fa-carrot" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Mes Ingrédients</span>
            </a>

            <a href="favoris.html" class="sidebar-item">
                <i class="fas fa-heart" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Favoris</span>
                <span class="sidebar-badge" style="background: rgba(236, 72, 153, 0.2); color: #EC4899;">8</span>
            </a>

            <a href="planning.html" class="sidebar-item">
                <i class="fas fa-calendar-alt" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Planning</span>
            </a>

            <a href="liste-courses.html" class="sidebar-item">
                <i class="fas fa-shopping-cart" style="width: 20px;"></i>
                <span style="margin-left: 12px;">Liste de Courses</span>
                <span class="sidebar-badge" style="background: rgba(34, 197, 94, 0.2); color: #22C55E;">12</span>
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

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: center; gap: 16px;">
                    <button id="menuToggle" style="display: none; background: none; border: none; font-size: 24px; color: var(--charcoal); cursor: pointer;">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div>
                        <h2 style="font-family: 'Playfair Display', serif; font-size: 28px; font-weight: 700; color: var(--charcoal); margin-bottom: 4px;">Créer une Recette</h2>
                        <p style="color: #999; font-size: 14px;">Partagez votre créativité culinaire</p>
                    </div>
                </div>

                <a href="mes-recettes.html" style="text-decoration: none;">
                    <button class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Annuler
                    </button>
                </a>
            </div>
        </header>

        <!-- Form Container -->
        <div class="form-container">
            <!-- Progress Steps -->
            <div class="progress-steps">
                <div class="progress-line">
                    <div class="progress-line-fill" id="progressFill"></div>
                </div>
                <div class="progress-step active">
                    <div class="progress-circle">1</div>
                    <span class="progress-label">Informations</span>
                </div>
                <div class="progress-step">
                    <div class="progress-circle">2</div>
                    <span class="progress-label">Ingrédients</span>
                </div>
                <div class="progress-step">
                    <div class="progress-circle">3</div>
                    <span class="progress-label">Préparation</span>
                </div>
                <div class="progress-step">
                    <div class="progress-circle">4</div>
                    <span class="progress-label">Finalisation</span>
                </div>
            </div>

            <form id="recipeForm">
                <!-- Section 1: Basic Information -->
                <div class="form-card">
                    <h3 class="section-title">
                        <div class="section-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        Informations de Base
                    </h3>

                    <div class="form-group">
                        <label class="form-label">Nom de la recette *</label>
                        <input type="text" class="form-input" placeholder="Ex: Ratatouille Provençale" required>
                        <p class="helper-text">
                            <i class="fas fa-lightbulb"></i>
                            Choisissez un nom accrocheur et descriptif
                        </p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-textarea" placeholder="Décrivez votre recette, son histoire, ses saveurs..."></textarea>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Catégorie *</label>
                            <select class="form-select" required>
                                <option value="">Sélectionner...</option>
                                <option value="entree">Entrée</option>
                                <option value="plat">Plat principal</option>
                                <option value="dessert">Dessert</option>
                                <option value="aperitif">Apéritif</option>
                                <option value="boisson">Boisson</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Cuisine</label>
                            <select class="form-select">
                                <option value="">Sélectionner...</option>
                                <option value="francaise">Française</option>
                                <option value="italienne">Italienne</option>
                                <option value="asiatique">Asiatique</option>
                                <option value="americaine">Américaine</option>
                                <option value="mediterraneenne">Méditerranéenne</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Difficulté *</label>
                        <div class="difficulty-selector">
                            <div class="difficulty-option" data-value="easy">
                                <div class="difficulty-icon">😊</div>
                                <div class="difficulty-label">Facile</div>
                            </div>
                            <div class="difficulty-option" data-value="medium">
                                <div class="difficulty-icon">🤔</div>
                                <div class="difficulty-label">Moyen</div>
                            </div>
                            <div class="difficulty-option" data-value="hard">
                                <div class="difficulty-icon">🔥</div>
                                <div class="difficulty-label">Difficile</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Temps de préparation *</label>
                            <input type="number" class="form-input" placeholder="Minutes" min="1" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Temps de cuisson</label>
                            <input type="number" class="form-input" placeholder="Minutes" min="0">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nombre de portions *</label>
                            <input type="number" class="form-input" placeholder="Personnes" min="1" required>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Image Upload -->
                <div class="form-card">
                    <h3 class="section-title">
                        <div class="section-icon">
                            <i class="fas fa-image"></i>
                        </div>
                        Photo de la Recette
                    </h3>

                    <div class="image-upload-area" id="imageUploadArea">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <h4 style="font-weight: 700; font-size: 18px; margin-bottom: 8px; color: var(--charcoal);">Glissez-déposez votre photo ici</h4>
                        <p style="color: #999; margin-bottom: 16px;">ou cliquez pour parcourir vos fichiers</p>
                        <p style="color: #999; font-size: 13px;">PNG, JPG, WEBP jusqu'à 10MB</p>
                        <input type="file" id="imageInput" accept="image/*" style="display: none;">
                    </div>

                    <div class="image-preview" id="imagePreview">
                        <img id="previewImg" src="" alt="Preview">
                        <div class="image-preview-actions">
                            <button type="button" class="image-action-btn" id="changeImageBtn">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                            <button type="button" class="image-action-btn" id="removeImageBtn">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Ingredients -->
                <div class="form-card">
                    <h3 class="section-title">
                        <div class="section-icon">
                            <i class="fas fa-carrot"></i>
                        </div>
                        Ingrédients
                    </h3>

                    <div class="dynamic-list" id="ingredientsList">
                        <div class="list-item">
                            <div class="list-item-number">1</div>
                            <input type="text" class="form-input list-item-input" placeholder="Ex: 500g de tomates">
                        </div>
                        <div class="list-item">
                            <div class="list-item-number">2</div>
                            <input type="text" class="form-input list-item-input" placeholder="Ex: 2 cuillères à soupe d'huile d'olive">
                        </div>
                    </div>

                    <button type="button" class="add-item-btn" id="addIngredientBtn">
                        <i class="fas fa-plus"></i>
                        Ajouter un ingrédient
                    </button>
                </div>

                <!-- Section 4: Instructions -->
                <div class="form-card">
                    <h3 class="section-title">
                        <div class="section-icon">
                            <i class="fas fa-list-ol"></i>
                        </div>
                        Étapes de Préparation
                    </h3>

                    <div class="dynamic-list" id="stepsList">
                        <div class="list-item">
                            <div class="list-item-number">1</div>
                            <textarea class="form-textarea list-item-input" placeholder="Décrivez la première étape en détail..." rows="3"></textarea>
                            <button type="button" class="remove-btn" onclick="removeStep(this)">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>

                    <button type="button" class="add-item-btn" id="addStepBtn">
                        <i class="fas fa-plus"></i>
                        Ajouter une étape
                    </button>
                </div>

                <!-- Section 5: Tags & Additional Info -->
                <div class="form-card">
                    <h3 class="section-title">
                        <div class="section-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        Informations Complémentaires
                    </h3>

                    <div class="form-group">
                        <label class="form-label">Tags</label>
                        <div class="tags-container" id="tagsContainer">
                            <input type="text" class="tag-input" id="tagInput" placeholder="Appuyez sur Entrée pour ajouter des tags...">
                        </div>
                        <p class="helper-text">
                            <i class="fas fa-info-circle"></i>
                            Ex: végétarien, sans gluten, rapide, santé
                        </p>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Notes et astuces</label>
                        <textarea class="form-textarea" placeholder="Partagez vos conseils, variantes ou notes personnelles..."></textarea>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="form-card">
                    <div class="action-buttons">
                        <button type="button" class="btn btn-secondary">
                            <i class="fas fa-save"></i>
                            Sauvegarder comme brouillon
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check"></i>
                            Publier la recette
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');

        if (window.innerWidth <= 1024) {
            menuToggle.style.display = 'block';
        }

        window.addEventListener('resize', () => {
            if (window.innerWidth <= 1024) {
                menuToggle.style.display = 'block';
            } else {
                menuToggle.style.display = 'none';
                sidebar.classList.remove('open');
                mobileOverlay.classList.remove('active');
            }
        });

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            mobileOverlay.classList.toggle('active');
        });

        mobileOverlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            mobileOverlay.classList.remove('active');
        });

        // Difficulty selector
        document.querySelectorAll('.difficulty-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.difficulty-option').forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        // Image upload
        const imageUploadArea = document.getElementById('imageUploadArea');
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');

        imageUploadArea.addEventListener('click', () => imageInput.click());

        imageUploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            imageUploadArea.classList.add('dragover');
        });

        imageUploadArea.addEventListener('dragleave', () => {
            imageUploadArea.classList.remove('dragover');
        });

        imageUploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            imageUploadArea.classList.remove('dragover');
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                displayImage(file);
            }
        });

        imageInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                displayImage(file);
            }
        });

        function displayImage(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                imageUploadArea.style.display = 'none';
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }

        document.getElementById('changeImageBtn').addEventListener('click', (e) => {
            e.stopPropagation();
            imageInput.click();
        });

        document.getElementById('removeImageBtn').addEventListener('click', (e) => {
            e.stopPropagation();
            imageUploadArea.style.display = 'block';
            imagePreview.style.display = 'none';
            imageInput.value = '';
        });

        // Dynamic ingredients list
        let ingredientCount = 2;
        document.getElementById('addIngredientBtn').addEventListener('click', function() {
            ingredientCount++;
            const ingredientsList = document.getElementById('ingredientsList');
            const newItem = document.createElement('div');
            newItem.className = 'list-item';
            newItem.innerHTML = `
                <div class="list-item-number">${ingredientCount}</div>
                <input type="text" class="form-input list-item-input" placeholder="Ex: 1 cuillère à café de sel">
                <button type="button" class="remove-btn" onclick="removeIngredient(this)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            `;
            ingredientsList.appendChild(newItem);
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
            });
            ingredientCount = items.length;
        }

        // Dynamic steps list
        let stepCount = 1;
        document.getElementById('addStepBtn').addEventListener('click', function() {
            stepCount++;
            const stepsList = document.getElementById('stepsList');
            const newItem = document.createElement('div');
            newItem.className = 'list-item';
            newItem.innerHTML = `
                <div class="list-item-number">${stepCount}</div>
                <textarea class="form-textarea list-item-input" placeholder="Décrivez cette étape..." rows="3"></textarea>
                <button type="button" class="remove-btn" onclick="removeStep(this)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            `;
            stepsList.appendChild(newItem);
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
            });
            stepCount = items.length;
        }

        // Tags functionality
        const tagsContainer = document.getElementById('tagsContainer');
        const tagInput = document.getElementById('tagInput');
        const tags = [];

        tagInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && this.value.trim()) {
                e.preventDefault();
                addTag(this.value.trim());
                this.value = '';
            }
        });

        function addTag(text) {
            if (tags.includes(text)) return;
            
            tags.push(text);
            const tag = document.createElement('div');
            tag.className = 'tag';
            tag.innerHTML = `
                ${text}
                <button type="button" class="tag-remove" onclick="removeTag(this, '${text}')">
                    <i class="fas fa-times"></i>
                </button>
            `;
            tagsContainer.insertBefore(tag, tagInput);
        }

        function removeTag(btn, text) {
            const index = tags.indexOf(text);
            if (index > -1) {
                tags.splice(index, 1);
            }
            btn.closest('.tag').remove();
        }

        // Form submission
        document.getElementById('recipeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simulate form submission
            const progressFill = document.getElementById('progressFill');
            progressFill.style.width = '100%';
            
            setTimeout(() => {
                alert('Recette créée avec succès! 🎉');
                window.location.href = 'mes-recettes.html';
            }, 1000);
        });

        // Progress tracking (simplified)
        const formInputs = document.querySelectorAll('.form-input, .form-textarea, .form-select');
        let filledInputs = 0;
        const totalInputs = formInputs.length;

        formInputs.forEach(input => {
            input.addEventListener('input', updateProgress);
        });

        function updateProgress() {
            filledInputs = Array.from(formInputs).filter(input => input.value.trim() !== '').length;
            const progress = (filledInputs / totalInputs) * 100;
            document.getElementById('progressFill').style.width = Math.min(progress, 75) + '%';
        }
    </script>
</body>
</html>