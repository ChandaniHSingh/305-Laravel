<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Item Repair</title>
     <link rel="stylesheet" href="../resources/css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
   
</head>

<body>
    <div class="container-fluid">
        
        <div class="row">
        
        <h1 class="title">Electronic Item Repair</h1>
            
        </div>
    </div>

    <div class="container-fluid">
        
        <div class="row">
            <h1 class="title">Customer Registration</h1>
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                @if($errors)
                    @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                    @endforeach
                @endif
                
                <form action="{{URL::to('./insertcustomer')}}" method="POST" class="formRow" enctype="multipart/form-data">
                    @csrf
                <!--    
                    <div>
                    <label for="uid" class="form-label">customer ID : </label>
                    <input type="text" name="txtuid" id="uid" value="<?php if(isset($uid)){ echo $uid; }?>" class="form-control" placeholder="Registration-ID"/>
                    </div>
                -->
                    <div>
                    <label for="name" class="form-label">Name : </label>
                    <input type="text" name="txtName" id="name" value="<?php if(isset($name)){ echo $name; }?>" class="form-control" placeholder="Name"/>
                    </div>
                    <div>
                    <label for="email" class="form-label">Email : </label>
                    <input type="email" name="txtEmail" id="email" value="<?php if(isset($email)){ echo $email; }?>" class="form-control" placeholder="Email"/>
                    </div>
                    <div>
                    <label for="password" class="form-label">Password : </label>
                    <input type="password" name="txtPassword" id="password" value="<?php if(isset($password)){ echo $password; }?>" class="form-control" placeholder="Password"/>
                    </div>
                    <div>
                    <label for="age" class="form-label">Age : </label>
                    <input type="text" name="txtAge" id="age" value="<?php if(isset($age)){ echo $age; }?>" class="form-control" placeholder="Age"/>
                    </div>
                    <div>
                    <label for="phone" class="form-label">Phone : </label>
                    <input type="text" name="txtPhone" id="phone" value="<?php if(isset($phone)){ echo $phone; }?>" class="form-control" placeholder="Phone"/>
                    </div>
                    <div>
                    <label for="photo" class="form-label">Photo : </label>
                    <input type="file" name="filePhoto" id="photo" value="<?php if(isset($photo)){ echo $photo; }?>" class="form-control" placeholder="Upload photo"/>
                    </div>
                    <div style="text-align:center">
                    
                    <input type="submit" name="btnInsert" id="insert" value="Insert" class="btn btn-success btn-small"/>
                    </div>
                    
                    
                </form>   
            </div>
            <div class="col-md-2"></div>
        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>
</body>

</html>