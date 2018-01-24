<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index($lang, $category)
    {
        $category = DB::table('posts')
            ->where('cat_slug', $category)
            ->join('posts_lang', 'posts.slug', '=', 'posts_lang.slug')
            ->where('posts_lang.lang', $lang)
            ->get();

        var_dump($category); die();
//        return view('ins', ['data' => $obj->data]);
    }
}
