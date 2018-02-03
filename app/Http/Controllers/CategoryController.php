<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index($lang)
    {
        config(['app.locale' => $lang]);

        $page = 0;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $posts = DB::table('posts')
            ->join('posts_lang', 'posts.slug', '=', 'posts_lang.slug')
            ->where('posts_lang.lang', $lang)->skip($page * 5)->take(5)
            ->get();

        return view('index', ['posts' => $posts, 'page' => $page, '']);
    }

    public function category($lang, $category)
    {
        config(['app.locale' => $lang]);

        $category = DB::table('posts')
            ->where('cat_slug', $category)
            ->join('posts_lang', 'posts.slug', '=', 'posts_lang.slug')
            ->where('posts_lang.lang', $lang)
            ->get();

        var_dump($category); die();
//        return view('ins', ['data' => $obj->data]);
    }
}
