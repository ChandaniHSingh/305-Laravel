<x-header/>

<div class="container-flcid" style="min-height:80vh">
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

    <hr>
    <div class="row tableRow">
        <h1 class="title">All Complains Raised By {{ $_SESSION['email'] }}</h1>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-hover table-primary table-bordered">
                <thead>
                    <th class="head">cid</th>
                    <th class="head">product</th>
                    <th class="head">Service Provider</th>
                    <th class="head">Description</th>
                    <th class="head">Status</th>
                </thead>
                <tbody>
                    @foreach($result as $r)      
                    <tr>
                        <td>{{ $r->cid }}</td>
                        @foreach($presult as $p)
                            @if($p->pid == $r->pid)
                                <td>{{ $p->name }}</td>
                                @break
                            @endif
                        @endforeach
                        @if($r->sp_uid == 0)
                            <td>Not Allocated</td>
                        @endif
                        @foreach($uresult as $c)
                            @if($c->uid == $r->sp_uid)
                                <td>{{ $c->name }}</td>
                                @break
                            @endif
                        @endforeach
                        <td>{{ $r->description }}</td>
                        <td>{{ $r->status }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <div class="col-md-1">
            <a href="{{URL::to('./customer/addcomplain')}}"><button class="btn btn-primary">Add</button></a>
        </div>
    </div>
    
</div>

<x-footer/>