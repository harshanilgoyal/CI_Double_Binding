<?php
$brandofmodulesquery="select brand_name from brand where brand_id IN(select distinct brand_id from items where category_id='2001' AND capacity_id='$capacityid')";
$brandofmodules=mysqli_query($link, $brandofmodulesquery);

?>
<div class="container-fluid" >

<div class="row">
<div class="col-lg">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4>Modules</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
            <div class="card" style="width: 12rem;margin:10px">
                    <img style="width: 12rem;border-radius:50%;" class="card-img-top" src="images/login.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text" align=center>Modules</p>
                    </div>
            </div>
            </div>
         <div class="col-sm-5">
            <form class="well form-horizontal">
                      <fieldset>
                         <div class="form-group row" style="padding:20px">
                            <label class="col-sm-3 control-label" >Brand</label>
                            <div class="col inputGroupContainer">
                               <div class="input-group">
                                  
                                  <select id="selectmodules" class="selectpicker form-control">
                                     <?php
                            while ($panel = mysqli_fetch_array($brandofmodules)) {
                                    ?>
                                    <option>
                                    <?php echo $panel['brand_name'] ?>
                                    </option>
                                    <?php }?>
                                  </select>
                               </div>
                            </div>
                         </div>

                         <?php //mysqli_data_seek($resultmodules,0);?>
                          <div class="form-group row"  style="padding:20px">
                            <label class="col-sm-3 control-label" >Wattage</label>
                            <div class="col-sm-5 inputGroupContainer">
                               <div class="input-group">
                                  
                                  <select id="selectwattage" class="selectpicker form-control">
                                  
                                  </select>
                               </div>
                            </div>
                         </div>
                          <div class="form-group row" style="padding:20px">
                            <label class="col-sm-3 control-label" >Qty</label>
                            <div class="col-sm-4 inputGroupContainer">
                               <div class="input-group">
                                  
                                  <input id="qty" onchange="qtychangehandler()" min=0 name="qty" placeholder="Qty" class="form-control"  value="" type="number"/>
                               </div>
                            </div>
                            <div class="col-sm-4 ">
                                <label id="capacitylabel" class="control-label" ></label><br>
                                <label id="capacityrem" class="control-label" style="color:red" ></label>
                               </div>
                            </div>
                         

                         
                      </fieldset>
                   </form>
        
                </div>
                <div class="col-sm-4">
             <table class="table  table-sm table-hover  table-striped">
  <thead>
    <tr>
      <th scope="col" style="border:1px solid black;">Unit Price</th>
      <th scope="col" style="border:1px solid black;">Price/Wp(<?=$capacity?> KW Project)</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td  id="unitprice" style="border:1px solid black;">1</td>
      <td id="priceperwatt" style="border:1px solid black;">Mark</td>
     
    </tr>
    <tr>
      <th scope="row" style="border-left:1px solid black;border-right:1px solid black;">Basic Cost</th>
      
      
      <td  id="basiccost" style="border-right:1px solid black"></td>
     
    </tr>
    <tr>
      <th scope="row"  style="border-left:1px solid black;border-right:1px solid black;">GST @ 5%</th>
      <td id="gst" colspan="2" style="border-right:1px solid black"></td>
      
    </tr>
    <tr>
      <th scope="row"  style="border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;">Total</th>
      <td id="total" colspan="2" style="border-right:1px solid black;border-bottom:1px solid black;"></td>
     
    </tr>
  </tbody>
</table>
        
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>
<script>


$("#selectmodules").ready(function(){
var selectedbrand=$("#selectmodules").val();
var capacityid= <?=$capacityid?>;  
callajaxforwatt(selectedbrand, capacityid);
//$("#module_desc").text(selectedbrand+$("#selectwattage option:selected").text());
});   
 

$("#selectmodules").change(function(){
   var selectedbrand=$("#selectmodules").val();
   var capacityid= <?=$capacityid?>; 
   callajaxforwatt(selectedbrand,capacityid);  
   $("#module_desc").text(selectedbrand);
   //$("#module_desc").text(selectedbrand+$("#selectwattage option:selected").text());
});



$("#selectwattage").change(function(){
       var selectedwatt=$("#selectwattage option:selected").text();
       var selectedwattvalue=$("#selectwattage option:selected").val();
       var watt=selectedwatt.split("-");
       var wattint = parseInt(watt[0], 10);
       var capacity=<?=$capacity?>;
       var capacityint = parseInt(capacity, 10);
       var qty=Math.floor(capacityint*1000/wattint);
       $("#qty").val(qty);
       $("#capacitylabel").text(qty*wattint/1000+" KW");
       $("#capacityrem").text(parseFloat((qty*wattint/1000)-capacityint).toFixed(4)+" KW");
        $("#unitprice").text(parseInt(selectedwattvalue).toLocaleString()+" Rs.");
        $('#basiccost').text(parseInt($("#qty").val()*selectedwattvalue) . toLocaleString()
+" Rs.");
        $('#priceperwatt').text(parseFloat($("#qty").val()*selectedwattvalue/capacityint/1000)+" Rs."); 
          $('#gst').text(parseInt($("#qty").val()*selectedwattvalue*0.05).toLocaleString()+" Rs.");
          $("#total").text(parseInt(($("#qty").val()*selectedwattvalue)+($("#qty").val()*selectedwattvalue*0.05)).toLocaleString()+" Rs.");  
       //alert($("#qty").val());
       $("#module_desc").text($("#selectmodules").val() + " "+selectedwatt);
       $("#summary_modules_basic").text( $('#basiccost').text());
      
       $("#summary_modules_perwp").text( $('#priceperwatt').text());
        $("#summary_modules_basic").trigger('change');
       
});

function qtychangehandler(){
   var selectedwatt=$("#selectwattage option:selected").text();
   var selectedwattvalue=$("#selectwattage option:selected").val();
   var watt=selectedwatt.split("-");
   var wattint = parseInt(watt[0], 10);
   var changedqty= $("#qty").val();
   var capacity=<?=$capacity?>;
   var capacityint = parseInt(capacity, 10);
   $("#capacitylabel").text(changedqty*wattint/1000+" KW");
   $("#capacityrem").text(parseFloat((changedqty*wattint/1000)-capacityint).toFixed(4)+" KW");
   $('#basiccost').text(parseInt(changedqty*selectedwattvalue) . toLocaleString()+" Rs.");
   $('#priceperwatt').text(parseFloat(changedqty*selectedwattvalue/capacityint/1000)+" Rs."); 
   $('#gst').text(parseInt(changedqty*selectedwattvalue*0.05).toLocaleString()+" Rs.");  
   $("#total").text(parseInt((changedqty*selectedwattvalue)+(changedqty*selectedwattvalue*0.05)).toLocaleString()+" Rs."); 
    $("#summary_modules_basic").text( $('#basiccost').text());
   
    $("#summary_modules_perwp").text( $('#priceperwatt').text());
     $("#summary_modules_basic").trigger('change');
}





function callajaxforwatt(selectedbrand,capacityid) {
$.ajax({
    type: 'post', // the method (could be GET btw)
    url: '././tabinput/selectmodules.php', // The file where my php code is
    data: {
        'test': selectedbrand ,
        'capacityid':capacityid
    },
    success: function(data) { // in case of success get the output, i named data
        //alert(data); // do something with the output, like an alert
        var a=data.split(";");


        $("#selectwattage").empty();
        for(var i=0;i<a.length-1;i=i+2){
            if(i==0){
                $("#selectwattage").append($("<option ></option>").attr("value", a[i+1]).text(a[i]).attr("selected","selected"));
            }
                else{
             $("#selectwattage").append($("<option></option>")
     .attr("value", a[i+1]).text(a[i]));
                }
        }
       
var selectedwatt=$("#selectwattage option:selected").text();
var selectedwattvalue=$("#selectwattage option:selected").val()
       var watt=selectedwatt.split("-");
       var wattint = parseInt(watt[0], 10);
       var capacity=<?=$capacity?>;
       var capacityint = parseInt(capacity, 10);
       var qty=Math.floor(capacityint*1000/wattint);
       $("#qty").val(qty);
       $("#capacitylabel").text(qty*wattint/1000+" KW");
       $("#capacityrem").text(parseFloat((qty*wattint/1000)-capacityint).toFixed(4)+" KW");
       $("#unitprice").text(parseInt(selectedwattvalue).toLocaleString()+" Rs.");
       $('#basiccost').text(parseInt($("#qty").val()*selectedwattvalue) . toLocaleString()+" Rs.");
$('#priceperwatt').text(parseFloat($("#qty").val()*selectedwattvalue/capacityint/1000)+" Rs."); 
$('#gst').text(parseInt($("#qty").val()*selectedwattvalue*0.05).toLocaleString()+" Rs."); 
$("#total").text(parseInt(($("#qty").val()*selectedwattvalue)+($("#qty").val()*selectedwattvalue*0.05)).toLocaleString()+" Rs.");  
    
    $("#module_desc").text(selectedbrand+$("#selectwattage option:selected").text());
     $("#summary_modules_basic").text( $('#basiccost').text());
    
     $("#summary_modules_perwp").text( $('#priceperwatt').text());
 $("#summary_modules_basic").trigger('change');
    }
});}


</script>