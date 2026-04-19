<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <title>Add Recipe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
    <body>
        <div class="container mt-5">
            <div class="mb-4">
                        <a href="{{ route('recipes.create') }}" class="btn btn-primary">
                            Add Recipe
                        </a>
                    </div>

                    <h1 class="mb-4 font-medium">All Recipes</h1>

                    @if($recipes->count() > 0)
                        <ol class="space-y-2">
                            @foreach($recipes as $recipe)
                                <li class="p-2 bg-gray-100 dark:bg-gray-800 rounded">
                                    <a href="{{ route('recipes.show', $recipe->id) }}">
                                        {{ $recipe->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    @else
                        <p class="text-[#706f6c] dark:text-[#A1A09A]">No recipes yet. Add your first recipe!</p>
                    @endif
        </div>
    </body>
</html>
