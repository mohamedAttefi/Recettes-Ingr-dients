<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modifier une Recette - Simple & Épuré</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
            color: #212529;
        }

        /* Navbar */
        .navbar {
            background: white;
            border-bottom: 1px solid #e9ecef;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
            color: #2563eb;
            text-decoration: none;
        }

        .navbar-nav {
            display: flex;
            gap: 24px;
            align-items: center;
        }

        .nav-link {
            color: #495057;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.2s;
        }

        .nav-link:hover {
            color: #2563eb;
        }

        .nav-link.active {
            color: #2563eb;
        }

        /* Main Container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        /* Page Header */
        .page-header {
            margin-bottom: 32px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #212529;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #6c757d;
            font-size: 14px;
        }

        /* Card */
        .card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            padding: 32px;
            margin-bottom: 24px;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #212529;
            margin-bottom: 24px;
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 500;
            font-size: 14px;
            color: #212529;
            margin-bottom: 8px;
        }

        .required {
            color: #dc3545;
        }

        .form-input,
        .form-textarea,
        .form-select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: #212529;
            background: white;
            transition: border-color 0.2s;
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            outline: none;
            border-color: #2563eb;
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .helper-text {
            font-size: 12px;
            color: #6c757d;
            margin-top: 4px;
        }

        /* Grid Layout */
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        /* Dynamic Lists */
        .list-item {
            display: flex;
            gap: 12px;
            margin-bottom: 12px;
        }

        .list-number {
            width: 32px;
            height: 38px;
            background: #f8f9fa;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #2563eb;
            flex-shrink: 0;
        }

        .list-inputs {
            flex: 1;
        }

        .remove-btn {
            width: 38px;
            height: 38px;
            background: #fff;
            border: 1px solid #dc3545;
            color: #dc3545;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
            flex-shrink: 0;
        }

        .remove-btn:hover {
            background: #dc3545;
            color: white;
        }

        .add-btn {
            width: 100%;
            padding: 10px;
            border: 1px dashed #ced4da;
            background: transparent;
            color: #6c757d;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
            font-size: 14px;
            margin-top: 12px;
        }

        .add-btn:hover {
            border-color: #2563eb;
            color: #2563eb;
            background: #f0f7ff;
        }

        /* Difficulty Selector */
        .difficulty-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .difficulty-option {
            padding: 16px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            background: white;
        }

        .difficulty-option:hover {
            border-color: #2563eb;
        }

        .difficulty-option.selected {
            border-color: #2563eb;
            background: #f0f7ff;
        }

        .difficulty-icon {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .difficulty-label {
            font-weight: 600;
            font-size: 14px;
        }

        /* Image Preview */
        .image-preview {
            position: relative;
            width: 100%;
            border-radius: 6px;
            overflow: hidden;
            border: 1px solid #e9ecef;
        }

        .image-preview img {
            width: 100%;
            height: auto;
            display: block;
        }

        .image-remove {
            position: absolute;
            top: 12px;
            right: 12px;
            background: white;
            color: #dc3545;
            border: 1px solid #dc3545;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .image-remove:hover {
            background: #dc3545;
            color: white;
        }

        /* Buttons */
        .btn-group {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            padding-top: 24px;
            border-top: 1px solid #e9ecef;
            margin-top: 24px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: white;
            color: #6c757d;
            border: 1px solid #ced4da;
        }

        .btn-secondary:hover {
            background: #f8f9fa;
        }

        /* Success Alert */
        .alert-success {
            display: none;
            background: #d1fae5;
            border: 1px solid #6ee7b7;
            color: #065f46;
            padding: 16px;
            border-radius: 6px;
            margin-bottom: 24px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 12px 16px;
            }

            .navbar-nav {
                display: none;
            }

            .container {
                padding: 24px 16px;
            }

            .card {
                padding: 24px 16px;
            }

            .grid-2,
            .grid-3,
            .difficulty-options {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    @include('header')

    <!-- Main Container -->
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Modifier une Recette</h1>
            <p class="page-subtitle">Mettez à jour votre recette</p>
        </div>

        <!-- Success Alert -->
        <div class="alert-success" id="successAlert">
            <div style="display: flex; align-items: center; gap: 12px;">
                <i class="fas fa-check-circle" style="font-size: 20px;"></i>
                <span style="font-weight: 600;">Recette mise à jour avec succès !</span>
            </div>
        </div>

        <form id="recipeForm" action="{{ route('update') }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $recipe->id }}">

            <!-- Informations de Base -->
            <div class="card">
                <h2 class="card-title">Informations de Base</h2>

                <div class="form-group">
                    <label class="form-label">
                        Nom de la recette <span class="required">*</span>
                    </label>
                    <input type="text" name="title" class="form-input"
                           value="{{ old('title', $recipe->title) }}"
                           placeholder="Ex: Tarte aux Pommes" required>
                    @error('title')
                    <div class="helper-text" style="color: #dc3545;">{{ $message }}</div>
                    @enderror
                    <div class="helper-text">Donnez un nom clair et appétissant</div>
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-textarea" 
                              placeholder="Décrivez votre recette...">{{ old('description', $recipe->description) }}</textarea>
                    @error('description')
                    <div class="helper-text" style="color: #dc3545;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">
                            Catégorie <span class="required">*</span>
                        </label>
                        <select name="category" class="form-select" required>
                            <option value="">Sélectionnez...</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id_category }}"
                                    {{ old('category', $recipe->category_id) == $category->id_category ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="helper-text" style="color: #dc3545;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Type de cuisine</label>
                        <select name="cuisine" class="form-select">
                            <option value="">Sélectionnez...</option>
                            @foreach($cuisines as $cuisine)
                            <option value="{{ $cuisine->id }}"
                                    {{ old('cuisine', $recipe->cuisine_id) == $cuisine->id ? 'selected' : '' }}>
                                {{ $cuisine->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Temps et Difficulté -->
            <div class="card">
                <h2 class="card-title">Temps et Difficulté</h2>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Préparation (min)</label>
                        <input type="number" name="prep_time" class="form-input" 
                               value="{{ old('prep_time', $recipe->prep_time) }}" 
                               placeholder="30" min="0">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Cuisson (min)</label>
                        <input type="number" name="cook_time" class="form-input" 
                               value="{{ old('cook_time', $recipe->cook_time) }}" 
                               placeholder="45" min="0">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Difficulté <span class="required">*</span>
                    </label>
                    <div class="difficulty-options">
                        <div class="difficulty-option {{ old('difficulty', $recipe->difficulty) == 'facile' ? 'selected' : '' }}" 
                             data-value="easy">
                            <div class="difficulty-icon">😊</div>
                            <div class="difficulty-label">Facile</div>
                        </div>
                        <div class="difficulty-option {{ old('difficulty', $recipe->difficulty) == 'moyen' ? 'selected' : '' }}" 
                             data-value="medium">
                            <div class="difficulty-icon">🤔</div>
                            <div class="difficulty-label">Moyen</div>
                        </div>
                        <div class="difficulty-option {{ old('difficulty', $recipe->difficulty) == 'difficile' ? 'selected' : '' }}" 
                             data-value="hard">
                            <div class="difficulty-icon">🎓</div>
                            <div class="difficulty-label">Difficile</div>
                        </div>
                    </div>
                    <input type="hidden" name="difficulty" id="difficultyInput"
                           value="{{ old('difficulty', $recipe->difficulty) }}" required>
                    @error('difficulty')
                    <div class="helper-text" style="color: #dc3545;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Nombre de personnes <span class="required">*</span>
                    </label>
                    <input type="number" name="servings" class="form-input"
                           value="{{ old('servings', $recipe->servings) }}"
                           placeholder="4" min="1" required>
                    @error('servings')
                    <div class="helper-text" style="color: #dc3545;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Image -->
            <div class="card">
                <h2 class="card-title">Image de la Recette</h2>

                <div class="form-group">
                    <label class="form-label">URL de l'image</label>
                    <input type="url" name="image_url" id="imageUrlInput" class="form-input" 
                           value="{{ old('image_url', $recipe->image) }}" 
                           placeholder="https://exemple.com/image.jpg">
                    <div class="helper-text">Collez le lien d'une image de votre recette</div>
                </div>

                <div id="imagePreviewContainer" style="{{ $recipe->image ? '' : 'display: none;' }} margin-top: 16px;">
                    <div class="image-preview">
                        <img id="imagePreview" src="{{ $recipe->image ?? '' }}" alt="Aperçu">
                        <button type="button" class="image-remove" onclick="removeImage()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Ingrédients -->
            <div class="card">
                <h2 class="card-title">Ingrédients</h2>

                <div id="ingredientsList">
                    @forelse($recipe->ingredients ?? [] as $index => $ingredient)
                    <div class="list-item">
                        <div class="list-number">{{ $index + 1 }}</div>
                        <div class="list-inputs">
                            <input type="text" class="form-input" 
                                   value="{{ old("ingredients.{$index}.name", $ingredient->name) }}"
                                   placeholder="Farine" name="ingredients[{{ $index }}][name]">
                        </div>
                        <button type="button" class="remove-btn" onclick="removeItem(this)">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @empty
                    <div class="list-item">
                        <div class="list-number">1</div>
                        <div class="list-inputs">
                            <input type="text" class="form-input" placeholder="Farine" name="ingredients[0][name]">
                        </div>
                        <button type="button" class="remove-btn" onclick="removeItem(this)">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    @endforelse
                </div>

                <button type="button" class="add-btn" onclick="addIngredient()">
                    <i class="fas fa-plus"></i> Ajouter un ingrédient
                </button>
            </div>

            <!-- Étapes -->
            <div class="card">
                <h2 class="card-title">Étapes de Préparation</h2>

                <div id="stepsList">
                    @forelse($recipe->steps ?? [] as $index => $step)
                    <div class="form-group">
                        <label class="form-label">Étape {{ $index + 1 }}</label>
                        <textarea class="form-textarea" name="steps[{{ $index }}]" 
                                  placeholder="Décrivez cette étape..." rows="3">{{ old("steps.{$index}", $step->description) }}</textarea>
                    </div>
                    @empty
                    <div class="form-group">
                        <label class="form-label">Étape 1</label>
                        <textarea class="form-textarea" name="steps[0]"
                                  placeholder="Décrivez cette étape..." rows="3"></textarea>
                    </div>
                    @endforelse
                </div>

                <button type="button" class="add-btn" onclick="addStep()">
                    <i class="fas fa-plus"></i> Ajouter une étape
                </button>
            </div>

            <!-- Action Buttons -->
            <div class="btn-group">
                <a href="{{ route('myRecipe') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>

    <script>
        // Initialize ingredient and step counts based on existing data
        let ingredientCount = document.querySelectorAll('#ingredientsList .list-item').length;
        let stepCount = document.querySelectorAll('#stepsList .form-group').length;

        // Image preview functionality
        const imageUrlInput = document.getElementById('imageUrlInput');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');

        imageUrlInput.addEventListener('input', function() {
            const url = this.value.trim();
            if (url) {
                imagePreview.src = url;
                imagePreviewContainer.style.display = 'block';
            } else {
                imagePreviewContainer.style.display = 'none';
            }
        });

        function removeImage() {
            imageUrlInput.value = '';
            imagePreviewContainer.style.display = 'none';
            imagePreview.src = '';
        }

        // Difficulty selector
        document.querySelectorAll('.difficulty-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.difficulty-option').forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                document.getElementById('difficultyInput').value = this.dataset.value;
            });
        });

        // Add ingredient
        function addIngredient() {
            const list = document.getElementById('ingredientsList');
            const item = document.createElement('div');
            item.className = 'list-item';
            item.innerHTML = `
                <div class="list-number">${ingredientCount + 1}</div>
                <div class="list-inputs">
                    <input type="text" class="form-input" placeholder="Farine" name="ingredients[${ingredientCount}][name]">
                </div>
                <button type="button" class="remove-btn" onclick="removeItem(this)">
                    <i class="fas fa-times"></i>
                </button>
            `;
            list.appendChild(item);
            ingredientCount++;
            updateNumbers('ingredientsList');
        }

        // Add step
        function addStep() {
            const list = document.getElementById('stepsList');
            const group = document.createElement('div');
            group.className = 'form-group';
            group.innerHTML = `
                <label class="form-label">Étape ${stepCount + 1}</label>
                <textarea class="form-textarea" name="steps[${stepCount}]" placeholder="Décrivez cette étape..." rows="3"></textarea>
            `;
            list.appendChild(group);
            stepCount++;
        }

        // Remove item
        function removeItem(btn) {
            const list = btn.closest('#ingredientsList');
            const items = list.querySelectorAll('.list-item');
            
            // Don't allow removing if only one item
            if (items.length > 1) {
                btn.closest('.list-item').remove();
                updateNumbers('ingredientsList');
                ingredientCount--;
            } else {
                alert('Vous devez avoir au moins un ingrédient');
            }
        }

        // Update numbers
        function updateNumbers(listId) {
            const items = document.getElementById(listId).querySelectorAll('.list-number');
            items.forEach((item, index) => {
                item.textContent = index + 1;
            });
        }

        // Form validation
        document.getElementById('recipeForm').addEventListener('submit', function(e) {
            const difficulty = document.getElementById('difficultyInput').value;
            if (!difficulty) {
                e.preventDefault();
                alert('Veuillez sélectionner un niveau de difficulté');
                return false;
            }
        });
    </script>
</body>

</html>