<x-header/>
<div class="container-fluid">
        
        <div class="row">
            <h1 class="title">Sub Category Edit</h1>
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                @if($errors)
                    @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                    @endforeach
                @endif
                
                <form action="{{URL::to('./admin/updatesubcategory')}}" method="POST" class="formRow" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="txtId" value="{{$result->scid}}"/>
                    <div>
                        <label for="cid" class="form-label">Category : </label>
                        <select name="ddCid" id="cid"  class="form-select">
                            <option value="" disabled="disabled">Select Category</option>
                            @foreach($cresult as $c)
                                <option value="{{ $c->cid }}" <?php if($c->cid == $result->cid){ ?> selected="selected" <?php } ?>>{{ $c->name }}</option>
                            @endforeach
                        </select>
                        </div>
                    <div>
                    <div>
                    <label for="name" class="form-label">Name : </label>
                    <input type="text" name="txtName" id="name" value="{{$result->name}}" class="form-control" placeholder="Name"/>
                    </div>
                    <div>
                    <label for="description" class="form-label">Description : </label>
                    <textarea name="txtDescription" id="description" cols="30" rows="5" class="form-control">{{$result->description}}</textarea>
                    </div>
                    <div>
                    <label for="img" class="form-label">Photo : </label>
                    <input type="file" name="filePhoto" id="photo" value="{{$result->photo}}" class="form-control" placeholder="Upload Photo"/>
                    </div>
                    <div style="text-align:center">
                    
                    <input type="submit" name="btnUpdate" id="update" value="Update" class="btn btn-success btn-small"/>
                    </div>
                    
                    
                </form>   
            </div>
            <div class="col-md-2"></div>
        </div>
        
    </div>
<x-footer/>