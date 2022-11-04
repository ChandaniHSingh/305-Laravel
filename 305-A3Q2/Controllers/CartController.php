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

        if(isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == "POST")){
            if(isset($_POST['btnBuyNow'])){
                $uid = $req->txtUid;
                $pid = $req->txtPid;
                $qty = $req->txtQty;
                ////////
            }
            elseif(isset($_POST['btnAddToCart'])){
                $uid = $req->txtUid;
                $pid = $req->txtPid;
                $qty = $req->txtQty;
    
                
                // echo "<script>alert('Added Into Cart Successfully..');</script>";
                // header("location:./viewproduct");
    
                if(isset($_SESSION['my_cart'])){
                    $id = array_column($_SESSION['my_cart'],"PID");
                    if(in_array($req->txtPid,$id)){
                        foreach($_SESSION['my_cart'] as $key=>$value){
                            
                            $pid = $value['PID'];
                            if($req->txtPid == $pid){
                                $qty = $value['Qty'];
                                $qty  += $req->txtQty;
                                $value['Qty'] = $qty;
                                DB::table('sc_cart')->where('uid','=',$uid)->where('pid','=',$pid)->update([
                                    'qty' => $qty
                                ]);
                                // $query = mysqli_query($con,"update sc_cart set qty = $qty where uid = $uid and pid = $pid");
                            }
                        }
    
                        echo "<script>alert('Item Qty Incresed Added')</script>";
                        return redirect('./customer/viewproduct');
                    }
                    else{
                        DB::table('sc_cart')->insert([
                            'uid' => $uid,
                            'pid' => $pid,
                            'qty' => $qty,
                            'date_time' => now()
                        ]);
    
                        // $query = mysqli_query($con,"insert into sc_cart(uid,pid,qty,date_time) values($uid,$pid,$qty,now())");
    
                        $cnt = count($_SESSION['my_cart']);
                        $_SESSION['my_cart'][$cnt] = array("PID"=>$pid,"Qty"=>$qty);
                        echo "<script>alert('Item addedd')</script>";
                        return redirect('./customer/viewproduct');
                    }
    
                }
                else{
                    DB::table('sc_cart')->insert([
                        'uid' => $uid,
                        'pid' => $pid,
                        'qty' => $qty,
                        'date_time' => now()
                    ]);
    
                    // $query = mysqli_query($con,"insert into sc_cart(uid,pid,qty,date_time) values($uid,$pid,$qty,now())");
    
                    $_SESSION['my_cart'][0] = array("PID"=>$pid,"Qty"=>$qty);
                    echo "<script>alert('Item addedd First Time')</script>";
                    return redirect('./customer/viewproduct');
                }
            }
            else{
                echo "<script>alert('Add To Cart Not Clicked...')</script>";
                return redirect('./customer/viewproduct');
            }
    
            unset($_SESSION['my_cart']);
            $result = DB::table('sc_cart')->where('uid',$uid)->get();
            //$query = "select * from sc_cart where uid = $uid";
            //$result = mysqli_query($con,$query);
            $i = 0;
            foreach($result as $r){
                $_SESSION['my_cart'][$i] = array("PID"=>$r->pid,"Qty"=>$r->qty);
                $i++;
            }
            // while($row = mysqli_fetch_assoc($result)){
            //     $_SESSION['my_cart'][$i] = array("PID"=>$row['pid'],"Qty"=>$row['qty']);
            //     $i++;
            // }
        }
    }

    function viewCartByCustomer(){
        return view('customer/cartView');
    }

    function removeCartItemByCustomer($pid){
        echo "hii";
        $uid = $_SESSION['uid'];
        
        foreach($_SESSION['my_cart'] as $key=>$value){
            if($value['PID'] == $pid){
                unset($_SESSION['my_cart'][$key]);
            }
        }
        if(count($_SESSION['my_cart']) == 0){
            unset($_SESSION['my_cart']);
        }

        DB::table('sc_cart')->where('uid',$uid)->where('pid',$pid)->delete();
        return redirect('./customer/viewcart');
    }
}
