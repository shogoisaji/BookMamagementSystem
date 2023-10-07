<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockBook extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $primaryKey = 'stock_book_id';
    protected $fillable = [
        'stock_book_id',
        'title',
        'author',
        'isbn',
        'image',
    ];
}