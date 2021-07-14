<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class SiteController extends Controller
{
    public function index()
    {
        $booksList = Book::getBooksList()->get();
        
        return view('site', ['booksList' => $booksList]);
    }
}
