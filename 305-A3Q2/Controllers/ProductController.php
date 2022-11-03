<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // view productByAdmin page
    function viewProductByAdmin(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                $result = DB::table('sc_product')->get();
                // $result = json_decode(json_encode($result,true));
                $cresult = DB::table('sc_category')->get();
                $scresult = DB::table('sc_sub_category')->get();
                return view('admin/productView',['result'=>$result,'cresult'=>$cresult,'scresult'=>$scresult]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // view add productByAdmin page
    function addProductByAdmin(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                $cresult = DB::table('sc_category')->get();
                $scresult = DB::table('sc_sub_category')->get();
                return view('admin/productAdd',['cresult'=>$cresult,'scresult'=>$scresult]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Insert Product ByAdmin Logic
    function insertProductByAdmin(Request $req){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                if(isset($req->btnInsert)){
                    $req->validate([
                        'ddCid'=>'required',
                        'ddSCid'=>'required',
                        'txtName'=>'required',
                        'txtDescription'=>'required',
                        'filePhoto'=>'required',
                        'txtAvailQty'=>'required|integer',
                        'txtPrice'=>'required|integer'
                    ],
                    $messages=[
                        'ddCid.required'=>'Please Select Category',
                        'ddSCid.required'=>'Please Select Sub Category',
                        'txtName.required'=>'Please ENter Name',
                        'txtDescription.required'=>'Please ENter Description',
                        'filePhoto.required'=>'Please Select Photo',
                        'txtAvailQty.required'=>'Please ENter AvailQty',
                        'txtAvailQty.integer'=>'Please Integer AvailQty ',
                        'txtPrice.required'=>'Please ENter Price',
                        'txtPrice.integer'=>'Please Integer Price'
                    ]);
            
                    $ext = $req->filePhoto->getClientOriginalExtension();
                    $oldfilename = $req->filePhoto->getClientOriginalName();
                    $basefilename = substr($oldfilename,0,strripos($oldfilename,'.'));
            
                    $newfilename = md5($basefilename).rand(10,100).'.'.$ext;
            
                    $req->filePhoto->move(public_path('uploads/product'),$newfilename);
            
                    DB::table('sc_product')->insert([
                        'cid' => $req->ddCid,
                        'scid' => $req->ddSCid,
                        'name' => $req->txtName,
                        'description' => $req->txtDescription,
                        'photo' => $newfilename,
                        'avail_qty' => $req->txtAvailQty,
                        'price' => $req->txtPrice
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

    // View Edit Product ByAdmin Page
    function editProductByAdmin($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $result = DB::table('sc_product')->where('pid',$id)->get();
                $result = $result[0];
                $cresult = DB::table('sc_category')->get();
                $scresult = DB::table('sc_sub_category')->get();
                return view('admin/productEdit',['result'=>$result,'cresult'=>$cresult,'scresult'=>$scresult]);

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Update Product ByAdmin Logic
    function updateProductByAdmin(Request $req){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $req->validate([
                    'txtName'=>'required',
                    'txtDescription'=>'required',
                    'txtAvailQty'=>'required|integer',
                    'txtPrice'=>'required|integer'
                ],
                $messages=[
                    'txtName.required'=>'Please ENter Name',
                    'txtDescription.required'=>'Please ENter Description',
                    'txtAvailQty.required'=>'Please ENter AvailQty',
                    'txtAvailQty.integer'=>'Please Integer AvailQty ',
                    'txtPrice.required'=>'Please ENter Price',
                    'txtPrice.integer'=>'Please Integer Price'
                ]);

                if($req->filePhoto != null){
                    
                    $result = DB::table('sc_product')->where('pid',$req->txtId)->pluck('photo');
                    if($result[0] != null){
                        unlink(public_path('uploads/product/'.$result[0]));
                    }

                    $ext = $req->filePhoto->getClientOriginalExtension();
                    $oldfilename = $req->filePhoto->getClientOriginalName();
                    $basefilename = substr($oldfilename,0,strripos($oldfilename,'.'));
                    $newfilename = md5($oldfilename).rand(10,100).'.'.$ext;

                    $req->filePhoto->move(public_path('uploads/product'),$newfilename);

                    DB::table('sc_product')->where('pid','=',$req->txtId)->update([
                        'name' => $req->txtName,
                        'description' => $req->txtDescription,
                        'photo' => $newfilename,
                        'avail_qty' => $req->txtAvailQty,
                        'price' => $req->txtPrice
                    ]);
                }
                else{
                    DB::table('sc_product')->where('pid','=',$req->txtId)->update([
                        'name' => $req->txtName,
                        'description' => $req->txtDescription,
                        'avail_qty' => $req->txtAvailQty,
                        'price' => $req->txtPrice
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

    // Delete Product ByAdmin Logic
    function deleteProductByAdmin($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $result = DB::table('sc_product')->where('pid',$id)->pluck('photo');
                if($result[0] != null){
                    unlink(public_path('uploads/product/'.$result[0]));
                }
                
                DB::table('sc_product')->where('pid',$id)->delete();
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

    // view Product ByCustomer page
    function viewProductByCustomer(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Customer")){
                $result = DB::table('sc_product')->get();
                // $result = json_decode(json_encode($result,true));
                $cresult = DB::table('sc_category')->get();
                $scresult = DB::table('sc_sub_category')->get();
                return view('customer/productView',['result'=>$result,'cresult'=>$cresult,'scresult'=>$scresult]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // AJAX for get product by category and subcategory
    function ajaxProductByCustomer($cid,$scid){
        $res = "";
        
        if($cid == 0 && $scid == 0){
            $result = DB::table('sc_product')->get();
        }
        elseif($cid != 0 && $scid == 0){
            $result = DB::table('sc_product')->where('cid',$cid)->get();
        }
        elseif($cid != 0 && $scid != 0){
            $result = DB::table('sc_product')->where('cid',$cid)->where('scid',$scid)->get();
        }
        // return view('customer/productView',['result'=>$result]);
        foreach($result as $r){
            
            $res .= "<div class='col-md-3' style='margin-bottom:10px'>";
            $res .= "<div class='card'>";
            $res .= "<img style='height:300px' src='".asset('./uploads/product/'.$r->photo)."' class='card-img-top' alt='".$r->name." Image'/>";
            $res .= "<div class='card-body'>";
            $res .= "<h4 class='card-title'>".$r->name."</h4>";
            $res .= "<p>".$r->price." Rs.</p>";
            $res .= "<form action='./manageCartByCustomer' method='POST'>";
            $res .= "<input type='hidden' value='".csrf_token()."' name='_token'>";
            $res .= "<input type='hidden' value='".$r->pid."' name='txtPid'>";
            $res .= "<input type='hidden' value='".$_SESSION['uid']."' name='txtUid'>";
            $res .= "<input type='number' value='1' min='1' max='".$r->avail_qty."' name='txtQty' style='float:left;width:50px'> ";
            // $res .= "<button type='submit' class='btn btn-success' name='btnBuyNow' style='float:left;width:auto;margin-left:50px'>Buy Now</button>";
            $res .= "<button type='submit' class='btn btn-primary' name='btnAddToCart' style='float:right;width:auto'>Add To Cart</button>";
            // $res .= "</input>";
            $res .= "</form>";
            $res .= "</div>";
            $res .= "</div>";
            $res .= "</div>";
        }
        return $res;
    }
}
