<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    // view add Customer page
    function addCustomer(){
        return view('customerAdd');
    }

    // Insert Customer Logic
    function insertCustomer(Request $req){
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
    
            DB::table('sc_user')->insert([
                'name' => $req->txtName,
                'email' => $req->txtEmail, 
                'password' => $req->txtPassword,
                'age' => $req->txtAge,
                'phone' => $req->txtPhone,
                'photo' => $newfilename,
                'typeofuser' => 'Customer'
            ]);
    
            return redirect('./login'); 
        }
    }
}
