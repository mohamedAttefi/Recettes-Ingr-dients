<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-900 text-white font-sans">

@include('header')

    <section class="bg-gradient-to-r from-orange-600 to-red-600 py-12 px-6">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">Welcome back, {{ Auth::user()->name }}!</h2 function index(Request $request)
    {
        $recipes = Recipe::all();
        $categories = Category::all();
        if ($request->filled('q')) {
            $recipes->where('title', 'like', '%' . $request->q . '%');
        }
        if ($request->filled('category')) {
            $recipes->where('category_id', $request->category);
        }
        return view("recipe.allRecipes", ["recipes" => $recipes, "categories" => $categories]);
    }2>
            <p class="text-orange-100 mb-8">What are we cooking today?</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('addRecipe.form') }}" class="bg-white text-orange-600 px-6 py-2 rounded-full font-bold shadow-md hover:bg-gray-100">+ New Recipe</a>
            </div>
        </div>
    </section>

    <main class="container mx-auto px-6 py-10">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="bg-gray-800 p-6 rounded-xl border border-gray-700">
                <p class="text-gray-400 text-sm">Recipes</p>
                <p class="text-3xl font-bold">12</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-xl border border-gray-700">
                <p class="text-gray-400 text-sm">Ingredients</p>
                <p class="text-3xl font-bold">45</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-xl border border-gray-700">
                <p class="text-gray-400 text-sm">Favorites</p>
                <p class="text-3xl font-bold">8</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-xl border border-gray-700">
                <p class="text-gray-400 text-sm">Cooking Hours</p>
                <p class="text-3xl font-bold">36h</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-orange-500 p-6 rounded-2xl hover:bg-orange-600 transition cursor-pointer">
                <i class="fas fa-book text-3xl mb-4"></i>
                <h3 class="text-xl font-bold mb-2">My Recipes</h3>
                <p class="text-orange-100 text-sm">Manage and create new culinary masterpieces.</p>
            </div>
            <div class="bg-green-600 p-6 rounded-2xl hover:bg-green-700 transition cursor-pointer">
                <i class="fas fa-carrot text-3xl mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Ingredients</h3>
                <p class="text-green-100 text-sm">Organize your pantry and shopping lists.</p>
            </div>
            <div class="bg-blue-600 p-6 rounded-2xl hover:bg-blue-700 transition cursor-pointer">
                <i class="fas fa-user-cog text-3xl mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Profile</h3>
                <p class="text-blue-100 text-sm">Update your preferences and settings.</p>
            </div>
        </div>

    </main>

    <footer class="text-center py-10 text-gray-500 text-sm border-t border-gray-800">
        &copy; 2026 Recettes et Ingrédients
    </footer>

</body>
</html>