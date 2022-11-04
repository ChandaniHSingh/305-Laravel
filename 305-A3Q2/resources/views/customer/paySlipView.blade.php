<x-header/>
<div class="container-fluid" style="min-height:80vh">
    <div class="row tableRow">
        <h1 class="title">Payment Slip</h1>

        <hr>
        
        <div class="col-md-2"></div>
        <div class="col-md-8" style="text-align:center">
        
                
            {{-- <?php 
            $totalAmt = 0;
            $hasItem = false;
            $i = 0;
            $query = "select count(*) from sc_sales where uid = $uid and invoice_id = '$invoiceID'" ;
            $result = mysqli_query($con,$query);
            while($row =mysqli_fetch_row($result)){
                if($row[0] > 0){
                    $hasItem = true;
                }
            }
            if(!$hasItem){
            ?>
                <h3> No Item in Cart</h3>
            <?php
            }
            else{
            ?> --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <td>{{ $uresult->name }}</td>
                        <td rowspan="3"><img src="{{ asset('uploads/user/'.$uresult->photo) }}"/></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $uresult->email }}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{ $uresult->phone }}</td>
                    </tr>
                </thead>
            </table>    
            <table class="table table-bordered">
                {{-- <!-- <thead>
                    <tr>
                        <td>Invoice Number</td>
                        <td><?php echo $invoiceID?></td>
                    </tr>
                </thead> --> --}}
                <thead>
                    <tr>
                        <td>Sr.No.</td>
                        <td>Item Name</td>
                        <td>Qty</td>
                        <td>Price Per Pic</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $totalAmt = 0; 
                        $i = 0;
                    ?>
                    @foreach($result as $r)
                        <tr>
                            @foreach($presult as $p)
                                @if($p->pid == $r->pid)
                                    <?php
                                        $pName = $p->name;
                                        $actualPrice = $p->price;
                                    ?>
                                @endif
                            @endforeach
                            <?php
                                $ordQty = $r->qty;
                                $tempAmt = $actualPrice * $r->qty;
                                $totalAmt += $tempAmt;
                            ?>
                            <td>{{ ++$i }}</td>
                            <td>{{ $pName }}</td>
                            <td>{{ $ordQty }}</td>
                            <td>{{ $actualPrice }}</td>
                            <td>{{ $tempAmt }}</td>
                        </tr>
                    @endforeach
                </tbody>

                <thead>
                    <tr>
                        <th colspan="4" style="text-align:right">Grand Total Amount</th>
                        <th>{{ $totalAmt }}</th>
                        
                    </tr>
                    <tr>
                        <th colspan="4"></th>
                        <th><button type="button" class="btn btn-primary" onclick="window.print()">Print / Download Slip</button></th>
                        {{-- <!-- <th>
                            <form action="" method="post">
                                <input type="hidden" name="txtUid" value="<?php echo $uid ?>"/>
                                <button type="submit" class="btn btn-success" onclick="" name="btnConfirmOrder">Confirm Order</button>
                            </form>
                        </th> --> --}}
                    </tr>
                </thead>
            </table>
            {{-- <?php
            }
            ?> --}}
        <div class="col-md-1">
        
        </div>
    </div>
    
</div>
<x-footer/>