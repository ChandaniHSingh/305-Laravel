<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmPaymentController extends Controller
{
    function viewConfirmPaymentByCustomer($amt){
        echo $amt;
        return view('customer/confirmPaymentView',['amt'=>$amt]);
    }

    function confirmPaymentByCustomer($amt){
        $uid = $_SESSION['uid'];
        $amt = $amt;

        foreach($_SESSION['my_cart'] as $key=>$value){
            $pid = $value['PID'];
            $ordQty = $value['Qty'];
            $presult = DB::table('sc_product')->where('pid',$pid)->get();
            foreach($presult as $p){
                $availQty = $p->avail_qty;
                $actualPrice = $p->price;
            }
            $tempAmt = $actualPrice * $ordQty;
            $newAvailQty = $availQty - $ordQty;
            DB::table('sc_product')->where('pid',$pid)->update([
                'avail_qty'=> $newAvailQty
            ]);
            DB::table('sc_cart')->where('uid',$uid)->where('pid',$pid)->delete();

            $invoiceID = date("Y-m-d-h:i:sa").$uid.$amt;

            DB::table('sc_sales')->insert([
                'invoice_id' => $invoiceID,
                'uid' => $uid,
                'pid' => $pid,
                'qty' => $ordQty,
                'amt' => $tempAmt,
                'date_time' => now()
            ]);
        }
        unset($_SESSION['my_cart']);
        echo "<script>alert('Payment Successfully..');</script>";
        return redirect('./customer/viewpayslip/'.$amt.'/'.$invoiceID);

    }
}
