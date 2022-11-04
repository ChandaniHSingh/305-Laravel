<x-header/>
<div class="container-fluid" style="min-height:80vh">
    <div class="row tableRow">
        <h1 class="title">Payment Gatway</h1>

        <hr>
        
        <div class="col-md-2"></div>
        <div class="col-md-8" style="text-align:center">
        
                
            <span style="font-size:large;font-weight:bold;margin-right:20px">Total : {{ $amt }}</span>
            
            <a href="{{ URL::to('customer/confirmpayment/'.$amt)}}" class="btn btn-success" >Confirm Payment</a>
            
                      
        </div>
        <div class="col-md-2">
        
        </div>
    </div>
    
</div>
<x-footer/>