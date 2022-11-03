<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    // view sub category ByAdmin page
    function viewSubCategoryByAdmin(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                $result = DB::table('sc_sub_category')->get();
                // $result = json_decode(json_encode($result,true));
                $cresult = DB::table('sc_category')->get();
                return view('admin/subCategoryView',['result'=>$result,'cresult'=>$cresult]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // view add sub category ByAdmin page
    function addSubCategoryByAdmin(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                $cresult = DB::table('sc_category')->get();
                return view('admin/subCategoryAdd',['cresult'=>$cresult]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Insert subcategory ByAdmin Logic
    function insertSubCategoryByAdmin(Request $req){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                if(isset($req->btnInsert)){
                    $req->validate([
                        'ddCid'=>'required',
                        'txtName'=>'required',
                        'txtDescription'=>'required'
                    ],
                    $messages=[
                        'ddCid.required'=>'Please Select Category',
                        'txtName.required'=>'Please ENter Name',
                        'txtDescription.required'=>'Please ENter Description'
                    ]);

                    DB::table('sc_sub_category')->insert([
                        'cid' => $req->ddCid,
                        'name' => $req->txtName,
                        'description' => $req->txtDescription
                    ]);
            
                    return redirect('./admin/viewsubcategory'); 
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

    // View Edit subcategory ByAdmin Page
    function editSubCategoryByAdmin($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $result = DB::table('sc_sub_category')->where('scid',$id)->get();
                $result = $result[0];
                $cresult = DB::table('sc_category')->get();
                return view('admin/subCategoryEdit',['result'=>$result,'cresult'=>$cresult]);

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Update subcategory ByAdmin Logic
    function updateSubCategoryByAdmin(Request $req){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $req->validate([
                    'ddCid'=>'required',
                    'txtName'=>'required',
                    'txtDescription'=>'required'
                ],
                $messages=[
                    'ddCid.required'=>'Please Select Category',
                    'txtName.required'=>'Please ENter Name',
                    'txtDescription.required'=>'Please ENter Description'
                ]);

                DB::table('sc_sub_category')->where('scid','=',$req->txtId)->update([
                    'cid' => $req->ddCid,
                    'name'=> $req->txtName,
                    'description'=> $req->txtDescription
                ]);
                return redirect('./admin/viewsubcategory');

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Delete subcategory ByAdmin Logic
    function deleteSubCategoryByAdmin($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                
                DB::table('sc_sub_category')->where('scid',$id)->delete();
                return redirect('./admin/viewsubcategory');

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Ajax to return sub category ByAdmin Logic
    function ajaxSubCategoryByAdmin($id){
        $res = "<option >Select SubCategory</option>";
        $result = DB::table('sc_sub_category')->where('cid',$id)->get();
        foreach($result as $r){
            $res .= "<option value='".$r->scid."'>".$r->name."</option>"; 
        }
        return $res;
    }

    // Ajax to return sub category ByCustomer Logic
    function ajaxSubCategoryByCustomer($id){
        $res = "<option >Select SubCategory</option>";
        $result = DB::table('sc_sub_category')->where('cid',$id)->get();
        foreach($result as $r){
            $res .= "<option value='".$r->scid."'>".$r->name."</option>"; 
        }
        return $res;
    }
}
