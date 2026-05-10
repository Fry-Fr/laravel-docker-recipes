<!DOCTYPE html>
<html>
<head>
    <title>Add Recipe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <a href="{{ route('recipes.show', $recipe->id) }}" class="btn">← Back</a>
        <h1>Update Recipe</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $recipe->title }}" required>
            </div>

            <div class="mb-3">
                <label for="instructions" class="form-label">Instructions</label>
                <textarea name="instructions" class="form-control" id="instructions" rows="3">{{ $recipe->instructions }}</textarea>
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredients</label>
                <textarea name="ingredients" class="form-control" id="ingredients" rows="5" required>{{ $recipe->ingredients }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Recipe</button>
        </form>
    </div>
</body>
</html>