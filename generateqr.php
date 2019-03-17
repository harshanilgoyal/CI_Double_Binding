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

    $batch=$_POST['batch'];
    $place=$_POST['place'];
    $type=$_POST['type'];
    $agency=$_POST['agency'];
    $sampleno = $_POST['sampleno'];
    
} else {
    header("Location:./login/login.php");
}

set_include_path('./vendor/rsa');
include 'Crypt/RSA.php';
include 'Crypt/AES.php';
include 'Crypt/Random.php';

$rsa = new Crypt_RSA();

extract($rsa->createKey());
$private = $privatekey;
$public = $publickey;
$rsa->loadKey($public); // public key
$plaintext =$batch.";".$place.";".$type.";".$agency.";";
//$rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
$ciphertext = $rsa->encrypt($plaintext);
$cipher1 = new Crypt_AES();
$cipher1->setKey('abcdefghijklmnop');
//$cipher1->setIV(crypt_random_string($cipher1->getBlockLength() >> 3));
$samplenocipher=$cipher1->encrypt($sampleno);
//$str=base64_encode($samplenocipher);
//$samplenocipher1=base64_decode($str);
//echo $cipher1->decrypt($samplenocipher1);
//echo $samplenocipher;
$samplebase64=base64_encode($samplenocipher);
//echo $ciphertext;

$detailsbase64=base64_encode($ciphertext);
echo $detailsbase64;
$finalciphertext=$samplebase64.":;,HARSH;;;".$detailsbase64;
//echo $finalciphertext;
//include './generatorqr.html';

$privatecipher = $cipher1->encrypt($private);
$privatebase64=base64_encode($privatecipher);

$query = "INSERT INTO encrypt (id,privatekey) values ('$sampleno','$privatebase64')";
if (mysqli_query($link, $query)) {
    echo "New record created successfully";
} else {
   echo "Error: " . $query . "<br>" . mysqli_error($link);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Font Awesome JS -->
    <link href="css/lightbox.min.css" rel="stylesheet">
    <link href="css/lity.min.css" rel="stylesheet">
    <link href="css/new-style.css" rel="stylesheet">

    <!-- Main File-->

    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/solid.js"
        integrity="sha384-6FXzJ8R8IC4v/SKPI8oOcRrUkJU8uvFK6YJ4eDY11bJQz4lRw5/wGthflEOX8hjL"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/fontawesome.js"
        integrity="sha384-xl26xwG2NVtJDw2/96Lmg09++ZjrXPc89j0j7JHjLOdSwHDHPHiucUjfllW0Ywrq"
        crossorigin="anonymous"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" style="text-align:center">
            <div class="sidebar-header">
                <h2 class="h5"><i class="fas fa-user-tie"></i> <?php echo $_SESSION['name'] ?></h2>
                <span><?php echo $_SESSION['des'] ?></span>
            </div>

            <ul class="list-unstyled components">
                <p>MAIN MENU</p>
                <li>

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

        <nav class="navbar navbar-expand-lg navbar-light " id="topbar">

            <div class="container-fluid">
                <div class="col-md-1">
                    <button type="button" id="sidebarCollapse" class="btn btn-warning">
                        <i class="fa fa-align-left" aria-hidden="true"></i>
                    </button>
                </div>
                <img id="logo" src="login\img\logo.png" style="width:120px;height:100px;background:white;padding:5px"
                    class="rounded float-left" alt="LOGO">
                <div class="col-md-4">
                    <h1>MINISTRY OF COAL<small>DOUBLE BINDING OF COAL</small></h1>
                </div>
                <div style="position:relative;right:10px;top:0px;color:white" id="imagetopbar">
                    <a href="#" class="nav-link pr-0"> <?php echo $_SESSION['name'] ?><img
                            class="img-fluid rounded-circle" style="height: 100px;margin-left: 18px;width: 100px;" src="dp/<?php echo $_SESSION['id'] ?>
.jpg"></a>
                </div>
        </nav>
        <!-- Page Content  -->
        <div id="content">

            <!-- Page Header-->
            <header>
                <h1 class="h3 display" align=center><i class="fas fa-lock"></i> <strong>Encryption</strong></h1>
            </header>
            <br>
            <hr>
            <div class="row">
                <div class="col-lg">
                    <div class="card" style="background:#ffedba;border-color:brown;color:black">
                        <div class="card-header d-flex">
                            <h4 style="position:relative;left:39%"><i class="fas fa-pen-fancy"></i> Sample Number :
                                <?=$sampleno?>
                            </h4>
                        </div>

                    </div>


                    <h4 style="text-align:center;padding:10px;color:#86ed53"><i class="fas fa-check-circle"></i> Your Qr
                        Code Is Ready</h4>



                    <div class="col" align=center>
                        <p style="color:red">Click on the Qrcode to download<p>
                                <a href="qrcode.png" download>
                                    <img style="width:30%;padding:10px;margin:10px;border-color:white"
                                        class="card-img-top" src="qrcode.php?text=<?=$finalciphertext?>" alt="Card image cap">
                                </a>
                    </div>




                    <p style="text-align:center;color:brown">Click on Encrypt From Main Menu To Encrypt Another Sample
                        <p>



                </div>


            </div>

            </form>


        </div>
        <hr>

    </div>
    </div>
    </div>

    </section>



    </div>


    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            //handleWindowLeaving() ;
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content ,#topbar').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');

            });


        });








    </script>
</body>

</html>