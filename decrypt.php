
  
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
    $query = 'select MAX(id) from decrypt';
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $decryptno = $row[0] + 1;
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
                <li >
                    <a href="encrypt.php"><i class="fa fa-tasks" aria-hidden="true"></i> Encrypt</a>
                </li>

                <li class="active">
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
            <h1>MINISTRY OF COAL<small>DOUBLE BINDING OF COAL</small></h1>
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
            <h1 class="h3 display" align=center><i class="fas fa-lock-open"></i> <strong>Decryption</strong></h1>
          </header>
          <br><hr>
          <div class="row">
            <div class="col-lg">
              <div class="card" style="background:#ffedba;border-color:brown;color:black">
                           <div class="card-header d-flex ">

                    <div class="col" style="float:left">
                                        <h4><i class="fas fa-lock-open" ></i> Decryption Id : <?php echo $decryptno ?>
</h4>
                                        </div>
                                        
                                </div>
                          
                          <div class="card-header d-flex ">

                    <div class="col" style="float:left">
                                        <h4><i class="fas fa-lock" ></i> Enter Cipher Code :</h4>
                                        </div>
                                        <div class="col">
                                        <input id="cipher" required placeholder="Scan The QR Code" class="form-control"  value="" type="text"/></div>
                                        <div class="col" style="float:right;">
            <button  id="getdetails" style="float:right;;border:10px;border-color:black;border-radius:5px;" type="button" class="btn btn-success btn-lg" >Get Details</button></div>
                                </div>
                               </div>
                                   
              <div class="card" id="detailscard" style="background:white;border-color:white;color:black;display:none;opacity:0">
              
                    <form action="thanks.php" method="post" id="formmain">

                        <input type='hidden' value="" name="decrypt_id" id="decrypt_id">
                        <input type='hidden' value="" name="sample" id="sample">
                        <input type='hidden' value="" name="batch" id="batch">
                        <input type='hidden' value="" name="type" id="type">
                        <input type='hidden' value="" name="place" id="place">
                        <input type='hidden' value="" name="agency" id="agency"> 
                        <div class="card-body">
                             <div class="row">
                    <div class="col-sm-8">
                    <form class="well form-horizontal">
                      <fieldset>
                      <div class="form-group row" style="padding:5px">
                            <label class="col-sm-3 control-label" ><strong>Sample Number: </strong></label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">
                                 <label class="col-sm-5 control-label" id="modal_sample"></label>
                               </div>
                            </div>
                         </div>
                          <div class="form-group row" style="padding:5px">
                            <label class="col-sm-3 control-label" ><strong>Batch Number: </strong></label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">
                                 <label class="col-sm-5 control-label" id="modal_batch"></label>
                               </div>
                            </div>
                         </div>
                        <div class="form-group row"  style="padding:5px">
                            <label class="col-sm-3 control-label" ><strong>Place Of Origin: </strong></label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">
                                 <label class="col-sm-5 control-label" id="modal_place"></label>

                            </div>
                            </div>
                         </div>
                          <div class="form-group row" style="padding:5px">
                            <label class="col-sm-3 control-label" ><strong>Type Of Coal: </strong></label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">

                                   <label class="col-sm-5 control-label" id="modal_type"></label>

                               </div>
                            </div>
                        </div>

                         <div class="form-group row" style="padding:5px">
                            <label class="col-sm-3 control-label" ><strong>Sampling Agency Name: </strong></label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">

                                    <label class="col-sm-5 control-label" id="modal_agency"></label>

                               </div>
                            </div>
                        </div>

                        
                         <div class="form-group row" style="padding:5px">
                            <label class="col-sm-3 control-label" ><strong>Sample Results: </strong></label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">
                                <div class="radio" style="padding-right:10px">
                                <label><input type="radio" name="optradio" value="POSITIVE" checked>  Positive</label>
                                </div>
                                
                                <div class="radio">
                                <label><input type="radio" name="optradio" value="NEGATIVE">  Negative</label>
                                </div>
                               </div>
                            </div>
                        </div>

                         <div class="form-group row" style="padding:5px">
                            <label class="col-sm-3 control-label" ><strong>Remarks: </strong></label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">
                                <input id="remarks" name="remarks" required placeholder="Eg-'very good quality'" class="form-control" value="" type="text"/>   
                            </div>
                            </div>
                        </div>


                      </fieldset>
                   </form>
                </div>
                         <div class="col-sm-4">
                    <img style="width:100%;border-radius:50%;float:right;padding:10px;margin:10px;border-color:white" class="card-img-top" src="img/decryption.jpg" alt="Card image cap">
            </div>


                         </div>

         <div class="form-group row">
            <button  style="border:10px;border-color:black;border-radius:5px;position:relative;left:14%;"  id="save" type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" >Save</button>
        </div>
                </div>
 </form>
                   

                </div>
<hr>

  </div>
  </div>
  </div>

</section>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        
        <h4 class="modal-title">Cipher Decrypted Successfully</h4>
      </div>
      <div class="modal-body" >
        <p>Data Saved. Your Page Will Be Refreshed Automatically</p>
      </div>
      <div class="modal-footer">
         </div>
    </div>

  </div>
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
           // document.documentElement.webkitRequestFullScreen(); 
            
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content ,#topbar').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');

            });

                



        });

       
    function handleWindowLeaving() {
    $(window).bind('beforeunload', function (event) {
        return "Please Save Any Unsaved Data";
    });
    $("#formmain").bind('submit', function () {
        $(window).unbind('beforeunload');
    });
};

    $("#getdetails").click(function(){
        handleWindowLeaving();

        var res = $("#cipher").val().split(":;,HARSH;;;");
        if(res[1]!=null){
        var finaldetails=res[1].replace(/ /g,"+");
         $.ajax({
            type: "POST",
            url: 'decryptmiddle.php',
            data: {sampleno:res[0],details:finaldetails},
              success:function(data){
                  //alert(data);
                  $("#getdetails").attr('disabled','disabled');
                  $("#cipher").attr('disabled','disabled');
                  var returndetails = data.split(";");
                  //alert(returndetails);
                $("#modal_sample").text(returndetails[0]);
                 $("#modal_batch").text(returndetails[1]);
                $("#modal_place").text(returndetails[2]);
                $("#modal_type").text(returndetails[3]);
                $("#modal_agency").text(returndetails[4]);
                $("#detailscard").show();
                 $("#detailscard").animate({opacity:1},500);
            }
          })

        }else{
            alert('Please Check The Cipher Code');
        }
       
        });

        $("#save").click(function(){
            $("#batch").val($("#modal_batch").text());
            $("#sample").val($("#modal_sample").text());
            $("#place").val($("#modal_place").text());
            $("#type").val($("#modal_type").text());
            $("#agency").val($("#modal_agency").text());
            $("#remarks").val($("#remarks").val().toUpperCase());
            $("#decrypt_id").val(<?=$decryptno?>);
            
            var batch=$("#batch").val();
            var sample=$("#sample").val();
            var place=$("#place").val();
            var type=$("#type").val();
            var agency=$("#agency").val();
            var remarks=$("#remarks").val();
            var decryptid=$("#decrypt_id").val();
            var radio=$("input[name=optradio]:checked").val();
            //alert(radio);

            if($("#remarks").val()!="")
                { 
                    $.ajax({
            type: "POST",
            url: 'thanks.php',
            
            data: {decrypt_id:decryptid,batch:batch,sample:sample,place:place,remarks:remarks,optradio:radio,agency:agency,type:type},
              success:function(data){
                  //$(#formmain).reset();
                  //alert(data);
                  $(window).unbind('beforeunload');
setTimeout(location . reload . bind(location), 4000);

                 }
          })
          }
        });

    </script>
</body>

</html>