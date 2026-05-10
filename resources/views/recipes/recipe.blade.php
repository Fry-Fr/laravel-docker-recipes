<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <title>{{ $recipe->title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
    <body>
        <div class="container mt-5">
            <a href="/" class="btn">← Back</a>
            <div class="mb-4">
                <div>
                    <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary">
                        Edit Recipe
                    </a>
                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this recipe?')">
                            Delete Recipe
                        </button>
                    </form>
                </div>
                    </div>

                    <h1 class="mb-4 fw-medium">{{ $recipe->title }}</h1>
                    @if($recipe->instructions)
                        <h3 class="mb-3 fw-medium">Instructions</h3>
                        <p>{{ $recipe->instructions }}</p>
                    @endif
                    <h3 class="mb-3 fw-medium">Ingredients</h3>
                    <ol class="list-group">
                        @foreach($ingredients as $ingredient)
                            <li class="list-group-item">{{ $ingredient }}</li>
                        @endforeach
                    </ol>
        </div>
    </body>
</html>
