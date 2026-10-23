<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $data = new Genre(); // membuat object
        $genres = $data->getGenres(); // mengakses method getGenres

        return view('genres', ['genres' => $genres]); // mengirim data genre ke view
    }
}
