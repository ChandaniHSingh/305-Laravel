<x-header/>
<div class="container-fluid">
        
        <div class="row">
            <h1 class="title">Complain Update ( Allocation ) </h1>
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                @if($errors)
                    @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                    @endforeach
                @endif
                
                <form action="{{URL::to('./admin/updatecomplain')}}" method="POST" class="formRow" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="txtId" id="id" value="{{ $result->cid }}" class="form-control" placeholder="Complain-ID"/>
                
                    <div>
                    <label for="pid" class="form-label">Product : </label>
                    <select name="ddPid" id="pid"  class="form-select" disabled="disabled">
                        @foreach($presult as $p)
                            <option value="{{ $p->pid }}" <?php if($result->pid == $p->pid){ ?>selected = "selected" <?php } ?>>{{ $p->name }}</option>
                        @endforeach
                    </select>
                    </div>
 
                    <div>
                    <label for="cid" class="form-label">Customer : </label>
                    <select name="ddCid" id="cid"  class="form-select" disabled="disabled">
                        @foreach($cresult as $c)
                            <option value="{{ $c->uid }}" <?php if($result->c_uid == $c->uid){ ?>selected = "selected" <?php } ?>>{{ $c->name }}</option>
                        @endforeach
                    </select>
                    </div>

                    <div>
                    <label for="spid" class="form-label">Service Provider : </label>
                    <select name="ddSPid" id="spid"  class="form-select" <?php if($result->status == 'Completed'){ ?> disabled="disabled" <?php } ?>>
                        @foreach($spresult as $sp)
                            <option value="{{ $sp->uid }}" <?php if($result->sp_uid == $sp->uid){ ?>selected = "selected" <?php } ?>>{{ $sp->name }}</option>
                            {{-- <option value="{{ $sp->uid }}">{{ $sp->name }}</option> --}}
                        @endforeach
                    </select>
                    </div>

                    <div>
                    <label for="description" class="form-label">Description : </label>
                    <textarea name="txtDescription" id="description" cols="30" rows="5" class="form-control" disabled="disabled">{{ $result->description }}</textarea>
                    </div>

 {{--                   <div>
                    <label for="status" class="form-label">Status : </label>
                    <select name="ddStatus" id="spuid"  class="form-select" <?php if($tou == 'Admin' || $status == 'Completed'){?> disabled="disabled" <?php }?> >
                        
                        <option value="Pending" <?php if($status == 'Pending'){ ?>selected = "selected" <?php } ?>>Pending</option>
                        <option value="Completed" <?php if($status == 'Completed'){ ?>selected = "selected" <?php } ?>>Completed</option>
                        
                    </select>
                    </div> --}}
                    
                    <?php if($result->status != 'Completed'){?>
                    <div style="text-align:center">
                    <input type="submit" name="btnUpdate" id="update" value="Update" class="btn btn-success btn-small"/>
                    </div>
                    <?php } ?>
                    
                    
                </form>   
            </div>
            <div class="col-md-2"></div>
        </div>
        
    </div>
<x-footer/>