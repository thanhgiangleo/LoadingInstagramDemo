<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InstagramController extends Controller
{
    public function index($lang)
    {
        config(['app.locale' => $lang]);
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
        return view('ins', ['data' => $data, 'dataFooter' => $this->getFooter()]);
    }

    public function view()
    {
        $data = DB::table('instagram')
            ->get();

        return view('admin.instagram-view', ['data' => $data, 'dataFooter' => $this->getFooter()]);
    }

    public function viewByMonth($lang, $monthName, $year)
    {
        config(['app.locale' => $lang]);
        $data = DB::table('instagram')
            ->where('year', $year)
            ->where('monthName', $monthName)
            ->get();

        return view('instagram.index', ['data' => $data, 'dataFooter' => $this->getFooter()]);
    }

    public function insert()
    {
        return view('admin.instagram-insert');
    }

    public function update($lang, $id)
    {
        config(['app.locale' => $lang]);
        $data = $this->getById($id);

        return view('admin.instagram-insert', ['data' => $data, 'dataFooter' => $this->getFooter()]);
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
            ->first();
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

    public function updateInstagramAction($id)
    {
        $image = $_POST['image'];
        $link = $_POST['link'];
        $date = $_POST['date'];

        $this->updateInstagramDB($id, $image, $link, $date);

        $url = $_SERVER['HTTP_ORIGIN'] . '/' . config('app.locale') . '/admin/instagram/';
        header("Location: $url" );
        die();
    }

    public function updateInstagramDB($id, $image, $link, $date)
    {
        $arrDate = explode("/", $date);

        $monthName = date('F', mktime(0, 0, 0, $arrDate[1], 10));

        DB::table('instagram')
            ->where('id', $id)
            ->update(['image' => $image,
                'link' => $link,
                'day' => $arrDate[0],
                'month' => $arrDate[1],
                'year' => $arrDate[2],
                'monthName' => $monthName
                ]);
    }

    public function insertInstagramDB($image, $link, $date, $idIns = '')
    {
        $arrDate = explode("/", $date);
        $create_date = Carbon::now();

        $monthName = date('F', mktime(0, 0, 0, $arrDate[1], 10));

        DB::table('instagram')->insert([
            'idInstagram' => $idIns,
            'image' => $image,
            'link' => $link,
            'day' => $arrDate[0],
            'month' => $arrDate[1],
            'year' => $arrDate[2],
            'create_date' => $create_date,
            'monthName' => $monthName
        ]);
    }

    public function deleteInstagramDB($id)
    {
        DB::table('instagram')
            ->where('id', $id)
            ->delete();

        $url = $_SERVER['HTTP_HOST'] . '/' . config('app.locale') . '/admin/instagram/';
        header("Location: $url" );
        die();
    }
}
