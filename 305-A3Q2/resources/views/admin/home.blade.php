<x-header/>
<div class="container-fluid"  style="text-align:center;margin:20px">
        
    <!-- <img src="" width="50px" height="50px" style="border-radius:25px;height:50px;width:50px"/>  -->
            <img src="{{ asset('uploads/user/'.$_SESSION['photo']) }}" class="" alt="p1.jpg" style="border-radius:50%;height:400px;width:400px;">
            <h1>{{ $_SESSION['name'] }}</h1>
        
    </div>

    <div class="b-example-divider"></div>
    <br><hr><br>
    <div class="container-fluid">
        <div class="row" style="color:blue;text-align:center;font-size:bold">
            <div class="col-md-2"></div>
            <div class='col-md-2'>
                <div class='card' style='margin:10px;background-color:aliceblue'>
                    <div class='card-body'>
                        <h4 class='card-title'>Categories</h4>
                        <h4 style="color:deeppink">{{ $ccount }}</h4>
                    </div>
                </div>
            </div>
            <div class='col-md-2'>
                <div class='card' style='margin:10px;background-color:aliceblue'>
                    <div class='card-body'>
                        <h4 class='card-title'>SubCategories</h4>
                        <h4 style="color:deeppink">{{ $sccount }}</h4>
                    </div>
                </div>
            </div>
            <div class='col-md-2'>
                <div class='card' style='margin:10px;background-color:aliceblue'>
                    <div class='card-body'>
                        <h4 class='card-title'>Products</h4>
                        <h4 style="color:deeppink">{{ $pcount }}</h4>
                    </div>
                </div>
            </div>
            <div class='col-md-2'>
                <div class='card' style='margin:10px;background-color:aliceblue'>
                    <div class='card-body'>
                        <h4 class='card-title'>Customers</h4>
                        <h4 style="color:deeppink">{{ $ucount }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
<x-footer/>