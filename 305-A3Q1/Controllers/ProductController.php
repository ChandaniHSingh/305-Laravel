<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // view product page
    function viewProduct(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                $result = DB::table('eir_product')->get();
                // $result = json_decode(json_encode($result,true));
                return view('admin/productView',['result'=>$result]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // view add product page
    function addProduct(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                return view('admin/productAdd');
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Insert Product Logic
    function insertProduct(Request $req){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                if(isset($req->btnInsert)){
                    $req->validate([
                        'txtName'=>'required',
                        'txtDescription'=>'required',
                        'filePhoto'=>'required'
                    ],
                    $messages=[
                        'txtName.required'=>'Please ENter Name',
                        'txtDescription.required'=>'Please ENter Description',
                        'filePhoto.required'=>'Please Select Photo'
                    ]);
            
                    $name = $req->txtName;
                    $desciption = $req->txtDesciption;
                    $photo = $req->filePhoto;
            
                    $ext = $req->filePhoto->getClientOriginalExtension();
                    $oldfilename = $req->filePhoto->getClientOriginalName();
                    $basefilename = substr($oldfilename,0,strripos($oldfilename,'.'));
            
                    $newfilename = md5($basefilename).rand(10,100).'.'.$ext;
            
                    $req->filePhoto->move(public_path('uploads/product'),$newfilename);
            
                    DB::table('eir_product')->insert([
                        'name' => $req->txtName,
                        'description' => $req->txtDescription,
                        'photo' => $newfilename
                    ]);
            
                    return redirect('./admin/viewproduct'); 
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

    // View Edit Product Page
    function editProduct($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $result = DB::table('eir_product')->where('pid',$id)->get();
                $result = $result[0];
                return view('admin/productEdit',['result'=>$result]);

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Update Product Logic
    function updateProduct(Request $req){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $req->validate([
                    'txtName'=>'required',
                    'txtDescription'=>'required'
                ],
                $messages=[
                    'txtName.required'=>'Please ENter Name',
                    'txtDescription.required'=>'Please ENter Description'
                ]);

                if($req->filePhoto != null){
                    
                    $result = DB::table('eir_product')->where('pid',$req->txtId)->pluck('photo');
                    if($result[0] != null){
                        unlink(public_path('uploads/product/'.$result[0]));
                    }

                    $ext = $req->filePhoto->getClientOriginalExtension();
                    $oldfilename = $req->filePhoto->getClientOriginalName();
                    $basefilename = substr($oldfilename,0,strripos($oldfilename,'.'));
                    $newfilename = md5($oldfilename).rand(10,100).'.'.$ext;

                    $req->filePhoto->move(public_path('uploads/product'),$newfilename);

                    DB::table('eir_product')->where('pid','=',$req->txtId)->update([
                        'name'=> $req->txtName,
                        'description'=> $req->txtDescription,
                        'photo'=> $newfilename
                    ]);
                }
                else{
                    DB::table('eir_product')->where('pid','=',$req->txtId)->update([
                        'name'=> $req->txtName,
                        'description'=> $req->txtDescription
                    ]);
                }
                return redirect('./admin/viewproduct');

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Delete Product Logic
    function deleteProduct($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $result = DB::table('eir_product')->where('pid',$id)->pluck('photo');
                if($result[0] != null){
                    unlink(public_path('uploads/product/'.$result[0]));
                }
                
                DB::table('eir_product')->where('pid',$id)->delete();
                return redirect('./admin/viewproduct');

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


// if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
//     if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
//         //
//     }
//     else{
//         echo "<script>alert('Invalid User for this URL');</script>";
//     }
// }
// else{
//     echo "<script>alert('Please Login First..');</script>";
// }