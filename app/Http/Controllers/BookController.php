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
            $bookDetail = $client->searchBook($book->isbn);
            $bookDetails[] = $bookDetail;
        }

        return view('books.index', ['books' => $bookDetails, 'bookPaginator' => $books]);
    }
    public function search(Request $request)
    {
        $client = new \App\Services\GoogleBooksClient(config('services.google_books.key'));
        if ($request->has('keyword'))  {
            $keyword = $request->input('keyword');
            $books = $client->searchBook($keyword);
        } else {
            $books = $client->searchBook('books');
        }
        return view('books.search', ['books' => $books]);
    }

    public function searchForm()
    {
        if (auth()->user()->is_admin) {
            return view('books.searchForm');
        }
        return redirect('/');
    }

    public function  searchResult(Request $request)
    {
        $client = new \App\Services\GoogleBooksClient(config('services.google_books.key'));
        if ($request->has('keyword'))  {
            $keyword = $request->input('keyword');
            $books = $client->searchBook($keyword);
        } else {
            $books = $client->searchBook('books');
        }
        return view('books.searchResult', ['books' => $books]);
    }
}