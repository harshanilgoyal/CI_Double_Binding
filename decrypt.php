<?php 

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


?>