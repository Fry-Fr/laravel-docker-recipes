<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        $lines = explode("\n", $recipe->ingredients);

        // Remove "- " and trim whitespace
        $array = array_map(function($item) {
            return trim(ltrim($item, "- "));
        }, $lines);

        // Optional: remove empty values (if any)
        $ingredients = array_filter($array);

        return view('recipes.recipe', compact('recipe', 'ingredients')); // resources/views/recipes/recipe.blade.php
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', compact('recipe')); // resources/views/recipes/edit.blade.php
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ingredients' => 'required|string',
        ]);
        $recipe->update($data);
        return redirect()->back()->with('success', 'Recipe updated successfully!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect()->route('home')->with('success', 'Recipe deleted successfully!');
    }

    public function create()
    {
        return view('recipes.create'); // resources/views/recipes/create.blade.php
    }

    public function index()
    {
        $recipes = Recipe::all();
        return view('welcome', compact('recipes'));
    }

    public function store(Request $request)
    {
        // Validate the form
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ingredients' => 'required|string',
        ]);
        Recipe::create($data);

        return redirect()->back()->with('success', 'Recipe added successfully!');
    }
}