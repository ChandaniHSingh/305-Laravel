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
    <title>Electronic Item Repair</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
</head>

<body>
    <div class="container-fluid">
        
        <div class="row">
            <?php if(strcmp($tou,'Admin') == 0){?>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./home">Electronic Item Repair</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="/navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{URL::to('./admin/home')}}">Admin Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('./admin/viewproduct')}}">Product Master</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('./admin/viewserviceprovider')}}">Service Provider Master</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('./admin/viewcomplain')}}">View Complain</a>
                            </li>
                           
                        </ul>
                        <form class="d-flex" method="post">
                            <?php if($_SESSION['isLogin']){ ?>
                                {{-- <button class="btn btn-outline-primary" type="submit" name="btnLogout">Logout</button> --}}
                                <a class ="btn btn-outline-primary" href="{{URL::to('./checklogout')}}">Logout</a>
                            <?php } else{ ?>
                                <a class ="btn btn-outline-success" href="{{URL::to('./login')}}">Login</a>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </nav> 
             <?php } elseif(strcmp($tou,'Customer') == 0){?>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./home">Electronic Item Repair</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="/navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{URL::to('./customer/home')}}">Customer Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('./customer/viewcomplain')}}">View Complain</a>
                            </li>
                            
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="complainStatus">Complain Status</a>
                            </li> -->
                           
                        </ul>
                        <form class="d-flex" method="post">
                            <?php if($_SESSION['isLogin']){ ?>
                                {{-- <button class="btn btn-outline-primary" type="submit" name="btnLogout">Logout</button> --}}
                                <a class ="btn btn-outline-primary" href="{{URL::to('./checklogout')}}">Logout</a>
                            <?php } else{ ?>
                                <a class ="btn btn-outline-success" href="{{URL::to('./login')}}">Login</a>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </nav> 
            <?php } elseif(strcmp($tou,'Service Provider') == 0){?>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./home">Electronic Item Repair</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="/navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{URL::to('./serviceprovider/home')}}">Service Provider Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('./serviceprovider/viewcomplain')}}">Complain View</a>
                            </li>
                           
                        </ul>
                        <form class="d-flex" method="post">
                            <?php if($_SESSION['isLogin']){ ?>
                                {{-- <button class="btn btn-outline-primary" type="submit" name="btnLogout">Logout</button> --}}
                                <a class ="btn btn-outline-primary" href="{{URL::to('./checklogout')}}">Logout</a>
                            <?php } else{ ?>
                                <a class ="btn btn-outline-success" href="{{URL::to('./login')}}">Login</a>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </nav> 
            <?php } ?>
        </div>
    </div>