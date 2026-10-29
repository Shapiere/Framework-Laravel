<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return response()->json([
            'success' => true,
            'message' => 'Get All Resource',
            'data' => $genres,
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $genre = Genre::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Resource created successfully',
            'data' => $genre,
        ], 201);
    }

    public function show(string $id)
    {
        $genre = Genre::find($id);

        if (! $genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get Resource',
            'data' => $genre,
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $genre = Genre::find($id);

        if (! $genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $genre->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Resource updated successfully',
            'data' => $genre,
        ], 200);
    }

    public function destroy(string $id)
    {
        $genre = Genre::find($id);

        if (! $genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found',
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Resource deleted successfully',
        ], 200);
    }
}
