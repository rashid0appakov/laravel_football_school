<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class PostController extends Controller
{
    public function index(){
        $news = News::all();
        return view('posts.index', compact('news'));
    }

    public function show($news_id)
    {
        $new = News::find($news_id);
        $news = News::all();
        return view('posts.show', compact('new', 'news'));
    }

}
