<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    // check Logout
    function checkLogout(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            // session_unset();
            unset($_SESSION['email']);
            unset($_SESSION['uid']);
            unset($_SESSION['name']);
            unset($_SESSION['photo']);
            unset($_SESSION['typeOfUser']);
            
            session_destroy();
            $_SESSION['isLogin'] = false;

            return redirect('login');
        }
    }
}
