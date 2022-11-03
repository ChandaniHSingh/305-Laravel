<x-header/>

<div class="container-fluid" style="min-height:80vh">
    <div class="row tableRow">
        <h1 class="title">All Products</h1>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-hover table-primary table-bordered">
                <thead>
                    <tr>
                        <td class="head">pid</td>
                        <td class="head">name</td>
                        <td class="head">description</td>
                        <td class="head">photo</td>
                        <td class="head" colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    
                    {{-- <?php 
                        $query = mysqli_query($con,"select * from eir_product");

                        while($row = mysqli_fetch_assoc($query)){
                            ?>
                            <tr>
                                <td><?php echo $row['pid']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['description']?></td>
                                <td><a target="_blank" href="./uploads/product/<?php echo $row['photo']?>"><img src="./uploads/product/<?php echo $row['photo']?>" alt="<?php echo $row['photo']?>"></a></td>
                                <td><a href="productEdit.php?typeOfUser=Admin&action=edit&eid=<?php echo $row['pid']?>"><button class="btn btn-warning">Edit</button></a></td>
                                <td><a href="productView.php?typeOfUser=Admin&action=delete&did=<?php echo $row['pid']?>"><button class="btn btn-danger">Delete</button></a></td>
                            </tr>

                            <?php
                        }
                        
                    ?> --}}

                    @foreach($result as $r)      
                    <tr>
                        <td>{{ $r->pid }}</td>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->description }}</td>
                        <td><a target="_blank" href="{{asset('./uploads/product/'.$r->photo)}}"><img src="{{asset('./uploads/product/'.$r->photo)}}" alt="{{ $r->photo }}" height="100px" width="100px"></a></td>
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