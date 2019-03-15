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
    $id=$_SESSION['id'];
    $capacity = $_POST['capacity'];
    $tittle = $_POST['tittle'];
    $subsidy = 0;
    if (isset($_POST['subsidy'])) {
        $subsidy = $_POST['subsidy'];
    }
    $place = $_POST['place'];
    $pincode = $_POST['pincode'];
    if ($_POST['type'] == "1") {
        $type = "Residential";} elseif ($_POST['type'] == "2") {
        $type = "Commercial";
    } elseif ($_POST['type'] == "3") {
        $type = "Industrial";
    }
    $reportid=$_POST['reportid'];
    

    $queryreportinsert= "INSERT INTO reports (report_id,type,tittle,subsidy,pincode,place,user_id) VALUES('$reportid','$type','$tittle','$subsidy','$pincode','$place','$id')";

   
   mysqli_query($link, $queryreportinsert);
    
    $reportidafterinsert = $reportid;

$capacityquery = "select capacity_id from capacity where max_capacity>='$capacity' AND min_capacity<'$capacity'";
$capacityresult = mysqli_query($link, $capacityquery);
$capacityrow = mysqli_fetch_array($capacityresult);
$capacityid = $capacityrow['capacity_id'];
include('tabinputhtml.php');
}

else {
    header("Location:login.php");
}
?>
