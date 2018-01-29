<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InstagramController extends Controller
{
    public function index()
    {
        $url = 'https://api.instagram.com/v1/users/2207028252/media/recent/?access_token=2207028252.6dd3f5d.8ee1b837794843389924fb27561c3fb2&count=-1&min_id=1580209093870638599_2207028252';
        $json = file_get_contents($url);
        $obj = json_decode($json);
        $list = $obj->data;

        foreach ($list as $item) {
            if(!$this->getByIdIns($item->id)) {
                $year = date('Y', $item->created_time);
                $month = date('m', $item->created_time);
                $day = date('d', $item->created_time);
                $date = $day . '/' . $month . '/' . $year;

                $this->insertInstagramDB($item->images->standard_resolution->url, $item->link, $date, $item->id);
            }
        }

        $data = $this->getAll();
//        dump($data); die();
        return view('ins', ['data' => $data]);
    }

    public function view()
    {
        $data = DB::table('instagram')
            ->get();

        return view('instagram.index', ['data' => $data]);
    }

    public function insert()
    {
        return view('instagram.insert');
    }

    public function update($lang, $id)
    {
        $data = $this->getById($id);

        return view('instagram.insert', ['data' => $data]);
    }

    public function getAll()
    {
        return DB::table('instagram')
            ->orderBy('year')
            ->orderBy('month')
            ->orderBy('day')
            ->get();
    }

    public function getById($id)
    {
        return DB::table('instagram')
            ->where('id', $id)
            ->get();
    }

    public function getByIdIns($id)
    {
        return DB::table('instagram')
            ->where('idInstagram', $id)
            ->first();
    }

    public function insertInstagramAction()
    {
        $image = $_POST['image'];
        $link = $_POST['link'];
        $date = $_POST['date'];

        $this->insertInstagramDB($image, $link, $date);
    }

    public function insertInstagramDB($image, $link, $date, $idIns = '')
    {
        $arrDate = explode("/", $date);
        $create_date = Carbon::now();

        DB::table('instagram')->insert([
            'idInstagram' => $idIns,
            'image' => $image,
            'link' => $link,
            'day' => $arrDate[0],
            'month' => $arrDate[1],
            'year' => $arrDate[2],
            'create_date' => $create_date
        ]);
    }

    public function deleteInstagramDB($id)
    {
        return DB::table('instagram')
            ->where('id', $id)
            ->delete();
    }
}
