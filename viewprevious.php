
<?php
session_start();
include './databaseconnection/dbconfig.php';

if (array_key_exists("id", $_COOKIE)) {
    $_SESSION['id'] = $_COOKIE['id'];
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['des'] = $_COOKIE['des'];
}

if (array_key_exists("id", $_SESSION)) {
   
} else {
    header("Location:./login/login.php");

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Coal India</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Font Awesome JS -->
     <link href="css/lightbox.min.css" rel="stylesheet">
    <link href="css/lity.min.css" rel="stylesheet">
    <link href="css/new-style.css" rel="stylesheet">

    <!-- Main File-->

    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/solid.js" integrity="sha384-6FXzJ8R8IC4v/SKPI8oOcRrUkJU8uvFK6YJ4eDY11bJQz4lRw5/wGthflEOX8hjL" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/fontawesome.js" integrity="sha384-xl26xwG2NVtJDw2/96Lmg09++ZjrXPc89j0j7JHjLOdSwHDHPHiucUjfllW0Ywrq" crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" style="text-align:center">
            <div class="sidebar-header">
                 <h2 class="h5"><i class="fas fa-user-tie"></i> <?php echo $_SESSION['name'] ?></h2><span><?php echo $_SESSION['des'] ?></span>
            </div>

            <ul class="list-unstyled components">
                <p>MAIN MENU</p>
                <li >

<a href="main.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>

                </li>
                <li>
                    <a href="encrypt.php"><i class="fa fa-tasks" aria-hidden="true"></i> Encrypt</a>
                </li>

                <li>
                    <a href="decrypt.php"><i class="fa fa-database" aria-hidden="true"></i> Decrypt</a>
                </li>

                <li  class="active">
                    <a href="viewprevious.php"><i class="fa fa-eye" aria-hidden="true"></i> View Previous</a>
                </li>

                <li>
                    <a href="login/login.php?logout=1"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>


        </nav>

            <nav class="navbar navbar-expand-lg navbar-light " id="topbar" >

 <div class="container-fluid" >
        <div class="col-md-1">
      <button type="button" id="sidebarCollapse" class="btn btn-warning">
                       <i class="fa fa-align-left" aria-hidden="true"></i>
                    </button>
        </div>
        <img id="logo" src="login\img\logo.png" style="width:120px;height:100px;background:white;padding:5px" class="rounded float-left" alt="LOGO" >
        <div class="col-md-4">
            <h1>MINISTRY OF COAL<small>DOUBLE BLINDING OF COAL</small></h1>
          </div>
            <div style="position:relative;right:10px;top:0px;color:white" id="imagetopbar">
              <a href="#" class="nav-link pr-0" > <?php echo $_SESSION['name'] ?><img class="img-fluid rounded-circle" style="height: 100px;margin-left: 18px;width: 100px;" src="dp/<?php echo $_SESSION['id'] ?>
.jpg"></a>
            </div>
            </nav>
        <!-- Page Content  -->
         <div id="content">


 <section class="forms">
        
          <!-- Page Header-->
          <header > 
            <h1 class="h3 display" align=center><i class="fa fa-eye"></i> <strong>View Previous Entries</strong></h1>
          </header>
          <br><hr>
          <div class="row">
            <div class="col-lg">
              <div class="card" style="background:#ffedba;border-color:brown;color:black">
                                    
                   
                                           
                          <div class="card-header d-flex ">

                    <div class="col" style="float:left">
    <h4><i class="fas fa-search"></i> Search According To :</h4>
    </div>
    <div class="col">
    <div class="form-group">
 
  <select class="form-control" onchange="selectacoordingto()"  id="sel1">
    <option id="default1">select</option>
    <option id="batch" value="batch">Batch</option>
    <option id="place" value="place">Place Of Origin</option>
    <option id="type" value="type">Type</option>
    <option id="agency " value="agency">Sampling Agency</option>
    <option id="result" value="result">Results</option>
  </select>
</div></div>


  </div>

         <div id="enterkeyword" style="display:none;opacity:0">
                          <div class="card-header d-flex" >

                    <div class="col" style="float:left;padding:7px">
        <h4 ><i class="fas fa-pen"></i> <span id="enter_keyword"></span></h4>
        </div>
        <div class="col">
        <input id="keyword" onkeyup="keyword()" required placeholder="" class="form-control"  value="" type="text"/></div>
       
        </div>
        </div>
                        
 
    
  </div>
  </div>

</section>
<div id="total" style="display:none;margin-top:20px">
<div class="card" style="background:#c8fcc7">
  <div class="card-body" >
    <h4 class="card-title"><i class="fas fa-search"></i> Total Results Found Are : <span id="resultsno"></span> </h4>
    </div>
</div>
</div>
<div id="cards">

</div>
   </div>


    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content ,#topbar').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');

            });
        });

       
   
        function selectacoordingto() {
           $("#default1").remove(); 
           $("#enterkeyword").show();   
           $("#enterkeyword").animate({opacity:1},500);
           $("#enter_keyword").text("Enter "+$("#sel1 option:selected").text()+"  :")
           //alert($("#sel1 option:selected").text());
          keyword();
        }

        function keyword(){
          $("#resultsno").text("");
                 
          $("#cards").html("");
          var keyword=$("#keyword").val().toUpperCase();
          if(keyword!="" && keyword!=null){
            var according=$("#sel1 option:selected").val();
             $.ajax({
            type: "POST",
            url: 'getdata.php',
            data: {according:according,keyword:keyword},
              success:function(data){
                 $("#total").show();
                 var row1=data.split("HARSH");
                 $("#resultsno").text(row1.length-1);
                 for(var i=0;i<row1.length-1;i++){
                 var r=row1[i];
                 var rowdata=r.split(":;");
                $("#cards").append("<div class='card' style='margin-top:10px'><div class='card-body'><h4 class='card-title' id='row_no'>Card title</h4><h6 class='card-title' id='decrypt_no'>Card title</h6><h6 class='card-text' id='sample_no' >Some example text. Some example text.</h6><h6 class='card-text' id='batch_no'>Some example text. Some example text.</h6>    <h6 class='card-text' id='place_no'>Some example text. Some example text.</h6>    <h6 class='card-text' id='type_no'>Some example text. Some example text.</h6><h6 class='card-text' id='agency_no'>Some example text. Some example text.</h6> <h6 class='card-text' id='result_no'>Some example text. Some example text.</h6><h6 class='card-text' id='remarks_no'>Some example text. Some example text.</h6> </div></div>");
                $('#row_no').attr('id',"row_no"+i);
                 $('#decrypt_no').attr('id',"decrypt_no"+i);
                 $('#sample_no').attr('id',"sample_no"+i);
                 $('#batch_no').attr('id',"batch_no"+i);
                 $('#place_no').attr('id',"place_no"+i);
                 $('#type_no').attr('id',"type_no"+i);
                 $('#agency_no').attr('id',"agency_no"+i);
                 $('#result_no').attr('id',"result_no"+i);
                 $('#remarks_no').attr('id',"remarks_no"+i);
                 $('#row_no'+i).text("Result No :    "+(i+1));
                  $('#decrypt_no'+i).text("DECRYPT ID :    "+rowdata[0]);
                  $('#sample_no'+i).text("SAMPLE NO :    "+rowdata[1]);
                  $('#batch_no'+i).text("BATCH NO :    "+rowdata[2]);
                  $('#place_no'+i).text("PLACE :    "+rowdata[3]);
                  $('#type_no'+i).text("TYPE :    "+rowdata[4]);
                  $('#agency_no'+i).text("SAMPLING AGENCY :    "+rowdata[5]);
                  $('#result_no'+i).text("RESULT :    "+rowdata[6]);
                  $('#remarks_no'+i).text("REMARKS :    "+rowdata[7]);
                  }
              }
          })
          }

        }

    </script>
</body>

</html>