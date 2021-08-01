<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\CreateBookPostRequest;
use Illuminate\Support\Facades\Storage;
use function Sodium\increment;

class BookController extends Controller
{
    public function createBook(Request $request)
    {
        if ($request->submit) {
            $this->validate($request, [
                'author_name' => 'required|string',
                'title' => 'required|unique:books,title',
                'publication_year' => 'required',
                'image' => 'required|image|max:2048'
            ]);

            $file = $request->file('image')->store('public/images');
            Book::create(
                [
                    'author_name' => $request->author_name,
                    'title' => $request->title,
                    'slug' => $request->title,
                    'publication_year' => $request->publication_year,
                    'is_archived' => 0,
                    'image_url' => basename($file)
                ]
            );
            return redirect('/');
        }
        return view('/book/create');

    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::where('id', $id)
            ->first();
        if ($request->submit && (!isset($request->image) && $book['title'] == $request->title)) {

            $this->validate($request, [
                'author_name' => 'required|string',
                //'title' => 'required|unique:books,title',
                'publication_year' => 'required',
                //'image' => 'image|max:2048'
            ]);

            //$file = $request->file('image')->store('public/images');
            Book::where('id', $id)
                ->update(
                    [
                        'author_name' => $request->author_name,
                        'title' => $request->title,
                        'slug' => $request->title,
                        'publication_year' => $request->publication_year,
                        'is_archived' => 0,
                        'image_url' => $book['image_url']
                    ]
                );
            return redirect('/');
        } elseif ($request->submit && $book['title'] != $request->title){
            $this->validate($request, [
                'author_name' => 'required|string',
                'title' => 'required|unique:books,title',
                'publication_year' => 'required',
            ]);

            Book::where('id', $id)
                ->update(
                    [
                        'author_name' => $request->author_name,
                        'title' => $request->title,
                        'slug' => $request->title,
                        'publication_year' => $request->publication_year,
                        'is_archived' => 0,
                        'image_url' => $book['image_url']
                    ]
                );
            return redirect('/');
        } elseif ($request->submit){
            $this->validate($request, [
                'author_name' => 'required|string',
                'publication_year' => 'required',
                'image' => 'image|max:2048'
            ]);

            $file = $request->file('image')->store('public/images');

            Book::where('id', $id)
                ->update(
                    [
                        'author_name' => $request->author_name,
                        'title' => $request->title,
                        'slug' => $request->title,
                        'publication_year' => $request->publication_year,
                        'is_archived' => 0,
                        'image_url' => basename($file)
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
        $book = Book::find($id);
        $book->increment('views');
        $comments = Comment::where('book_id', $id)
            ->get();

        $avg_rating = round(Comment::where('book_id', $id)
            ->avg('rating'), 2);

        return view('book/view', ['book' => $book, 'comments' => $comments, 'avg_rating' => $avg_rating]);
    }

    public function commentBook(Request $request, $id)
    {
        if ($request->submit) {
            $this->validate($request, [
                'comment_content' => 'required|string|max:500',
                'rating' => 'required'
            ]);

            Comment::create([
                'book_id' => $id,
                'comment_content' => $request->comment_content,
                'rating' => $request->rating
            ]);

            return redirect("book/$id");
        }
    }

    public function viewComments($book_id)
    {
        $comments = Comment::where('book_id', $book_id)
            ->get();
        return view('book/comments', ['comments' => $comments, 'book_id' => $book_id]);
    }
}
