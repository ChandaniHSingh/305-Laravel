<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingReportController extends Controller
{
    
    function viewShoppingReportByAdmin(){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){
                $result = app(ShoppingReportController::class)->ajaxDateWiseSalesByAdmin(date('Y-m-d'),date('Y-m-d'));
                return view('admin/shoppingReportView',['result'=>$result]);

            }
            else{
                echo "<script>alert('Invalid User for this URL');</script>";
            }
        }
        else{
            echo "<script>alert('Please Login First..');</script>";
        }
    }

    function ajaxDateWiseSalesByAdmin($sdate,$edate){
        if(isset($_SESSION['isLogin']) && ($_SESSION['isLogin'] == true)){
            if(isset($_SESSION['typeOfUser']) && ($_SESSION['typeOfUser'] == "Admin")){

                $acount = 0;
                $dcount = 0;
                $acount = DB::table('sc_sales')->whereBetween('date_time',[$sdate,$edate])->count();
                if($acount > 1){
                    $result = DB::table('sc_sales')->whereBetween('date_time',[$sdate,$edate])->get();
                }
                else{
                    $dcount = DB::table('sc_sales')->whereBetween('date_time',[$edate,$sdate])->count();
                    $result = DB::table('sc_sales')->whereBetween('date_time',[$edate,$sdate])->get();
                }
                if($dcount > 1 || $acount > 1){
                    $res = "
                    <table class='table table-hover table-primary table-bordered'>
                        <thead>
                            <tr>
                                <th class='head'>sid</th>
                                <th class='head'>pid</th>
                                <th class='head'>qty</th>
                                <th class='head'>amt</th>
                                <th class='head'>date-Time</th>
                            </tr>
                        </thead>
                        <tbody>";
                    
                    foreach($result as $r){
                        $res .= "<tr>
                        <td>".$r->sid."</td>";
    
                        $pid = $r->pid;
                        $result2 = DB::table('sc_product')->where('pid',$pid)->get();
                        foreach($result2 as $r2){
                            $pname = $r2->name;
                        }
    
                        $res .= "<td>".$pname."</td>
                            <td>".$r->qty."</td>
                            <td>".$r->amt."</td>
                            <td>".$r->date_time."</td>
                            
                        </tr>";
                    }
                    $res .= "</tbody></table>";
                    return $res;
                }
                else{
                    return "<h3 class='title'>No Record Found</h3>";
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
}
