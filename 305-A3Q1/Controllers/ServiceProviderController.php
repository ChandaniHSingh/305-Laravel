<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceProviderController extends Controller
{
    // view Service Provider page
    function viewServiceProvider(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                $result = DB::table('eir_user')->where('typeofuser','Service Provider')->get();
                // $result = json_decode(json_encode($result,true));
                return view('admin/serviceProviderView',['result'=>$result]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // view add Service Provider page
    function addServiceProvider(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                return view('admin/serviceProviderAdd');
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Insert Service Provider Logic
    function insertServiceProvider(Request $req){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                if(isset($req->btnInsert)){
                    $req->validate([
                        'txtName'=>'required',
                        'txtEmail'=>'required',
                        'txtPassword'=>'required',
                        'txtAge'=>'required|integer|between:0,100',
                        'txtAge'=>'required|integer',
                        'filePhoto'=>'required'
                    ],
                    $messages=[
                        'txtName.required'=>'Please ENter Name',
                        'txtEmail.required'=>'Please ENter Email',
                        'txtPassword.required'=>'Please ENter Password',
                        'txtAge.required'=>'Please ENter Age',
                        'txtAge.integer'=>'Please Integer Age ',
                        'txtAge.between'=>'Enter Valid Age (0 - 100)',
                        'txtPhone.required'=>'Please ENter Phone',
                        'txtPhone.integer'=>'Please Integer Phone ',
                        'filePhoto.required'=>'Please Select Photo'
                    ]);
            
                    $name = $req->txtName;
                    $email = $req->txtEmail;
                    $password = $req->txtPassword;
                    $age = $req->txtAge;
                    $phone = $req->txtPhone;
                    $photo = $req->filePhoto;
            
                    $ext = $req->filePhoto->getClientOriginalExtension();
                    $oldfilename = $req->filePhoto->getClientOriginalName();
                    $basefilename = substr($oldfilename,0,strripos($oldfilename,'.'));
            
                    $newfilename = md5($basefilename).rand(10,100).'.'.$ext;
            
                    $req->filePhoto->move(public_path('uploads/user'),$newfilename);
            
                    DB::table('eir_user')->insert([
                        'name' => $req->txtName,
                        'email' => $req->txtEmail, 
                        'password' => $req->txtPassword,
                        'age' => $req->txtAge,
                        'phone' => $req->txtPhone,
                        'photo' => $newfilename,
                        'typeofuser' => 'Service Provider'
                    ]);
            
                    return redirect('./admin/viewserviceprovider'); 
                }

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // View Edit serviceProvider Page
    function editserviceProvider($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $result = DB::table('eir_user')->where('uid',$id)->where('typeofuser','Service Provider')->get();
                $result = $result[0];
                return view('admin/serviceProviderEdit',['result'=>$result]);

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Update serviceProvider Logic
    function updateserviceProvider(Request $req){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $req->validate([
                    'txtName'=>'required',
                    'txtEmail'=>'required',
                    'txtPassword'=>'required',
                    'txtAge'=>'required|integer|between:0,100',
                    'txtPhone'=>'required|integer'
                ],
                $messages=[
                    'txtName.required'=>'Please ENter Name',
                    'txtEmail.required'=>'Please ENter Email',
                    'txtPassword.required'=>'Please ENter Password',
                    'txtAge.required'=>'Please ENter Age',
                    'txtAge.integer'=>'Please Integer Age ',
                    'txtAge.between'=>'Enter Valid Age (0 - 100)',
                    'txtPhone.required'=>'Please ENter Phone',
                    'txtPhone.integer'=>'Please Integer Phone '
                ]);

                if($req->filePhoto != null){
                    
                    $result = DB::table('eir_user')->where('uid',$req->txtId)->where('typeofuser','Service Provider')->pluck('photo');
                    if($result[0] != null){
                        unlink(public_path('uploads/user/'.$result[0]));
                    }

                    $ext = $req->filePhoto->getClientOriginalExtension();
                    $oldfilename = $req->filePhoto->getClientOriginalName();
                    $basefilename = substr($oldfilename,0,strripos($oldfilename,'.'));
                    $newfilename = md5($oldfilename).rand(10,100).'.'.$ext;

                    $req->filePhoto->move(public_path('uploads/user'),$newfilename);

                    DB::table('eir_user')->where('uid','=',$req->txtId)->update([
                        'name' => $req->txtName,
                        'email' => $req->txtEmail, 
                        'password' => $req->txtPassword,
                        'age' => $req->txtAge,
                        'phone' => $req->txtPhone,
                        'photo' => $newfilename
                    ]);
                }
                else{
                    DB::table('eir_user')->where('uid','=',$req->txtId)->update([
                        'name' => $req->txtName,
                        'email' => $req->txtEmail, 
                        'password' => $req->txtPassword,
                        'age' => $req->txtAge,
                        'phone' => $req->txtPhone
                    ]);
                }
                return redirect('./admin/viewserviceprovider');

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Delete serviceProvider Logic
    function deleteserviceProvider($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $result = DB::table('eir_user')->where('uid',$id)->where('typeofuser','Service Provider')->pluck('photo');
                if($result[0] != null){
                    unlink(public_path('uploads/user/'.$result[0]));
                }
                
                DB::table('eir_user')->where('uid',$id)->where('typeofuser','Service Provider')->delete();
                return redirect('./admin/viewserviceprovider');

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }
}
