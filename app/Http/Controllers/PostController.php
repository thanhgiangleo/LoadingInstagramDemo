<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index($lang, $slug)
    {
        $post = DB::table('posts')
            ->where('slug', $slug)
            ->join('posts_lang', 'posts.id', '=', 'posts_lang.id_post')
            ->where('posts_lang.lang', $lang)
            ->get();

//        $post = DB::table('posts')->where('slug', $slug)->first();
        var_dump($post);
        die();
//        return view('ins', ['data' => $obj->data]);
    }

    public function insert()
    {
        $lang = 'vi';
        $slug = 'test-url';
        $title = 'test-title';
        $description = 'test-des';
        $cat_slug = 'test-cat';
        $create_date = Carbon::now();

        DB::table('posts')->insert([
            'slug' => $slug,
            'cate_slug' => $cat_slug,
            'create_date' => $create_date
        ]);

        DB::table('posts_lang')->insert([
            'slug' => $slug,
            'lang' => $lang,
            'title' => $title,
            'description' => $description
        ]);
    }
}
