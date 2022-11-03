<x-header/>

<div class="container-flcid" style="min-height:80vh">
    <div class="row tableRow">
        <h1 class="title">All Complains</h1>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-hover table-primary table-bordered">
                <thead>
                    <tr>
                        <td class="head">cid</td>
                        <td class="head">product</td>
                        <td class="head">customer</td>
                        <td class="head">Service Provider</td>
                        <td class="head">Description</td>
                        <td class="head">Status</td>
                        <td class="head" colspan="2">Action</td>
                    </tr>
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
                        @foreach($uresult as $c)
                            @if($c->uid == $r->c_uid)
                                <td>{{ $c->name }}</td>
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
                        <td><a href="{{URL::to('./admin/allocatecomplain/'.$r->cid)}}"><button class="btn btn-warning">Allocate</button></a></td>
                        <td><a href="{{URL::to('./admin/deletecomplain/'.$r->cid)}}"><button class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
    
</div>

<x-footer/>