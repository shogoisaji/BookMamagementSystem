<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static function search($keyword)
    {
        if(empty($keyword)){
            return static::query();
        }

        $search_columns = ['title'];

        $search_query = static::query();

        foreach($search_columns as $column){
            $search_query->orWhereRaw("$column &@~ ?", [$keyword]);
        }

        return $search_query;
    }
}