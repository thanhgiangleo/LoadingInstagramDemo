<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function login()
    {
        if(isset($_POST))
        {
            return view('admin.login');
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $correctUsername = env('ADMIN_USERNAME', 'admin');
        $correctPassword = env('ADMIN_PASSWORD', '123456');

        if($username == $correctUsername && $password == $correctPassword)
        {
            $_SESSION['isADMIN'] = true;
            return redirect('/ins');
        }
        else
        {
            return redirect('/login');
        }
    }
}
