<?php

namespace App\Http\Controllers;

class InstagramController extends Controller
{
   public function index()
   {
       $json = file_get_contents('https://api.instagram.com/v1/users/self/media/recent/?access_token=2207028252.6dd3f5d.8ee1b837794843389924fb27561c3fb2');
       $obj = json_decode($json);

       $year = date('Y', 1513703700);
       $month = date('M', 1513703700);

       return view('ins', ['data' => $obj->data]);
   }
}
