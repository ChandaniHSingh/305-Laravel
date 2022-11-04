<x-header/>
<div class="container-fluid" style="min-height:80vh">
    <div class="row tableRow">
        <h1 class="title">My Cart</h1>
         {{-- <?php print_r($_SESSION['my_cart']);?>  --}}
        <hr>
        
        <div class="col-md-1"></div>
        <div class="col-md-10" style="text-align:center">
        
                
            <?php 
            $totalAmt = 0;
            
            ?>

            <div class="row">
            <?php 
                $uid = $_SESSION['uid'];
                $totalAmt = 0;
                if(isset($_SESSION['my_cart']) && count($_SESSION['my_cart']) > 0){
                        
                    foreach($_SESSION['my_cart'] as $key=>$value){
                    ?>
                    <?php 
                    // print_r($key);
                    // print_r($value);
                        $pid = $value['PID'];
                        $con = mysqli_connect("localhost","root","","305a3");
                        $query = "select * from sc_product where pid = $pid";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_assoc($result)){
                            $tempPhoto = $row['photo'];
                            $tempName = $row['name'];
                            $tempPrice = $row['price'];
                        }
                        $tempQty = $value['Qty'];
                        $tempAmt = $tempPrice * $value['Qty'];
                        $totalAmt += $tempAmt
                    ?>

                
                        <div class="col-md-2"></div>
                        <div class="card col-md-8" style="margin-bottom:10px">
                            <div class="row g-0">
                                
                                <div class="col-md-4">
                                <img src="{{asset('./uploads/product/'.$tempPhoto)}}" class="img-fluid rounded-start" alt="{{ $tempPhoto }}" style="width:250px;height:250px">
                                </div>
                                <div class="col-md-7">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $tempName }}</h3>
                                    <h5 class="card-text">Qty : <input type='number' value='{{ $tempQty }}' id="qty" style='width:50px' min='1' max='' name='numQty' ></h5>
                                    <h5 class="card-text">Price : {{ $tempPrice }}</h5>
                                    <h5 class="card-text">Amt : {{ $tempAmt }}</h5>

                                </div>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{ URL::to('customer/removecartitem/'.$pid) }}" class="btn btn-danger" style="text-align:center;margin-top:20px;font-weight:bold;padding:10px">X</a> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    <?php
                    }
                    ?>

                    <div class="row">
                                
                        <div class="col-md-2"></div>
                        <div class="col-md-8" style="text-align : right;display:flex;flex-direction: row;justify-content:flex-end;align-items:center;align-content:space-around">
                            <span style="font-size:large;font-weight:bold;margin-right:20px">Total : {{ $totalAmt }}</span>
                            {{-- <form action="" method="post"> --}}
                                <input type="hidden" name="txtUid" value="{{ $uid }}"/>
                                <input type="hidden" name="txtTotalAmt" value="{{ $totalAmt }}"/>
                                <a href="{{ URL::to('customer/viewconfirmpayment/'.$totalAmt) }}" class="btn btn-success">Go for Payment</a>
                                <!-- <button type="submit" class="btn btn-success" onclick="" name="btnPay">Go for Payment</button> -->
                            {{-- </form> --}}
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <?php    
                }
                elseif(!isset($_SESSION['my_cart']) || count($_SESSION['my_cart']) == 0){
                ?>
                <h3> No Item in Cart</h3>
                <?php
                }
                ?> 
                
            </div>
        <div class="col-md-1"></div>
    </div>
    
</div>

<x-footer/>