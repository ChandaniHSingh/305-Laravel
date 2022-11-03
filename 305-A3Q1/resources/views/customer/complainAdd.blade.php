<x-header/>
<div class="container-fluid">
        
        <div class="row">
            <h1 class="title">Complain Add </h1>
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                @if($errors)
                    @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                    @endforeach
                @endif
                
                <form action="{{URL::to('./customer/insertcomplain')}}" method="POST" class="formRow" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="txtId" id="id" value="{{ $result->cid }}" class="form-control" placeholder="Complain-ID"/> --}}
                
                    <div>
                    <label for="pid" class="form-label">Product : </label>
                    <select name="ddPid" id="pid"  class="form-select">
                        @foreach($presult as $p)
                            <option value="{{ $p->pid }}">{{ $p->name }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div>
                    <label for="description" class="form-label">Description : </label>
                    <textarea name="txtDescription" id="description" cols="30" rows="5" class="form-control"></textarea>
                    </div>

 
                    <div style="text-align:center">
                    <input type="submit" name="btnInsert" id="insert" value="Insert" class="btn btn-success btn-small"/>
                    </div>
                    
                    
                </form>   
            </div>
            <div class="col-md-2"></div>
        </div>
        
    </div>
<x-footer/>