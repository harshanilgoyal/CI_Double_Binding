 <?php
 include('dbconfig.php');
 $brandselected=$_POST['test'];
 $capacityid=$_POST['capacityid'];
 $wattquery = "select item_name,price_unit from items where brand_id=(select brand_id from brand where brand_name='$brandselected'AND capacity_id='$capacityid')";
 
$watt=mysqli_query($link, $wattquery);
while($wattrow=mysqli_fetch_array($watt)){
echo $wattrow['item_name'],';',$wattrow['price_unit'],';';}
?>