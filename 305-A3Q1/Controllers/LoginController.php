<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // view login page
    function viewLogin(){
        return view('login');
    }

    // check login credentials 
    function checkLogin(Request $req){
        if(isset($req->btnLogin)){
            $email =  $req->txtEmail;
            $password = $req->txtPassword;
            // $tou = $req->ddTOU;
            $count = DB::table('eir_user')->where('email',$email)->where('password',$password)->count();
            if($count == 1){
                $result = DB::table('eir_user')->where('email',$email)->where('password',$password)->get();
                foreach($result as $r){       
                    if(isset($r->uid)){
                        if(isset($req->chkRemember)){
                            $rem = $req->chkRemember;
                            echo "<script>alert('Remember User');</script>";
                            setCookie('email',$email,time()+3600*24);
                            setCookie('password',$password,time()+3600*24);
                        }
                        $_SESSION['uid'] = $r->uid;
                        $_SESSION['email'] = $r->email;
                        $_SESSION['typeOfUser'] = $r->typeofuser;
                        $_SESSION['isLogin'] = true;
                        // $_SESSION['email'] = $r->email;
                        if($r->typeofuser == 'Admin'){
                            // dd("Chnadani");
                            return redirect('admin/home');
                        }
                        elseif($r->typeofuser == 'Customer'){
                            return redirect('customer/home');
                        }
                        elseif($r->typeofuser == 'Service Provider'){
                            return redirect('serviceprovider/home');
                        }
                    }
                    else{
                        echo "<script>alert('Inavlid User');</script>";
                    }
                }
            }
            else{
                echo "<script>alert('Inavlid User');</script>";
            }
            return redirect('login');
        }
        else{
            return redirect('login');
        }
    }
}
