

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
    $id=$_POST['decrypt_id'];
    $sample_id=$_POST['sample'];
    $batch=$_POST['batch'];
    $place=$_POST['place'];
    $type=$_POST['type'];
    $agency=$_POST['agency'];
    $result=$_POST['optradio'];
    $remark=$_POST['remarks'];
    $query = "INSERT INTO decrypt (id,sample_id,batch,place,type,agency,result,remarks) values ($id,$sample_id,'$batch','$place','$type','$agency','$result','$remark')";
    
    if (mysqli_query($link, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($link);
}

} else {
    header("Location:./login/login.php");
}
