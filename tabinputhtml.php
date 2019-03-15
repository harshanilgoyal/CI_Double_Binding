
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bootstrap Dashboard by Bootstrapious.com</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="all,follow">
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
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper.js/umd/popper.min.js"> </script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
        <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/charts-home.js"></script>
        <!-- Main File-->
        <script src="js/front.js"></script>
        <!-- Favicon-->
        <link rel="shortcut icon" href="img/favicon.ico">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>


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
                            <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center">
                                <strong>G</strong>
                                <strong class="text-primary">S</strong>
                            </a>
                            </div>
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
        </div>
</nav>


            <!-- Side Navbar -->
            <nav class="side-navbar" id="materialtab" >
                    <div class="side-navbar-wrapper;">
                        <!-- Sidebar Navigation Menus-->

                            <div class="main-menu"  >
                            
                            <h4 class="sidenav-heading" style="text-align:center;color:black;" >No.-<?=$reportidafterinsert?></h4>

                            <h4 class="sidenav-heading" style="text-align:center;color:black" >Capacity: <?=$capacity?> Kw</h4>
                            
                            <h4 class="sidenav-heading" style="text-align:center;color:black" ><?=$place?>,<?=$pincode?></h4>
                                        <ul class="nav nav-pills flex-column " role="tablist" style="text-align:center;background-color: orange !important;">
                                        <h5 class="sidenav-heading" style="color:black">Materials</h5>
                                            <li class="nav-item"><a class="nav-link active"  data-toggle="pill" href="#summary" role="tab" aria-controls="summary" aria-selected="true" style="color:black"><i class="fas fa-home"></i>Summary</a></li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="pill" href="#modules" role="tab" aria-controls="modules" aria-selected="false" style="color:black"><i class="fas fa-solar-panel"></i>Modules</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#inverters" role="tab" aria-controls="inverter" aria-selected="false" style="color:black"><i class="fas fa-table"></i>Inverter</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#structure" role="tab" aria-controls="structure" aria-selected="false" style="color:black">Structures</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#cables" role="tab" aria-controls="cables" aria-selected="false" style="color:black">Cables</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#junction" role="tab" aria-controls="junction" aria-selected="false" style="color:black">Junction Boxes</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#earthing" role="tab" aria-controls="earthing" aria-selected="false" style="color:black">Earthing & Protection</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#meter" role="tab" aria-controls="meter" aria-selected="false" style="color:black">Meter</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#accessories" role="tab" aria-controls="accessories" aria-selected="false" style="color:black">Accessories</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#transport" role="tab" aria-controls="transport" aria-selected="false" style="color:black">Transport</a></li>
                                            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#services" role="tab" aria-controls="services" aria-selected="false" style="color:black">Services</a></li>
                                            </ul>

                            </div>


                    </div>
    </nav>

        <div class="page" >

                <!-- navbar-->
                        <header class="header">
                                <nav class="navbar">
                                    <div class="container-fluid">
                                        <div class="navbar-holder d-flex align-items-center justify-content-between">
                                            <div class="navbar-header">
                                                <a id="toggle-btn" href="#" class="menu-btn" style="padding:5px !important;">
                                                <i class="icon-bars"> </i></a>
                                                <a href="main.php" class="navbar-brand">
                                                <div class="brand-text d-none d-md-inline-block">
                                                    <span>Proposal Generator</span><strong class="text-primary">GOYALSOLAR</strong>
                                                </div></a>
                                            </div>
                                            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                                            <li class="nav-item"><a href="login.php?logout=1" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </nav>
                        </header>
                    
        </div>


            <div class="page" id="tabinputpage" >
                <!-- Breadcrumb-->
                <div class="breadcrumb-holder">
                        <div class="container-fluid">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="main.php">Home</a></li>
                            <li class="breadcrumb-item">NewProposal</li>
                        </ul>
                        </div>
                    </div>
            
                    <div class="container-fluid" style="background:black;color:white" align=center>
                               
                               
                               <h4><?=$type?> Project with <?=$subsidy?>  ₹/Kw Subsidy Given By Govt.</h4>
                        </div>






<div class="tab-content" id="tabcontent" >

<div id="summary" class="tab-pane fade show active" aria-labelledby="summary" >
    <div class="container-fluid"   >
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h1><?=$tittle?></h1>
                        </div>
                        <div class="card-body">
                            <form target="_blank" action="pdf.php" method="post" name='processsubmit' id="formidtable">
                                <div class="table-responsive-lg">
                                    <table class="table table-hover table-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Material</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Basic Cost</th>
                                                <th scope="col">Cost/Wp</th>
                                                <th scope="col">Discount/Wp</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Total/Wp</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Modules</td>
                                                <td id="module_desc" ></td>
                                                <td id="summary_modules_basic" onchange="summary_change_handler('summary_modules')"></td>
                                                <td id="summary_modules_perwp"></td>
                                                <td  style="width:15%"><input type=number value=0 step="any" id="summary_modules_discount" onchange="summary_change_discount('summary_modules')" min=0 style="width:50%;height:100%;background:#303949;border:none;color:white;padding:20;text-align:center;margin:0"/> Rs./Wp</td>
                                                <td id="summary_modules_total"></td>
                                                <td id="summary_modules_total_perwp"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Inverters</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                                <td style="width:15%"><input type=number value=0 style="width:50%;height:100%;background:#303949;border:none;color:white;padding:20;text-align:center;margin:0"/> Rs./Wp</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td >Structure</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                               <td style="width:15%"><input type=number value=0 style="width:50%;height:100%;background:#303949;border:none;color:white;padding:20;text-align:center;margin:0"/> Rs./Wp</td>
                                                <td>@mdo</td>
                                            </tr>
                                           <tr>
                                                <th scope="row">4</th>
                                                <td >Cables</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                               <td style="width:15%"><input type=number value=0 style="width:50%;height:100%;background:#303949;border:none;color:white;padding:20;text-align:center;margin:0"/> Rs./Wp</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Junction Boxes</td>
                                               <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                               <td style="width:15%"><input type=number value=0 style="width:50%;height:100%;background:#303949;border:none;color:white;padding:20;text-align:center;margin:0"/> Rs./Wp</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td >Earthing And Protection</td>
                                               <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                               <td style="width:15%"><input type=number value=0 style="width:50%;height:100%;background:#303949;border:none;color:white;padding:20;text-align:center;margin:0"/> Rs./Wp</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td >Meter</td>
                                               <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                               <td style="width:15%"><input type=number value=0 style="width:50%;height:100%;background:#303949;border:none;color:white;padding:20;text-align:center;margin:0"/> Rs./Wp</td>
                                                <td>@mdo</td>
                                            </tr> 
                                            <tr>
                                                <th scope="row">8</th>
                                                <td >Accessories</td>
                                              <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                               <td style="width:15%"><input type=number value=0 style="width:50%;height:100%;background:#303949;border:none;color:white;padding:20;text-align:center;margin:0"/> Rs./Wp</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">9</th>
                                                <td >Transport</td>
                                               <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                               <td style="width:15%"><input type=number value=0 style="width:50%;height:100%;background:#303949;border:none;color:white;padding:20;text-align:center;margin:0"/> Rs./Wp</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">10</th>
                                                <td >Services</td>
                                               <td>Otto</td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                               <td style="width:15%"><input type=number value=0 style="width:50%;height:100%;background:#303949;border:none;color:white;padding:20;text-align:center;margin:0"/> Rs./Wp</td>
                                                <td>@mdo</td>
                                            </tr>
                                             <tr>
                                                <th scope="row"></th>
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td>Total</td>
                                            </tr>
                                             <tr>
                                                <th scope="row"></th>
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td>Less(Per Wp)</td>
                                            </tr>
                                             <tr>
                                                <th scope="row"></th>
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td>Gst 1@ 5%</td>
                                            </tr>
                                             <tr>
                                                <th scope="row"></th>
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td>Gst 2@ 18%</td>
                                            </tr>
                                              <tr>
                                                <th scope="row"></th>
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <td ></td>
                                                <th>Gross Value:</th>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            <input id="flag" type="hidden" name="flag" value="0"/>
                            <input id="res" type="hidden" name="res" value="0">
                            <input id="sub" type="hidden" name="sub" value="0">
                            <input id="mes" type="hidden" name="mes" value="0">
                            </form>
                        </div>                 
                    </div>
                </div>
            </div>
    

</div>
</div>  

<div id="modules" class="tab-pane fade" aria-labelledby="modules" >
<?php include('././tabinput/modules.php')?>
</div>
<div id="inverters" class="tab-pane fade" aria-labelledby="inverters">
    <?php include '././tabinput/inverters.php'?>
</div>
<div id="structure" class="tab-pane fade" aria-labelledby="structure">
    <?php include '././tabinput/structures.php'?>
</div>
<div id="cables" class="tab-pane fade" aria-labelledby="cables">
    <?php include '././tabinput/cables.php'?>
</div>
<div id="junction" class="tab-pane fade" aria-labelledby="junction">
    <?php include '././tabinput/junction.php'?>
</div>
<div id="earthing" class="tab-pane fade" aria-labelledby="earthing">
  <?php include '././tabinput/earthing.php'?>
</div>
<div id="meter" class="tab-pane fade" aria-labelledby="meter">
    <?php include '././tabinput/meter.php'?>
</div>
<div id="accessories" class="tab-pane fade" aria-labelledby="accessories">
    <?php include '././tabinput/accessories.php'?>
</div>
<div id="transport" class="tab-pane fade" aria-labelledby="transport">
   <?php include '././tabinput/transport.php'?>
</div>
<div id="services" class="tab-pane fade" aria-labelledby="services">
   <?php include '././tabinput/services.php'?>
</div>

</div>

<div id="buttonbar" class="bar">
<div   class="container-fluid" align=center>
    <button type="button" id="download" class="btn btn-primary btn-lg" style="margin:10px" data-toggle="modal" data-target="#thankyou-download">
            Download Pdf
    </button>
    <button type="button" class="btn btn-outline-primary btn-lg"  data-toggle="modal" data-target="#mailmodal" >Mail Report</button>
</div>
</div> 
<!-- Modal -->
<div class="modal fade" id="thankyou-download" tabindex="-1" role="dialog" aria-labelledby="thankModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="thankModalLabel">Thanking You!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        Thank You For Using Proposal Generator Your Pdf Download Will Be Started Shortly.
        </div>

    </div>
    </div>
</div>

<div class="modal fade" id="mailmodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="ModalLabel">Mail Report</h4>
        <button id="closemailmodal" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form>
            <div class="form-group">
            <i class="far fa-envelope"></i>
            <label for="recipient-name" class="col-form-label">Recipient*:</label>
            <input multiple  type='email' required disabled class="form-control" id="recipient-name" placeholder="someone@example.com ( Seperate Multiple Ids By ',' )"/>

            </div>
            <div class="form-group">
            <i class="fas fa-book-open"></i>
            <label for="subject-text" class="col-form-label">Subject:</label>
            <textarea required class="form-control form-control-sm" disabled placeholder="Report/Proposal For Somecompany Pvt Ltd" id="subject-text"></textarea>
            </div>
            <div class="form-group">
            <i class="far fa-comment-alt"></i>
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea required class="form-control form-control-lg" disabled placeholder="Enter Your Message Here" id="message-text"></textarea>
            </div>
        </form>
        </div>
        <div class="modal-footer">
        <button id="closemailmodal1" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="mail" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#thankyou-mail">Send message</button>
    </div>
</div>
</div>
    </div>

<!-- Modal -->
<div class="modal fade" id="thankyou-mail" tabindex="-1" role="dialog" aria-labelledby="thankModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thankModalLabel1">Thanking You!</h5>
                <button type="button" id="closemodal" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Thank You For Using Proposal Generator Your Pdf  Will Be Mailed Shortly.
            </div>

            </div>
        </div>
        </div>

      <footer class="main-footer" id="foot">
        <div class="container-fluid">
          <div class="row" >
            <div class="col-sm-7">
              <p>Goyal Solar &copy; 2019</p>
            </div>
            <div class="col-sm-5 ">
              <p>Developed by <a href="#" class="external">Harsh Goyal</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>

        
        <script>
            
        $('#mailmodal').on('show.bs.modal', function (event) {
            $('#recipient-name').removeAttr('disabled');
           $('#subject-text').removeAttr('disabled');
           $('#message-text').removeAttr('disabled');
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal1=$('#mailmodal');
      });

                  $("#closemodal").click(function(){
                  $("#thankyou-mail").removeClass("in");
                  $(".modal-backdrop").remove();
                  });


                  $("#mail").click(function() {
                            $("#flag").attr("value", "1");
                            $("#mailmodal").removeClass("in");
                            $("modal1.modal-backdrop").remove();
                            $('modal1.body').removeClass('modal-open');
                            $('modal1.body').css('padding-right', '');
                            $("#mailmodal").hide();
                            $('#res').attr("value",$("#recipient-name").val());
                            $('#sub').attr("value",$("#subject-text").val());
                            $('#mes').attr("value",$("#message-text").val());
                            $('#formidtable').submit();
                          });

                  $("#download").click(function() {
                            $('#recipient-name').attr('disabled','disabled');
                            $('#subject-text').attr('disabled','disabled');
                            $('#message-text').attr('disabled','disabled');
                            $("#flag").attr("value", "0");
                            $("#recipient-name").attr("value","");
                            $('#formidtable').submit();
                                });


                          function summary_change_handler(idcalled)
                          {
                         //alert(idcalled);       
                         var input = $("#"+idcalled+"_basic").text();
                         var res = parseInt(input.replace("Rs.","").replace(/,/g,""));
                         var capacity=<?=$capacity?>;
                         var discountperwp=$("#"+idcalled+"_discount").val();
                         var discount=$("#"+idcalled+"_discount").val()*capacity*1000;

                         $("#"+idcalled+"_total").text((res-discount).toLocaleString()+" Rs.");
                         var totalperwp=$("#"+idcalled+"_perwp").text();
                         var totalperwpresult = parseFloat(totalperwp.replace("Rs.","").replace(/,/g,""));   
                         $("#"+idcalled+"_total_perwp").text((totalperwpresult-discountperwp).toLocaleString()+" Rs.")   ;
                         $("#"+idcalled+"_discount").attr({"max": parseFloat($("#"+idcalled+"_perwp").text())});

                           }

                            function summary_change_discount(tabcalled)
                          {
                          var input = $("#"+tabcalled+"_basic").text();
                         var res = parseInt(input.replace("Rs.","").replace(/,/g,""));     
                         var capacity=<?=$capacity?>;
                         var discountperwp=$("#"+tabcalled+"_discount").val();
                         var discount=$("#"+tabcalled+"_discount").val()*capacity*1000;
                         $("#"+tabcalled+"_total").text((res-discount).toLocaleString()+" Rs.");
                         var totalperwp=$("#"+tabcalled+"_perwp").text();
                         var totalperwpresult = parseFloat(totalperwp.replace("Rs.","").replace(/,/g,""));   
                         $("#"+tabcalled+"_total_perwp").text((totalperwpresult-discountperwp).toLocaleString()+" Rs.")       
                          }


        </script>
        </html>















