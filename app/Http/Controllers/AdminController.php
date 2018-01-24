<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        session_start();

        if(!isset($_SESSION['isADMIN']))
            return view('404');
    }

    public function insert($lang)
    {
        return view('admin.post-insert');
    }

    public function update($lang, $slug)
    {
        $post = DB::table('posts')
            ->where('slug', $slug)
            ->first();

        $enLang = DB::table('posts_lang')
            ->where('slug', $slug)
            ->where('lang', 'en')
            ->first();

        $thaLang = DB::table('posts_lang')
            ->where('slug', $slug)
            ->where('lang', 'tha')
            ->first();

        return view('admin.post-insert', ['post' => $post, 'enLang' => $enLang, 'thaLang' => $thaLang]);
    }

    public function insertPostAction()
    {
        $slug = $_POST['slug'];
        $cat_slug = $_POST['category'];

        $enTitle = $_POST['en-title'];
        $enContent =  htmlentities($_POST['en-ckeditor']);

        $thaTitle = $_POST['tha-title'];
        $thaContent =  htmlentities($_POST['tha-ckeditor']);

        $this->insertPostDB($slug, $cat_slug);
        $this->insertPostLangDB($slug, 'en', $enTitle, $enContent);
        $this->insertPostLangDB($slug, 'tha', $thaTitle, $thaContent);
    }

    public function updatePostAction($id)
    {
        $slug = $_POST['slug'];
        $cat_slug = $_POST['category'];

        $enTitle = $_POST['en-title'];
        $enContent =  htmlentities($_POST['en-ckeditor']);

        $thaTitle = $_POST['tha-title'];
        $thaContent =  htmlentities($_POST['tha-ckeditor']);

        $oldSlug = $this->getSlug($id);

        $this->updatePostDb($id, $slug, $cat_slug);
        $this->updatePostLangDB($oldSlug, $slug, 'en', $enTitle, $enContent);
        $this->updatePostLangDB($oldSlug, $slug, 'tha', $thaTitle, $thaContent);
    }

    public function getSlug($id)
    {
        return DB::table('posts')
            ->where('id', $id)
            ->pluck('slug')
            ->first();
    }

    public function insertPostDB($slug, $cat_slug)
    {
        $create_date = Carbon::now();
        DB::table('posts')->insert([
            'slug' => $slug,
            'cat_slug' => $cat_slug,
            'create_date' => $create_date
        ]);
    }

    public function insertPostLangDB($slug, $lang, $title, $description)
    {
        DB::table('posts_lang')->insert([
            'slug' => $slug,
            'lang' => $lang,
            'title' => $title,
            'description' => $description
        ]);
    }

    public function updatePostDb($id, $slug, $cat_slug)
    {
        DB::table('posts')
            ->where('id', $id)
            ->update(['slug' => $slug,
                'cat_slug' => $cat_slug]);
    }

    public function updatePostLangDB($oldSlug, $slug, $lang, $title, $description)
    {
        DB::table('posts_lang')
            ->where('slug', $oldSlug)
            ->where('lang', $lang)
            ->update(['slug' => $slug,
                'title' => $title,
                'description' => $description]);
    }
}
