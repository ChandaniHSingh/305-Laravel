<x-header/>
<div class="container-fluid">
        
        <div class="row">
            <h1 class="title">Product Edit</h1>
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                @if($errors)
                    @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                    @endforeach
                @endif
                
                <form action="{{URL::to('./admin/updateproduct')}}" method="POST" class="formRow" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="txtId" value="{{$result->pid}}"/>

                    {{-- <div>
                    <label for="cid" class="form-label">Category : </label>
                    <select name="ddCid" id="cid"  class="form-select" readonly="readonly">
                        <option value="">Select Category</option>
                        @foreach($cresult as $c)
                            <option value="{{ $c->cid }}" <?php if($c->cid == $result->cid){ ?> selected="selected" <?php } ?>>{{ $c->name }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div>
                    <label for="scid" class="form-label">SubCategory : </label>
                    <select name='ddSCid' id='scid'  class='form-select'  readonly="readonly">
                        <option value="">Select SubCategory</option>
                        @foreach($scresult as $sc)
                            <option value="{{ $sc->scid }}" <?php if($sc->scid == $result->scid){ ?> selected="selected" <?php } ?>>{{ $sc->name }}</option>
                        @endforeach
                    </select>
                    </div> --}}
                    <div>
                    <label for="cid" class="form-label">Category : </label>
                    @foreach($cresult as $c)
                        @if($c->cid == $result->cid)
                            <input type="text" value="{{ $c->name }}" class="form-control" disabled="disabled"/>
                        @endif
                    @endforeach
                    </div>

                    <div>
                    <label for="scid" class="form-label">SubCategory : </label>
                    @foreach($scresult as $sc)
                        @if($sc->scid == $result->scid)
                            <input type="text" value="{{ $sc->name }}" class="form-control" disabled="disabled"/>
                        @endif
                    @endforeach
                    </div>
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
                    <div>
                    <label for="availQty" class="form-label">Available Qty : </label>
                    <input type="number" name="txtAvailQty" id="availQty" value="{{$result->avail_qty}}" class="form-control" placeholder="Available Qty"/>
                    </div>
                    <div>
                    <label for="price" class="form-label">Price : </label>
                    <input type="number" name="txtPrice" id="price" value="{{$result->price}}" class="form-control" placeholder="Price"/>
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