<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function index() : View
    {
        $posts = \App\Models\Post::query()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function search(Request $request) : View
    {
        $keyword = $request->input('keyword');

        $posts = \App\Models\Post::search($keyword)->paginate(10)->withQueryString();

        return view('posts.index', compact('posts', 'keyword'));
    }

}
