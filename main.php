
  <head>
  <script src="/pace/pace.js"></script>
  <link href="/pace/themes/pace-theme-flat-top.css" rel="stylesheet" />
  </head>
<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
include './databaseconnection/dbconfig.php';

use Parsehub\Parsehub;
error_reporting(0);

if (array_key_exists("id", $_COOKIE)) {
    $_SESSION['id'] = $_COOKIE['id'];
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['des'] = $_COOKIE['des'];
  }
 
 if (array_key_exists("id",$_SESSION)  ){
        $query = 'select MAX(id) from decrypt';
        $query1 = 'select MAX(id) from encrypt';

        $result = mysqli_query($link, $query);
        $result1 = mysqli_query($link, $query1);
          $row = mysqli_fetch_array($result);

          $row1 = mysqli_fetch_array($result1);
      
      if(isset($row1))
          {$encryptno=$row1[0];}
      else{
      $encryptno = 0;  
      }    
          
if (isset($row)) {$decryptno = $row[0];
} else {
    $decryptno = 0;
}

$query = "SELECT COUNT(*) as count FROM decrypt where result = 'positive'";
$query1 = "SELECT COUNT(*) as count FROM decrypt where result = 'negative'";
$result = mysqli_query($link, $query);
$result1 = mysqli_query($link, $query1);
$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($result1);
if($decryptno!=0){
  $positive=$row[0];
  $negative = $row1[0];

}
$userid=$_SESSION['id'];
$query1 = "SELECT count FROM users where user_id='$userid'";
$result1 = mysqli_query($link, $query1);
$row1 = mysqli_fetch_array($result1);
$count=$row1[0]+1;

$query = "UPDATE users SET count='$count' WHERE user_id='$userid'";

mysqli_query($link, $query);




 }
 else {
     header("Location:./login/login.php");
 }
 
$api_key ="toXciEro7DVG";
$api_url = 'https://www.parsehub.com/api/v2';
$log_path = 'C:\\wamp64\parsehub.log';
$parsehub = new Parsehub($api_key, $api_url, $log_path);

//$data = $parsehub->getLastReadyRunData("tHJAUbkAxKL0");
//print $data;

$options = array(
    // Set send_email options. Skip to remain this value default.
  //  'send_email' => 1,
);
//$project_token ="tHJAUbkAxKL0";
$data = $parsehub->getLastReadyRunData("tHJAUbkAxKL0");

$run_obj=$parsehub->runProject("tHJAUbkAxKL0",  $options);


//print $data;

?>
<script>
    console.log(<?= json_encode($data); ?>);
</script>

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
                 <h2 class="h5"><i class="fas fa-user-tie"></i> <?php echo $_SESSION['name']?></h2><span><?php echo $_SESSION['des'] ?></span>
            </div>

            <ul class="list-unstyled components">
                <p>MAIN MENU</p>
                <li class="active">
                                              
<a href="main.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                       
                </li>
                <li>
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
            <h1>MINISTRY OF COAL<small>DOUBLE BINDING OF COAL</small></h1>
          </div>
            <div style="position:relative;right:10px;top:0px;color:white" id="imagetopbar">
              <a href="#" class="nav-link pr-0" > <?php echo $_SESSION['name'] ?><img class="img-fluid rounded-circle" style="height: 100px;margin-left: 18px;width: 100px;" src="dp/<?php echo $_SESSION['id'] ?>
.jpg"></a> 
            </div>
            </nav>
        <!-- Page Content  -->
        <div id="content">

  <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
            <!-- Count item widget-->
            <div class="col-xl-3 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="fa fa-tasks" aria-hidden="true"></i></div>
                <div class="name"><strong class="text-uppercase">Total Encryptions</strong>
                  <div class="count-number" align=center style="color:#93716b"><?=$encryptno?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-3 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="fa fa-database" aria-hidden="true" ></i></div>
                <div class="name"><strong class="text-uppercase">Total Decryptions</strong>
                  <div class="count-number" align=center style="color:#93716b"><?=$decryptno?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-3 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="fa fa-check-circle" aria-hidden="true"></i></div>
                <div class="name"><strong class="text-uppercase">No Of Positive Reports</strong>
                  <div class="count-number" align=center style="color:#93716b"><?=$positive?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-3 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
                <div class="name"><strong class="text-uppercase">No Of Negative Reports</strong>
                  <div class="count-number" align=center style="color:#93716b"><?=$negative?></div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </section>



<section class="statistics" >
        <div class="container-fluid " style="margin-top:30px">
          <div class="row d-flex">
            <div class="col-lg-4">
              <!-- Income-->
              <div class="card income text-center">
                <div class="icon"><i class="fas fa-rupee-sign"></i></div>
                <div class="number" id="Profit"></div><strong class="text-primary">Yearly Profit</strong>
                <p>Source:economictimes.indiatimes.com</p>
              </div>
            </div>
          <div class="col-lg-4">
              <!-- Income-->
              <div class="card income text-center">
                <div class="icon"><i class="fas fa-chart-line"></i></div>
                <div class="number" id="stock"></div><strong class="text-primary">Current Stock Price</strong>
                <p>Source:economictimes.indiatimes.com</p>
              </div>
            </div>
             <div class="col-lg-4">
              <!-- Income-->
              <div class="card income text-center">
                <div class="icon"><i class="fas fa-sign-in-alt"></i></div>
                <div class="number" id="visits"><?=$count?></div><strong class="text-primary">Your Total Visits</strong>
                <p></p>
              </div>
            </div>
          </div>
        </div>
      </section>

  <div style="margin-bottom:0px;height:50px;padding:30px;" align=center >
         <h3 class="heading-large">Recent News About Coal</h3> 
  </div>    

  <!-- Info Block-01 -->
  <section class="banner-sec float-left w-100 pt-4 pb-5" >
  
    <div class="container-fluid" style="background:white;">
      <div class="row px-3">
        <div class="col-md-3">
          <div class="card mb-4"> <img class="img-fluid" id="news1_img"  src="img/news/1.jpg" alt="">
            
            <div class="card-body p-2">
              <div class="news-title">
                <h2 class=" title-small" ><a href="#" target="_blank" id="news1_link" ><span id="news1_tittle"></span></a></h2>
              </div>
              <p class="card-text"><small class="text-time" id="news1_time"><em></em></small></p>
              <p><small id="news1_src"></small> </p>
            </div>
          </div>
          <div class="card mb-4"> <img class="img-fluid"  id="news2_img" src="img/news/2.jpg" alt="">
           
            <div class="card-body p-2">
              <div class="news-title">
                <h2 class=" title-small" ><a href="#" target="_blank" id="news2_link"><span id="news2_tittle"></span></a></h2>
              </div>
              <p class="card-text"><small class="text-time" id="news2_time"><em></em></small></p>
              <p><small id="news2_src"></small> </p>
            
            </div>
          </div>  
        </div>
        <div class="col-md-3">
          <div class="card mb-4"> <img class="img-fluid"  id="news3_img" src="img/news/3.jpg" alt="">
            
            <div class="card-body p-2">
              <div class="news-title">
                <h2 class=" title-small" ><a href="#" target="_blank" id="news3_link"><span id="news3_tittle"></span></a></h2>
              </div>
              <p class="card-text"><small class="text-time" id="news3_time"><em></em></small></p>
              <p><small id="news3_src"></small> </p>
            
            </div>
          </div>
          <div class="card"> <img class="img-fluid"  id="news4_img" src="img/news/4.jpg" alt="">
           
            <div class="card-body p-2">
              <div class="news-title">
                <h2 class=" title-small" ><a href="#" target="_blank" id="news4_link"></a><span id="news4_tittle"></span></h2>
              </div>
              <p class="card-text"><small class="text-time" id="news4_time"><em></em></small></p>
              <p><small id="news4_src"></small> </p>
            
            </div>
          </div>
        </div>
        <div class="col-md-6 top-slider">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
            <!-- Indicators -->
            <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="news-block">
                  <div class="news-media"><img class="img-fluid"  id="news5_img" src="img/news/5.jpg" alt=""></div>
                  <div class="news-title">
                    <h2 class=" title-large" ><a href="#" target="_blank" id="news5_link"><span id="news5_tittle"></span></a></h2>
                  </div>
                  <div class="news-des" id="news5_desc"></div>
                  <div class="time-text" id="news5_time"><strong></strong></div>
                  <p><small id="news5_src"></small> </p>
            
                </div>
              </div>
              <div class="carousel-item">
                <div class="news-block">
                  <div class="news-media"><img class="img-fluid"  id="news6_img" src="img/news/6.jpg" alt=""></div>
                  <div class="news-title">
                    <h2 class=" title-large" ><a href="#" target="_blank" id="news6_link"><span id="news6_tittle"></span></a></h2>
                  </div>
                  <div class="news-des" id="news6_desc"></div>
                  <div class="time-text" id="news6_time"><strong></strong></div>
                  <p><small id="news6_src"></small> </p>
            
                </div>
              </div>
              <div class="carousel-item">
                <div class="news-block">
                  <div class="news-media"><img class="img-fluid"  id="news7_img" src="img/news/7.jpg" alt=""></div>
                  <div class="news-title">
                    <h2 class=" title-large" ><a href="#" target="_blank" id="news7_link"><span id="news7_tittle"></span></a></h2>
                  </div>
                  <div class="news-des" id="news7_desc"></div>
                  <div class="time-text" id="news7_time"><strong></strong></div>
                  <p><small id="news7_src"></small> </p>
            
                </div>
              </div>
            </div>
          </div>
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
          //document . documentElement . webkitRequestFullScreen();
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content ,#topbar').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                
            });
  

                      
        var url = 'https://gnews.io/api/v2/?q=Coal India&max=7&lang=en&country=in&token=bfea91df8f016d4addd9d15a1098cc8c';
        var req = new Request(url);
        fetch(req)
            .then(function(response) {
               

            var output=Promise.resolve(response.json());
            output.then(function(value) {
                console.log(value['articles']);
            $('#news1_tittle').text(value['articles'][0]['title']);
             $('#news2_tittle').text(value['articles'][1]['title']);
              $('#news3_tittle').text(value['articles'][2]['title']);
               $('#news4_tittle').text(value['articles'][3]['title']);
                $('#news5_tittle').text(value['articles'][4]['title']);
                 $('#news6_tittle').text(value['articles'][5]['title']);
                  $('#news7_tittle').text(value['articles'][6]['title']); 
                    $('#news5_desc').text(value['articles'][4]['desc']);
                 $('#news6_desc').text(value['articles'][5]['desc']);
                  $('#news7_desc').text(value['articles'][6]['desc']); 

                $('#news1_link').attr('href',value['articles'][0]['link']);
                $('#news2_link').attr('href',value['articles'][1]['link']);
                $('#news3_link').attr('href',value['articles'][2]['link']);
                $('#news4_link').attr('href',value['articles'][3]['link']);
                $('#news5_link').attr('href',value['articles'][4]['link']);
                $('#news6_link').attr('href',value['articles'][5]['link']);
                $('#news7_link').attr('href',value['articles'][6]['link']);



                if(value['articles'][0]['image'].toString() != "")  
                $('#news1_img').attr('src',value['articles'][0]['image']);
                if(value['articles'][1]['image'].toString()!="")
                $('#news2_img').attr('src',value['articles'][1]['image']);
                if(value['articles'][2]['image'].toString()!="")
                $('#news3_img').attr('src',value['articles'][2]['image']);
                if(value['articles'][3]['image'].toString()!="")
                $('#news4_img').attr('src',value['articles'][3]['image']);
                if(value['articles'][4]['image'].toString()!="")
                $('#news5_img').attr('src',value['articles'][4]['image']);
                if(value['articles'][5]['image'].toString()!="")
                $('#news6_img').attr('src',value['articles'][5]['image']);
                if(value['articles'][6]['image'].toString()!="")
                $('#news7_img').attr('src',value['articles'][6]['image']);

                $('#news1_time').text(value['articles'][0]['date']);
             $('#news2_time').text(value['articles'][1]['date']);
              $('#news3_time').text(value['articles'][2]['date']);
               $('#news4_time').text(value['articles'][3]['date']);
                $('#news5_time').text(value['articles'][4]['date']);
                 $('#news6_time').text(value['articles'][5]['date']);
                  $('#news7_time').text(value['articles'][6]['date']); 

                 $('#news1_src').text(value['articles'][0]['source']);
             $('#news2_src').text(value['articles'][1]['source']);
              $('#news3_src').text(value['articles'][2]['source']);
               $('#news4_src').text(value['articles'][3]['source']);
                $('#news5_src').text(value['articles'][4]['source']);
                 $('#news6_src').text(value['articles'][5]['source']);
                  $('#news7_src').text(value['articles'][6]['source']); 

                 var profit=<?=$data?>;
            //alert(profit["profit"]);
       $('#Profit').text(profit["profit"].replace("Rs",""));
       $('#stock').text(profit["stock"]);
         

                 });
            })

           



        });


        
    </script>
</body>

</html>