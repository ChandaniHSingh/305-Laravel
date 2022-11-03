{{-- /*
1. Create a PHP application “Electronic Item Repair”.
Admin :
Login
product_master- Product ID, Name, description.
Service provider registration -ID, Name, Password, Age, Contact Number, and Photo
Complain Allocation 
Complain Status – view all complains along with the status (New / Pending/ Completed)
Customer :
Registration -ID, Name, Password, Age, Contact Number, and Photo
Login
Complain – Complain, ProductID, Complain Description
View Status of Complains
Note : Complaintregistration and view status must be on the same page
Service Provider:
Login
View Complains
Update Status
*/ --}}

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
            <h1 class="title">Login</h1>
            <div class="col-md-3"></div>
            <div class="col-md-6 ">
                <form action="{{URL::to('./checklogin')}}" method="POST" class="formRow" enctype="multipart/form-data">
                    @csrf
                    <div>
                    <label for="email" class="form-label">Email : </label>
                    <input type="email" name="txtEmail" id="email" value="<?php if(isset($_COOKIE['email'])){  echo $_COOKIE['email']; }?>" class="form-control" placeholder="Email"/>
                    </div>
                    <div>
                    <label for="password" class="form-label">Password : </label>
                    <input type="password" name="txtPassword" id="password" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; }?>" class="form-control" placeholder="Password"/>
                    </div>
                    {{-- <div>
                    <label for="aos" class="form-label">Type of User : </label>
                    <select name="ddTOU" id="tou"  class="form-select"  >
                        <option value="" disabled="disabled">Select Type of User</option>
                        <option value="Admin">Admin</option>
                        <option value="Customer">Customer</option>
                        <option value="Service Provider">Service Provider</option>
                    </select>
                    
                    </div> --}}
                    <div>
                    <input type="checkbox" name="chkRemember" id="remember" class="form-check-input" value="RemenberMe" checked="checked"/>
                    <label class="form-check-label" for="remember">
                            Remember Me
                    </label>
                    
                    </div>
                    <div style="text-align:center;margin:10px">
                    
                    <input type="submit" name="btnLogin" id="login" value="Login" class="btn btn-success btn-small" style="margin:0"/>
                    Or 
                    <a href="{{URL::to('./registration')}}" style="text-decoration:none">New Register Here...</a> 
                    </div>
                    
                    
                </form>  
                
            </div>
            <div class="col-md-2">

            
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>
</body>

</html>