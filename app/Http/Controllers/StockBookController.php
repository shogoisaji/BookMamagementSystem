<?php

namespace App\Http\Controllers;

use App\Models\StockBook;
use Illuminate\Http\Request;

class StockBookController extends Controller
{
    public function list()
    {
    $stockBooks = StockBook::paginate(10);

    return view('books.list', ['stock_books' => $stockBooks, 'bookPaginator' => $stockBooks]);
    }

    

    public function detail($id)
    {
        $stockBook = StockBook::with(['comments.user'])->find($id);
        return view('books.detail', ['stock_book' => $stockBook]);
    }

    // request -> isbn
    public function store(Request $request)
    {
        $client = new \App\Services\GoogleBooksClient(config('services.google_books.key'));
        $book = $client->searchBook($request->isbn);
        $stockBook = new StockBook();
        // dd($book);
        $stockBook->title = $book[0]->volumeInfo->title ?? 'no title';
        $stockBook->author = $book[0]->volumeInfo->authors[0] ?? 'null';
        $stockBook->isbn = $book[0]->volumeInfo->industryIdentifiers[1]->identifier ?? '1234567891012';
        $stockBook->image = $book[0]->volumeInfo->imageLinks->thumbnail ?? null;
        $stockBook->save();

        return redirect()->route('book.list');
    }
}