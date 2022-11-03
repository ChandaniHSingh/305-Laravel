<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // view home by Admin page
    function viewHomeByAdmin(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                $ccount = DB::table('sc_category')->count();
                $sccount = DB::table('sc_sub_category')->count();
                $pcount = DB::table('sc_product')->count();
                $ucount = DB::table('sc_user')->where('typeofuser','Customer')->count();

                return view('admin/home',['ccount'=>$ccount,'sccount'=>$sccount,'pcount'=>$pcount,'ucount'=>$ucount]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            return redirect('login');
        }
    }
    // view home by customer page
    function viewHomeByCustomer(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Customer")){
                return view('customer/home');
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            return redirect('login');
        }
    }
}
