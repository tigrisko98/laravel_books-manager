<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function createBook()
    {
        if (isset($_POST['submit'])) {
            Book::create(
                [
                    'author_name' => $_POST['author_name'],
                    'title' => $_POST['title'],
                    'slug' => $_POST['title'],
                    'publication_year' => $_POST['publication_year'],
                    'is_archived' => 0,
                    'image_url' => '#'
                ]
            );
            return redirect('/');
        }
        return view('/book/create');

    }

    public function updateBook($id)
    {
        $book = Book::where('id', $id)
            ->first();
        if (isset($_POST['submit'])) {
            Book::where('id', $id)
                ->update(
                    [
                        'author_name' => $_POST['author_name'],
                        'title' => $_POST['title'],
                        'slug' => $_POST['title'],
                        'publication_year' => $_POST['publication_year'],
                        'is_archived' => 0,
                        'image_url' => '#'
                    ]
                );
            return redirect('/');
        }
        return view('/book/update', ['book' => $book]);
    }
}
