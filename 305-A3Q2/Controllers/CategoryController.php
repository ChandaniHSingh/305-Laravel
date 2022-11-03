<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // view category ByAdminpage
    function viewCategoryByAdmin(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                $result = DB::table('sc_category')->get();
                // $result = json_decode(json_encode($result,true));
                return view('admin/categoryView',['result'=>$result]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // view add category ByAdminpage
    function addCategoryByAdmin(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                return view('admin/categoryAdd');
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Insert category ByAdminLogic
    function insertCategoryByAdmin(Request $req){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                if(isset($req->btnInsert)){
                    $req->validate([
                        'txtName'=>'required',
                        'txtDescription'=>'required'
                    ],
                    $messages=[
                        'txtName.required'=>'Please ENter Name',
                        'txtDescription.required'=>'Please ENter Description'
                    ]);

                    DB::table('sc_category')->insert([
                        'name' => $req->txtName,
                        'description' => $req->txtDescription
                    ]);
            
                    return redirect('./admin/viewcategory'); 
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

    // View Edit category ByAdminPage
    function editCategoryByAdmin($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $result = DB::table('sc_category')->where('cid',$id)->get();
                $result = $result[0];
                return view('admin/categoryEdit',['result'=>$result]);

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Update category ByAdminLogic
    function updateCategoryByAdmin(Request $req){
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

                DB::table('sc_category')->where('cid','=',$req->txtId)->update([
                    'name'=> $req->txtName,
                    'description'=> $req->txtDescription
                ]);
                return redirect('./admin/viewcategory');

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Delete category ByAdminLogic
    function deletecategoryByAdmin($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                
                DB::table('sc_category')->where('cid',$id)->delete();
                return redirect('./admin/viewcategory');

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
