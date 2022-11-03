<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplainController extends Controller
{
    //================ Admin ==================
    // view Complain By Admin page
    function viewComplainByAdmin(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                $result = DB::table('eir_complain')->get();
                // $result = json_decode(json_encode($result,true));
                $presult = DB::table('eir_product')->get();
                $uresult = DB::table('eir_user')->get();
                return view('admin/complainView',['result'=>$result,'presult'=>$presult,'uresult'=>$uresult]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
        return redirect('./login');
    }

    // View Allocate Complain By Admin Page
    function allocateComplainByAdmin($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $result = DB::table('eir_complain')->where('cid',$id)->get();
                $result = $result[0];
                $presult = DB::table('eir_product')->get();
                $cresult = DB::table('eir_user')->where('typeofuser','Customer')->get();
                $spresult = DB::table('eir_user')->where('typeofuser','Service Provider')->get();

                return view('admin/complainEdit',['result'=>$result,'presult'=>$presult,'cresult'=>$cresult,'spresult'=>$spresult]);

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Update complain by ADMIN Logic
    function updateComplainByAdmin(Request $req){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $req->validate([
                    'ddSPid'=>'required'
                ],
                $messages=[
                    'ddSPid.required'=>'Please Select ServiceProvider'
                ]);

                DB::table('eir_complain')->where('cid','=',$req->txtId)->update([
                    'sp_uid' => $req->ddSPid,
                    'status' => 'Pending'
                ]);

                return redirect('./admin/viewcomplain');

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Delete Complain Logic
    function deleteComplainByAdmin($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                DB::table('eir_complain')->where('cid',$id)->delete();
                return redirect('./admin/viewcomplain');
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }


    //================ Customer ==================
    // view Complain By Customer page
    function viewComplainByCustomer(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Customer")){
                $result = DB::table('eir_complain')->where('c_uid',$_SESSION['uid'])->get();
                // $result = json_decode(json_encode($result,true));
                $presult = DB::table('eir_product')->get();
                $uresult = DB::table('eir_user')->get();
                return view('customer/complainView',['result'=>$result,'presult'=>$presult,'uresult'=>$uresult]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
        return redirect('./login');
    }

    // View Add Complain By Customer Page
    function addComplainByCustomer(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Customer")){
                $presult = DB::table('eir_product')->get();
                return view('customer/complainAdd',['presult'=>$presult]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    // Insert Complain By Customer Logic
    function insertComplainByCustomer(Request $req){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Customer")){

                if(isset($req->btnInsert)){
                    $req->validate([
                        'ddPid'=>'required',
                        'txtDescription'=>'required'
                    ],
                    $messages=[
                        'ddPid.required'=>'Please Select product',
                        'txtDescrition.required'=>'Please ENter Description'
                    ]);
            
                    $pid = $req->ddPid;
                    $description = $req->txtDescription;
                    
                    DB::table('eir_complain')->insert([
                        'c_uid' => $_SESSION['uid'],
                        // 'sp_uid' => 0,
                        'pid' => $req->ddPid, 
                        'description' => $req->txtDescription,
                        'status' => 'New'
                    ]);
            
                    return redirect('./customer/viewcomplain'); 
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

    //================ ServiceProvider ==================
    // view Complain By Service Provider page
    function viewComplainByServiceProvider(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Service Provider")){
                $result = DB::table('eir_complain')->where('sp_uid',$_SESSION['uid'])->get();
                // $result = json_decode(json_encode($result,true));
                $presult = DB::table('eir_product')->get();
                $uresult = DB::table('eir_user')->get();
                return view('serviceProvider/complainView',['result'=>$result,'presult'=>$presult,'uresult'=>$uresult]);
            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
        return redirect('./login');
    }

     // Complete Complain By Service Provider Logic
     function completeComplainByServiceProvider($id){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Service Provider")){

                DB::table('eir_complain')->where('cid','=',$id)->update([
                    'status' => 'Completed'
                ]);

                return redirect('serviceprovider/viewcomplain');

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
