<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $books = Book::latest()->paginate(18);
        return view('pages.home', compact('books'));
    }
}
