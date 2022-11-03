<?php

namespace App\Http\Controllers;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    function manageCartByCustomer(Request $req){
        echo $req->txtPid;
        echo $req->txtUid;
        echo $req->txtQty;
    }
}
