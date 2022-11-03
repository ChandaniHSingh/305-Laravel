<x-header/>

<div class="container-fluid" style="min-height:80vh">
    <div class="row tableRow">
        <h1 class="title">All Service Providers</h1>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-hover table-primary table-bordered">
                <thead>
                    <tr>
                        <td class="head">uid</td>
                        <td class="head">name</td>
                        <td class="head">email</td>
                        <td class="head">password</td>
                        <td class="head">age</td>
                        <td class="head">phone</td>
                        <td class="head">photo</td>
                        <td class="head" colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $r)      
                    <tr>
                        <td>{{ $r->uid }}</td>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->email }}</td>
                        <td>{{ $r->password }}</td>
                        <td>{{ $r->age }}</td>
                        <td>{{ $r->phone }}</td>
                        <td><a target="_blank" href="{{asset('./uploads/user/'.$r->photo)}}"><img src="{{asset('./uploads/user/'.$r->photo)}}" alt="{{ $r->photo }}" height="100px" width="100px"></a></td>
                        <td><a href="{{URL::to('./admin/editserviceprovider/'.$r->uid)}}"><button class="btn btn-warning">Edit</button></a></td>
                        <td><a href="{{URL::to('./admin/deleteserviceprovider/'.$r->uid)}}"><button class="btn btn-danger">Delete</button></a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <div class="col-md-1">
        <a href="{{URL::to('./admin/addserviceprovider')}}"><button class="btn btn-primary">Add</button></a>
        </div>
    </div>
    
</div>

<x-footer/>