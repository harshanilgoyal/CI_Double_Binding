
  
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
$query='select MAX(id) from encrypt';
$result=mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$sampleno=$row[0]+1;
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
                <li class="active">
                    <a href="encrypt.php"><i class="fa fa-tasks" aria-hidden="true"></i> Encrypt</a>
                </li>

                <li>
                    <a href="decrypt.php"><i class="fa fa-database" aria-hidden="true"></i> Decrypt</a>
                </li>

                <li>
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
            <h1 class="h3 display" align=center><i class="fas fa-lock"></i> <strong>Encryption</strong></h1>
          </header>
          <br><hr>
          <div class="row">
            <div class="col-lg">
              <div class="card" style="background:#ffedba;border-color:brown;color:black">
                                    <div class="card-header d-flex ">
                                        <h4><i class="fas fa-pen-fancy"></i> Sample Number : <?php echo $sampleno ?>
</h4>
                                    </div>
                    <form action="generateqr.php" method="post" id="formmain">
                   
                        <div class="card-body">
                             <div class="row">
                    <div class="col-sm-8">
                    <form class="well form-horizontal">
                      <fieldset> 
                          <div class="form-group row" style="padding:20px">
                            <label class="col-sm-3 control-label" >Batch Number: </label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">
                                   <input id="batch" name="batch" onchange="change()" required placeholder="Eg-'B104'" class="form-control"  value="" type="text"/>
                               </div>
                            </div>
                         </div>
                        <div class="form-group row"  style="padding:20px">
                            <label class="col-sm-3 control-label" >Place Of Origin: </label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">
                                <input id="place" name="place" onchange="change()" required placeholder="Eg-'Nagpur'" class="form-control"  value="" type="text"/>   
                            </div>
                            </div>
                         </div>
                          <div class="form-group row" style="padding:20px">
                            <label class="col-sm-3 control-label" >Type Of Coal:</label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">
                                  
                                  <input id="type" name="type" onchange="change()" placeholder="Eg-'Lignite'" class="form-control"  value="" type="text" required/>
                               </div>
                            </div>
                        </div> 
                         
                         <div class="form-group row" style="padding:20px">
                            <label class="col-sm-3 control-label" >Sampling Agency Name:</label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">
                                  
                                  <input id="agency" name="agency" onchange="change()" required placeholder="Eg-'abc Coal Lab'" class="form-control"  value="" type="text"/>
                                  <input type='hidden' value=<?=$sampleno ?> name="sampleno">
                               </div>
                            </div>
                        </div> 
                         
                         
                      </fieldset>
                   </form>
                </div>
                         <div class="col-sm-4">
                    <img style="width:100%;border-radius:50%;float:right;padding:10px;margin:10px;border-color:white" class="card-img-top" src="img/encryption.jpg" alt="Card image cap">
            </div>
            

                         </div>

         <div class="form-group row">
            <button disabled style="border:10px;border-color:black;border-radius:5px;position:relative;left:14%;"  id="modaltrigger" type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Submit Details</button>
        </div>
                </div>
 </form>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                         <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Please Verify The Details Entered</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                 <div class="form-group row" style="padding:10px">
                            <label class="col-sm-5 control-label" >Batch Number: </label>
                          <label class="col-sm-5 control-label" id="modal_batch"></label>
                             
                         </div>
                        <div class="form-group row"  style="padding:10px">
                            <label class="col-sm-5 control-label" >Place Of Origin: </label>
                           <label class="col-sm-5 control-label" id="modal_place"></label>
                            
                            </div>

                             <div class="form-group row" style="padding:10px">
                            <label class="col-sm-5 control-label" >Type Of Coal:</label>
                            <label class="col-sm-5 control-label" id="modal_type"></label>
                            </div> 
                         
                         <div class="form-group row" style="padding:10px">
                            <label class="col-sm-5 control-label" >Sampling Agency:</label>
                            <label class="col-sm-5 control-label" id="modal_agency"></label>
                            
                           
                        </div> 
                         
                         </div>
                            <div class="modal-footer">
                                <button type="button" id="generateqr"style="border-radius:5px;" class="btn btn-success" data-dismiss="modal">Generate Qrcode</button>
                            <button type="button" style="border-radius:5px;" class="btn btn-default" data-dismiss="modal">Edit</button>
                            </div>
                            </div>

                    </div>
                    </div>                    
                                                
                </div>
<hr>

  </div>
  </div>
  </div>

</section>



         </div>


    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            handleWindowLeaving() ;
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content ,#topbar').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');

            });

                $("#modal_batch").text("");
                $("#modal_place").text("");
                $("#modal_type").text("");
                $("#modal_agency").text("");
                $("#batch").text("");
                $("#place").text("");
                $("#type").text("");
                $("#agency").text("");



        });

        function change(){
           // alert($("#batch").text());
                $("#batch").val($("#batch").val().toUpperCase());
                $("#place").val($("#place").val().toUpperCase());
                $("#type").val($("#type").val().toUpperCase());
                $("#agency").val($("#agency").val().toUpperCase());
                $("#modal_batch").text($("#batch").val());
                $("#modal_place").text($("#place").val());
                $("#modal_type").text($("#type").val());
                $("#modal_agency").text($("#agency").val());
                if($("#batch").val()!="" && $("#place").val()!="" && $("#type").val()!="" && $("#agency").val()!="" ){
                    $("#modaltrigger").removeAttr('disabled');
                }
                else{$("#modaltrigger").attr('disabled','disabled');}
        }

        //var flag=0;
        $("#generateqr").click(function(){
                //flag=1;
                
                $("#formmain").submit();
        });
    

    function handleWindowLeaving() {
    $(window).bind('beforeunload', function (event) {
        return "Please Save Any Unsaved Data";
    });
    $("#formmain").bind('submit', function () {
        $(window).unbind('beforeunload');
    });
};

 

    </script>
</body>

</html>