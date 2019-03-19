<?php
include './databaseconnection/dbconfig.php';
$according=$_POST['according'];
$keyword = $_POST['keyword']."%";
//echo $keyword;
$query="select * from decrypt where $according like '$keyword'";
//echo $query;
$result=mysqli_query($link, $query);
$string="";
while($row=mysqli_fetch_row($result)){
$string=$string.$row[0].":;".$row[1].":;".$row[2].":;".$row[3].":;".$row[4].":;".$row[5].":;".$row[6].":;".$row[7]."HARSH";
}
echo $string;
?>