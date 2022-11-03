<x-header/>
<div class="container-fluid">
        
        <div class="row">
            <h1 class="title">Sub Category Add</h1>
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                @if($errors)
                    @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                    @endforeach
                @endif
                
                <form action="{{URL::to('./admin/insertsubcategory')}}" method="POST" class="formRow" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="cid" class="form-label">Category : </label>
                        <select name="ddCid" id="cid"  class="form-select">
                            <option value="" disabled="disabled">Select Category</option>
                            @foreach($cresult as $c)
                                <option value="{{ $c->cid }}">{{ $c->name }}</option>
                            @endforeach
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
                    {{-- <div>
                    <label for="img" class="form-label">Photo : </label>
                    <input type="file" name="filePhoto" id="photo" value="<?php if(isset($photo)){ echo $photo; }?>" class="form-control" placeholder="Upload Photo"/>
                    </div> --}}
                    <div style="text-align:center">
                    
                    <input type="submit" name="btnInsert" id="insert" value="Insert" class="btn btn-success btn-small"/>
                    </div>
                    
                    
                </form>   
            </div>
            <div class="col-md-2"></div>
        </div>
        
    </div>
<x-footer/>