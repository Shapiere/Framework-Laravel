<?php

namespace App\Http\Controllers;

use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $data = new Author(); // membuat object
        $authors = $data->getAuthors(); // mengakses method getAuthors

        return view('authors', ['authors' => $authors]); // mengirim data author ke view
    }
}
