<?php
session_start();
if (array_key_exists("id", $_COOKIE)) {
    $_SESSION['id'] = $_COOKIE['id']; 
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['des'] = $_COOKIE['des'];

 }
 
 if (array_key_exists("id", $_SESSION)) {
    include 'dbconfig.php';
    $queryreportid="select MAX(report_id) from reports";
    $result=mysqli_query($link, $queryreportid);
    $row = mysqli_fetch_array($result);
    if(isset($row)){
    $reportidhere=$row['MAX(report_id)']+1;
     }
    else{
      $reportidhere =1;
    }
 }
 else {
     header("Location:login.php");
 }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
     <!-- JavaScript files-->
    
    
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->


    <style>
     #residential:hover
        {
      background-color:#d3c902 !important;
          }
          #commercial:hover
        {
      background-color:#d3c902 !important;
          } 
          #industrial:hover
        {
      background-color:#d3c902 !important;
          }   
          #residential
        {
      height:40px ;
      width:125px ; 
    }
          #commercial
        
          {
      height:40px ;
      width:125px ; 
    } 
          #industrial
        
          {
      height:40px ;
      width:125px ; 
    }    </style>


    <title>Hello, world!</title>

    <script type="text/javascript">
  window.onload = function() {
    $('form').each(function() { this.reset() });
    $("#mainpage").animate({opacity:1},1000);
    $("#residential").click(function(){
      $("#projectvar").attr("value","1");
      $(this).css("background-color","#d3c902");
      $("#commercial").css("background-color","yellow");
      $("#industrial").css("background-color","yellow");
      $("#residential-text").text("");
      $("#capa").animate({opacity:1},300);
      
      $(this).animate({height:'40px',width:'70px'},300);  
      $("#industrial").animate({height:'40px',width:'125px'},300,function(){
      $("#industrial-text").text("Industrial");
    });
    $("#commercial").animate({height:'40px',width:'125px'},300,function(){
      $("#commercial-text").text("Commercial");
    });
      
  });
  $("#commercial").click(function(){
    $("#projectvar").attr("value","2");  
    $(this).css("background-color","#d3c902");
    $("#residential").css("background-color","yellow");
    $("#industrial").css("background-color","yellow");
    $("#capa").animate({opacity:1},300);
    $("#commercial-text").text("");
    $(this).animate({height:'40px',width:'70px'},300);  
    $("#residential").animate({height:'40px',width:'125px'},300,function(){
      $("#residential-text").text("Residential");
    });
    $("#industrial").animate({height:'40px',width:'125px'},300,function(){
      $("#industrial-text").text("Industrial");
    });
    
   
  });
  
  $("#industrial").click(function(){
    $("#projectvar").attr("value","3");  
    $(this).css("background-color","#d3c902");
    $("#residential").css("background-color","yellow");
    $("#commercial").css("background-color","yellow");
    $("#capa").animate({opacity:1},300);
    $("#industrial-text").text("");
    $(this).animate({height:'40px',width:'70px'},300);  
    $("#residential").animate({height:'40px',width:'125px'},300,function(){
      $("#residential-text").text("Residential");});
    $("#commercial").animate({height:'40px',width:'125px'},300,function(){
      $("#commercial-text").text("Commercial");
    });
    
    
    
  }); 

};
  
  
  </script>
  </head>
  <body>

 <!-- Side Navbar -->
<nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="dp/<?php echo $_SESSION['id'] ?>
.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?php echo $_SESSION['name']?></h2><span><?php echo $_SESSION['des'] ?></span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>G</strong><strong class="text-primary">S</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="index.php"> <i class="icon-home"></i>Home                             </a></li>
            <li class='active'><a href="inside.php"> <i class="fa fa-plus"></i>New Proposal                             </a></li>
            <li><a href="#"> <i class="fa fa-database"></i>View Proposals                             </a></li>
            
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Edit Database</a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Modules</a></li>
                <li><a href="#">Inverters</a></li>
                <li><a href="#">Structure</a></li>
              </ul>
            </li>

            <li><a href="login.php?logout=1"> <i class="fa fa-sign-out"></i>LogOut                             </a></li>
            </ul>
        </div>
        
    </nav>


    <div class="page">
<!-- navbar-->
<header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Proposal Generator</span><strong class="text-primary">GOYALSOLAR</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
               <li class="nav-item"><a href="login.php?logout=1" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
</header>



 <!-- Breadcrumb-->
 <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="main.php">Home</a></li>
            <li class="breadcrumb-item active">NewProposal       </li>
          </ul>
        </div>
      </div>


      <div id="mainpage" style="opacity:0">
      <section class="forms">
        <div class="container-fluid" style="background:#f7f1c0">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Generate New Proposal</h1>
            
          </header>


          <div class="row">
            <div class="col-lg">
              <div class="card" style="background:#ffe900">
                <div class="card-header d-flex align-items-center">
                  
                  <h4>Report Number : <?=$reportidhere?></h4>
                </div>
                <div class="card-body">
                  
    <form action="tabinput.php" method="post" id="submitform">
    <input type="hidden" name='type' id='projectvar' value='0'/>
    <div class="form-group row">
      
      <label for="inputtype" class="col-sm-2 col-form-label" >Project Type:</label>    
      
      <button id="residential"  type="button" class="btn" style="background:yellow"><i class="fa fa-home"></i> <span id="residential-text">Residential</span></button>
      <button id="commercial"   type="button" class="btn" style="background:yellow;margin-left:10px"><i class="fa fa-building"></i> <span id="commercial-text"> Commercial</span></button>
      <button id="industrial"   type="button" class="btn" style="background:yellow;margin-left:10px"><i class="fa fa-industry"></i> <span id="industrial-text"> Industrial</span></button>
        
    </div>
        
      
        <div id="capa" style='opacity:0'>
        <div class="form-group row"  >
      <label for="inputtittle" class="col-sm-2 col-form-label" >Project Tittle:</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" required id="inputtittle" name="tittle" placeholder="Enter name of project">
      </div>
    </div>
    <div class="form-group row"  >
      <label for="inputcapacity" class="col-sm-2 col-form-label" >Capacity:</label>
      <div class="col-sm-2">
        <input type="number" min="0" step="0.5" class="form-control" required id="inputcapacity" name="capacity" placeholder="Capacity in Kw" style="border: 2px solid red;border-radius: 7px;">
      </div>
    </div>

    <div class="form-group row"  >
      <label for="inputsubsidy" class="col-sm-2 col-form-label" >Subsidy:</label>
      <div class="col-sm-1">
      <label class="radio-inline"><input type="radio" name="optradio" onchange="handleradio1()" >Yes</label>
      </div>
      <div class="col-sm-1">
      <label class="radio-inline"><input type="radio" name="optradio" onchange="handleradio2()" >No</label>
      </div>
      <div class="col-sm-2">
      <input type="number" min="0" step="1000" class="form-control" value='0' id="inputsubsidy" required name="subsidy" placeholder="Subsidy in Rs" style="opacity:0">
      </div>
      </div>
    
    </div>
    <input type="hidden" name="place" id="place" value=""/>
    <input type="hidden" name="reportid" value='<?=$reportidhere?>' />
    <div id="pincodediv" style='opacity:0;' >
    <div class="form-group row"  >
      <label for="inputpincode" class="col-sm-2 col-form-label" >Pincode:</label>
      <div class="col-sm-2">
        <input  type="number" onchange="length1()" class="form-control" required id="inputpincode" name="pincode" placeholder="Pincode">
      </div>
      <div id="placealertdiv" style='opacity:0'>
      <div class="alert alert-warning" style="background:#FFE900 !important;border:0px !important">
        <strong id="placetext"></strong>
        </div>
      </div>
    </div>
    </div>
  <div id="submitdiv" style="opacity:0">
    <div class="form-group row">
      <div class="col-sm-10">
        <button id="submitbutton" disabled='disabled' name='submitfirstform' type="submit" class="btn btn-primary">Generate Report</button>
      </div>
    </div>
    </div>
    
  </form>
  </div>
  </div>
  </div>
  </div>
</section>
</div>
<footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Goyal Solar &copy; 2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Developed by <a href="#" class="external">Harsh Goyal</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
  <script type="text/javascript">
  
  function length1()
  {
    var count=$('#inputpincode').val().length;
    
            $.ajax({
              url:"https://maps.googleapis.com/maps/api/geocode/json?address="+encodeURIComponent($('#inputpincode').val())+"&key=AIzaSyBcMq_TCNlKLIq7Ee0M-2WNHES-6GivYJM",
              type:"GET",
              success:function(data){
                $("#placetext").text("");
                $("#placealertdiv").animate({opacity:1},300);
                console.log(data); 
                if (data["status"] != "OK"){
                  $("#placetext").text("Please enter a valid pincode");                
                  $("#placetext").css("color","red");
                  $("#submitdiv").animate({opacity:0},100); 
                  $('#submitbutton').attr('disabled','disabled');               
                }
                else{
                  
                $.each(data["results"][0]["address_components"], function (key, value) {
                  
                  
                                if (value["types"][0] == "administrative_area_level_2") {
                                  $("#placetext").css("color","#856402");
                                  $("#placetext").text(value['long_name']);
                                
                                }
                                
                                if (value["types"][0] == "administrative_area_level_1") {
                                  $("#placetext").css("color","#856402");
                                  $("#placetext").text($("#placetext").text()+", "+value['long_name']);
                                }
                                if (value["types"][0] == "country") {
                                  if(value['long_name']=="India" ){
                                    $("#placetext").css("color","#856402");
                                  $("#placetext").text($("#placetext").text()+", "+value['long_name']);

                                  $('#submitbutton').removeAttr('disabled');
                                  $("#place").attr("value",$("#placetext").text());
                                  $("#submitdiv").animate({opacity:1},300);
                                }
                                else{
                                  $("#placetext").css("color","red");
                                  $("#placetext").text("Please enter a valid Indian pincode");                    
                                $("#submitdiv").animate({opacity:0},100); 
                                $('#submitbutton').attr('disabled','disabled');   
                                }
                              }
                                
                            }) 
              }
            }
          })
    
  }
  
function handleradio1(){
$("#inputsubsidy").animate({opacity:1},200);
$("#inputsubsidy").removeAttr("disabled");
$("#pincodediv").animate({opacity:1},300);
}
 
function handleradio2(){
  $("#inputsubsidy").animate({opacity:0},200,function(){
    $("#inputsubsidy").attr("disabled","disabled");
    $("#pincodediv").animate({opacity:1},300);
  });

}


</script>
</html>
