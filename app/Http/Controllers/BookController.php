<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

    public function deleteBook($id)
    {
        Book::where('id', $id)
            ->update(['is_archived' => 1]);
        return redirect('/');

    }

    public function viewBook($id)
    {
        $book = Book::where('id', $id)
            ->first();
        $comments = Comment::where('book_id', $id)
            ->get();

        return view('book/view', ['book' => $book, 'comments' => $comments]);
    }

    public function commentBook($id)
    {
        if (isset($_POST['submit'])) {
            $comment = Book::find(1);
            $comment->comments()->create([
                'book_id' => $id,
                'content' => $_POST['content'],
                'rating' => 10
            ]);
            return redirect("book/$id");
        }
    }

    public function viewComments($book_id)
    {
        $comments = Comment::where('book_id', $book_id)
            ->get();
        return view('book/comments', ['comments' => $comments]);
    }
}
