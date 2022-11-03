<x-header/>
<div class="container-fluid">
        
        <div class="row">
            <h1 class="title">Product Add</h1>
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                @if($errors)
                    @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                    @endforeach
                @endif
                
                <form action="{{URL::to('./admin/insertproduct')}}" method="POST" class="formRow" enctype="multipart/form-data">
                    @csrf

                    <div>
                    <label for="cid" class="form-label">Category : </label>
                    <select name="ddCid" id="cid"  class="form-select" onchange="subCategoryFun(this.value);">
                        <option value="">Select Category</option>
                        @foreach($cresult as $c)
                            <option value="{{ $c->cid }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div>
                    <label for="scid" class="form-label">SubCategory : </label>
                    <select name='ddSCid' id='scid'  class='form-select'>
                        
                    </select>
                    </div>


                    <div>
                    <label for="name" class="form-label">Name : </label>
                    <input type="text" name="txtName" id="name" value="<?php if(isset($name)){ echo $name; }?>" class="form-control" placeholder="Name"/>
                    </div>
                    <div>
                    <label for="description" class="form-label">Description : </label>
                    <textarea name="txtDescription" id="description" cols="30" rows="5" class="form-control"><?php if(isset($description)){ echo $description; }?></textarea>
                    </div>
                    <div>
                    <label for="img" class="form-label">Photo : </label>
                    <input type="file" name="filePhoto" id="photo" value="<?php if(isset($photo)){ echo $photo; }?>" class="form-control" placeholder="Upload Photo"/>
                    </div>
                    <div>
                    <label for="availQty" class="form-label">Available Qty : </label>
                    <input type="number" name="txtAvailQty" id="availQty" value="<?php if(isset($availQty)){ echo $availQty; }?>" class="form-control" placeholder="Available Qty"/>
                    </div>
                    <div>
                    <label for="price" class="form-label">Price : </label>
                    <input type="number" name="txtPrice" id="price" value="<?php if(isset($price)){ echo $price; }?>" class="form-control" placeholder="Price"/>
                    </div>
                    <div style="text-align:center">
                    <input type="submit" name="btnInsert" id="insert" value="Insert" class="btn btn-success btn-small"/>
                    </div>
                    
                    
                </form>   
            </div>
            <div class="col-md-2"></div>
        </div>
        
    </div>

    <script>
        function subCategoryFun(catid){
        
        // alert("Your Browser not supporting AJAX...");
 
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
                    document.getElementById('scid').innerHTML=xmlhttp.responseText;
                }
            }
    
            xmlhttp.open("GET","./ajaxSubCategoryByAdmin/"+catid);
            xmlhttp.send(null);
 
        }
    </script>
<x-footer/>