<x-header/>

<div class="container-fluid" style="min-height:80vh">
    <div class="row tableRow">
        <h1 class="title">All Products</h1>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-hover table-primary table-bordered">
                <thead>
                    <tr>
                        <th class="head">pid</th>
                        <th class="head">category</th>
                        <th class="head">sub category</th>
                        <th class="head">name</th>
                        <th class="head">description</th>
                        <th class="head">photo</th>
                        <th class="head">avail_qty</th>
                        <th class="head">price</th>
                        <th class="head" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($result as $r)      
                    <tr>
                        <td>{{ $r->pid }}</td>
                        @foreach($cresult as $c)
                            @if($r->cid == $c->cid)
                                <td>{{ $c->name }}</td>
                            @endif
                        @endforeach
                        @foreach($scresult as $sc)
                            @if($r->scid == $sc->scid)
                                <td>{{ $sc->name }}</td>
                            @endif
                        @endforeach
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->description }}</td>
                        <td><a target="_blank" href="{{asset('./uploads/product/'.$r->photo)}}"><img src="{{asset('./uploads/product/'.$r->photo)}}" alt="{{ $r->photo }}" height="100px" width="100px"></a></td>
                        <td>{{ $r->avail_qty }}</td>
                        <td>{{ $r->price }}</td>
                        <td><a href="{{URL::to('./admin/editproduct/'.$r->pid)}}"><button class="btn btn-warning">Edit</button></a></td>
                        <td><a href="{{URL::to('./admin/deleteproduct/'.$r->pid)}}"><button class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <div class="col-md-1">
        <a href="{{URL::to('./admin/addproduct')}}"><button class="btn btn-primary">Add</button></a>
        </div>
    </div>
    
</div>

<x-footer/>