<?php

namespace App\Http\Controllers;

class InstagramController extends Controller
{
    public function index()
    {
        $url = 'https://api.instagram.com/v1/users/2207028252/media/recent/?access_token=2207028252.6dd3f5d.8ee1b837794843389924fb27561c3fb2&count=-1&min_id=1580209093870638599_2207028252';
        $json = file_get_contents($url);
        $obj = json_decode($json);
        $data = $obj->data;
        $minId = $obj->pagination->next_max_id;
        dump($obj);
//        dump($data); die();
//        $json = file_get_contents($url . '&min_id=' . $minId);
//        $obj2 = json_decode($json);
//        $data2 = $obj2->data;
//        dump($data2);die();
//
//        array_merge($data, $obj2->data);
//        dump($data);die();

//        do {
//            $obj = json_decode($json);
//            $data = $obj->data;
//            $minId = $obj->pagination->next_max_id;
//            $json = file_get_contents($url . '&min_id=' . $minId);
//            dump($json);die();
//        } while (isset($json));
//        dump($data);
        $year = date('Y', 1513703700);
        $month = date('M', 1513703700);
//dump($obj);
        return view('ins', ['data' => $obj->data]);
    }
}
