<?php

namespace App\Http\Controllers;

use Cache;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $client = new \App\Services\GoogleBooksClient(config('services.google_books.key'));
        $books = \App\Models\Book::paginate(10);
        $bookDetails = [];

        foreach ($books as $book) {
            // cache
            // $bookDetail = Cache::get('book_' . $book->isbn);

            // if (!$bookDetail) {
            //     $bookDetail = $client->searchBooks($book->isbn);
            //     if (!empty($bookDetail)) {
            //         $bookDetail = $bookDetail[0];
            //         Cache::put('book_' . $book->isbn, $bookDetail, 60 * 60 * 24); // Cache for 24 hours
            //     }
            // }
            // if ($bookDetail) {
            //     $bookDetails[] = $bookDetail;
            // }
            $bookDetail = $client->searchBooks($book->isbn);
            $bookDetails[] = $bookDetail;
        }

        return view('books.index', ['books' => $bookDetails, 'bookPaginator' => $books]);
    }
    public function search(Request $request)
    {
        $client = new \App\Services\GoogleBooksClient(config('services.google_books.key'));
        if ($request->has('keyword'))  {
            $keyword = $request->input('keyword');
            $books = $client->searchBooks($keyword);
        } else {
            $books = $client->searchBooks('books');
        }
        return view('books.search', ['books' => $books]);
    }
}