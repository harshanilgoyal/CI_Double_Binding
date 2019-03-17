
  <head>
  <script src="/pace/pace.js"></script>
  <link href="/pace/themes/pace-theme-flat-top.css" rel="stylesheet" />
  </head>
<?php
/*
$query = 'select MAX(id) from encrypt';
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
$sampleno = $row[0] + 1;


$keyvalue = "absqwewqhlkxzcnbbmcxzghjdas";

$query1 = "SELECT AES_DECRYPT(privatekey,'vnbnhgh v')  from encrypt where id =24";

if ($result = mysqli_query($link, $query1)) {
//echo "New record created successfully";
} else {
echo "Error: " . $query . "<br>" . mysqli_error($link);
}
$row = mysqli_fetch_array($result);

//echo $row[0];

$iparr = explode(":;,;;;", $finalciphertext, 2);
echo $iparr[1];
$rsa->loadKey($private); // private key
echo $rsa->decrypt($iparr[1]);
 */
include './databaseconnection/dbconfig.php';
set_include_path('./vendor/rsa');

include 'Crypt/AES.php';
include 'Crypt/Random.php';
include 'Crypt/RSA.php';

if(array_key_exists("sampleno",$_POST))
{
$sample=$_POST['sampleno'];
//echo $sample;
$sampleno=base64_decode($sample);
$cipher = new Crypt_AES();
$cipher->setKey('abcdefghijklmnop');
$finalsampleno=$cipher->decrypt($sampleno);
//$finalsampleno;

$query="select privatekey from encrypt where id ='$finalsampleno'";
if ($result=mysqli_query($link, $query)) {
    //echo "New record created successfully";
    $row = mysqli_fetch_array($result);
    if (isset($row)) {
    $privatecipher = $row[0];
    //$privatecipher;
    $finalprivatecipher=base64_decode($privatecipher);
    $finalprivate =$cipher->decrypt($finalprivatecipher);
    //echo $finalprivate;
    }
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($link);
}


if (array_key_exists("details", $_POST)) {
  // echo $_POST["details"];
    $rsa2 = new Crypt_RSA();
    //$rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);

    //echo $finalprivatecipher;
    $rsa2->loadKey($finalprivate);
    //$publickey = $rsa->getPublicKey();
    //echo $publickey;
    $det=$_POST['details'];
   // $finaldetails=$det.replace(" ","+");
    $details=base64_decode($det);

    //echo $details;
    //$rsa->loadKey($publickey);
    $plaindata = $rsa2->decrypt($details);
    echo $finalsampleno.";".$plaindata;
}}
?>