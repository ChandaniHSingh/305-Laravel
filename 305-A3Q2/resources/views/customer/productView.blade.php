<x-header/>
<div class="container-fluid" style="min-height:80vh">
    <div class="row tableRow">
        <h1 class="title">All Products</h1>
        <hr>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form action="" method="post" class="formRow" enctype="multipart/form-data">
              
                <div class="row">
                    <div class="col-md-6">
                        <label for="cid" class="form-label">Category : </label>
                        <select name="ddCid" id="cid"  class="form-select" onchange="subCategoryFun(this.value); productFun();">
                            <option value=''>Select Category</option>
                            @foreach($cresult as $c)
                                <option value="{{ $c->cid }}">{{ $c->name }}</option>
                                <?php $cur_cid = $c->cid;?>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <label for="scid" class="form-label">SubCategory : </label>
                            <select name='ddSCid' id='scid'  class='form-select' onchange="productFun();">
                                
                            </select>
                        </div>
                    </div>
                </div>

                
            </form>

            
            <div class="row" id="product">
                {{-- @foreach($result as $r)
            
                    <div class="col-md-3" style="margin-bottom:10px">
                        <div class="card">
                            <img style="height:300px" src="{{ asset("./uploads/product/".$r->photo)}}" class="card-img-top" alt="{{ $r->name }} Image"/>
                            <div class="card-body">
                                <h4 class="card-title">{{ $r->name }}</h4>
                                <p>{{ $r->price }} Rs.</p>
                                <form action="{{ URL::to('customer/manageCartByCustomer') }}" method="POST">
                                    @csrf
                                    <input type="hiiden" value="{{ $r->pid }}" name="txtPid">
                                    <input type="hidden" value="{{ $_SESSION["uid"] }}" name="txtUid">
                                    <input type="number" value="1" min="1" max="{{ $r->avail_qty }}" name="txtQty" style="float:left;width:50px"> 
                                    <button type="submit" class="btn btn-primary" name="btnAddToCart" style="float:right;width:auto">Add To Cart</button>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
            </div>
                    
        </div>
        <div class="col-md-1">
        
        </div>
    </div>
    
</div>

<script>

document.onLoad = productFun();

function subCategoryFun(catid){
    
//    alert("Your Browser not supporting AJAX...");

    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else if(window.ActiveXObject){
        xmlhttp = new ActiveXObject();
    }
    else{
        alert("Your Browser not supporting AJAX...");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            // alert(xmlhttp.responseText);
            document.getElementById('scid').innerHTML=xmlhttp.responseText;
            
        }
    }

    xmlhttp.open("GET","./ajaxSubCategoryByCustomer/"+catid);
    xmlhttp.send(null);
    document.getElementById('scid').value = "";

}

function productFun(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            // alert(xmlhttp.responseText);
          document.getElementById('product').innerHTML=xmlhttp.responseText;
        }
    }

    var cid = document.getElementById('cid').value;
    var scid = document.getElementById('scid').value;
    if(!cid){cid = 0;}
    if(!scid){scid = 0;}
    // alert(cid +" "+ scid);
    xmlhttp.open("GET","./ajaxProductByCustomer/"+cid+"/"+scid);
    xmlhttp.send(null);
}
</script>
<x-footer/>