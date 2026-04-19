<!DOCTYPE html>
<html>
<head>
    <title>Add Recipe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <a href="{{ route('home') }}" class="btn">← Back</a>
    <h1>Add a Recipe</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('recipes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            <textarea name="ingredients" class="form-control" id="ingredients" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
</body>
</html>