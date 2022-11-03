<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // view home page
    function viewHome(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            return view('home');
        }
        else{
            return redirect('login');
        }
    }
}
