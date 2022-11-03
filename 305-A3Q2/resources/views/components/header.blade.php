<?php  
   // session_start(); 
    $tou = $_SESSION['typeOfUser'];
    //print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shopping Cart</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

<body>
    <div class="container-fluid">
        
        <div class="row">
            <?php if(strcmp($tou,'Admin') == 0){?>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./home">Shopping Cart</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="/navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{URL::to('./admin/home')}}">Admin Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('./admin/viewcategory')}}">Category Master</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('./admin/viewsubcategory')}}">SubCategory Master</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('./admin/viewproduct')}}">Product Master</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('./admin/viewshoppingreport')}}">Shopping Report</a>
                            </li>
                           
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset("uploads/user/".$_SESSION['photo']) }}" width="50px" height="50px" style="border-radius:25px;height:50px;width:50px"/> {{ $_SESSION['name'] }}
                            </a>
                            <ul class="dropdown-menu">
                                <li style="text-align:center">
                                    <form class="d-flex" method="post">
                                        <?php if($_SESSION['isLogin']){ ?>
                                            <a class ="btn btn-outline-primary" href="{{URL::to('./checklogout')}}">Logout</a>
                                        <?php } else{ ?>
                                            <button class="btn btn-outline-success" type="submit">Login</button>
                                        <?php } ?>
                                    </form>
                                </li>
                            </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> 
             <?php } elseif(strcmp($tou,'Customer') == 0){?>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./home">Shopping Cart</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="/navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{URL::to('./customer/home')}}">Customer Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('./customer/viewproduct')}}">All Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('./customer/viewcart')}}">My Cart <span><?php if(isset($my_cart_count)){ echo "(".$my_cart_count.")";}?></span></a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset("uploads/user/".$_SESSION['photo']) }}" width="50px" height="50px" style="border-radius:25px;height:50px;width:50px"/> {{ $_SESSION['name'] }}
                            </a>
                            <ul class="dropdown-menu">
                                <li style="text-align:center">
                                    <form class="d-flex" method="post">
                                        <?php if($_SESSION['isLogin']){ ?>
                                            <a class ="btn btn-outline-primary" href="{{URL::to('./checklogout')}}">Logout</a>
                                        <?php } else{ ?>
                                            <button class="btn btn-outline-success" type="submit">Login</button>
                                        <?php } ?>
                                    </form>
                                </li>
                            </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> 
            <?php } ?>
        </div>
    </div>