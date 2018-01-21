<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index($lang, $slug)
    {
        $category = DB::table('posts')
            ->where('cat_slug', $slug)
            ->join('posts_lang', 'posts.id', '=', 'posts_lang.id_post')
            ->where('posts_lang.lang', $lang)
            ->get();

        var_dump($category); die();
//        return view('ins', ['data' => $obj->data]);
    }
}
