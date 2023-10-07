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
        $stockBook = StockBook::find($id);
        return view('books.detail', ['stock_book' => $stockBook]);
    }
}