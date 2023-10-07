<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\StockBook;
use Illuminate\Http\Request;

class RentalBookController extends Controller
{
    public function rental(Request $request, $id)
    {
        $stockBook = StockBook::find($id);
        if ($stockBook->is_rental) {
            return redirect()->back()->with('error', 'This book is already rented.');
        }

        $rental = new Rental;
        $rental->user_id = auth()->id();
        $rental->book_id = $stockBook->stock_book_id;
        $rental->rental_date = now();
        $rental->return_date = now()->addDays(7);
        $rental->save();

        $stockBook->is_rental = true;
        $stockBook->save();

        return redirect()->route('book.list')->with('success', 'The book has been rented.');
    }
}