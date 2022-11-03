<x-header/>

<div class="container-fluid" style="min-height:80vh" onload="dateWiseSalesFun()">
    <div class="row tableRow">
        <h1 class="title">All Sales</h1>
        <hr>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <form action="" method="post" class="formRow" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="col-md-6">
                        <label for="scid" class="form-label">Start Date : </label>
                        <input type="date" name="startDate" class="form-control" id="sdate" value="<?php echo date('Y-m-d')?>" onchange="dateWiseSalesFun();">
                    </div>
                    <div class="col-md-6">
                        <label for="scid" class="form-label">End Date : </label>
                        <input type="date" name="endDate" class="form-control" id="edate" value="<?php echo date('Y-m-d')?>" onchange="dateWiseSalesFun();">
                    
                    </div>
                </div>

                
            </form>

            
            <div class="row" id="showData">
            </div>
                    
        </div>
        <div class="col-md-1">
        
        </div>
    </div>
    
</div>

<script>
    //document.getElementById("edate").value = new Date();
    function dateWiseSalesFun(){

        // var ssdate = new Date("2000-01-01");
        var sdate = document.getElementById("sdate").value;
        var edate = document.getElementById("edate").value;
    
    // alert("Your Browser not supporting AJAX...");

    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            document.getElementById('showData').innerHTML=xmlhttp.responseText;
        }
    }
    console.log(sdate);
    xmlhttp.open("GET","./ajaxDateWiseSalesByAdmin/"+sdate+"/"+edate);
    xmlhttp.send(null);

 }
</script>
<x-footer/>