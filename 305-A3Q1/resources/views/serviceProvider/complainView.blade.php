<x-header/>

<div class="container-flcid" style="min-height:80vh">
    <div class="row tableRow">
        <h1 class="title">All Complains Allocated To {{ $_SESSION['email'] }}</h1>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-hover table-primary table-bordered">
                <thead>
                    <th class="head">cid</th>
                    <th class="head">product</th>
                    <th class="head">Customer</th>
                    <th class="head">Description</th>
                    <th class="head">Status</th>
                    <th class="head">Action</th>
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
                        <td>{{ $r->description }}</td>
                        <td>{{ $r->status }}</td>
                        <td>
                            @if($r->status == 'Pending')
                                <a href="{{URL::to('./serviceprovider/completecomplain/'.$r->cid)}}" class="btn btn-warning">{{ $r->status }}</a>
                            @endif
                            @if($r->status == 'Completed')
                                <b>{{ $r->status }}</b>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
    
</div>

<x-footer/>