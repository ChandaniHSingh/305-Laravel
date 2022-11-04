<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaySlipController extends Controller
{
    function viewPaySlipByCustomer($amt,$invoiceID){
        $uid = $_SESSION['uid'];
        $result = DB::table('sc_sales')->where('uid',$uid)->where('invoice_id',$invoiceID)->get();
        $presult = DB::table('sc_product')->get();
        $uresult = DB::table('sc_user')->where('uid',$_SESSION['uid'])->get();
        return view('customer/paySlipView',['result'=>$result,'presult'=>$presult,'uresult'=>$uresult[0]]);
    }
}
