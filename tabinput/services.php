
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
                                  <?php mysqli_data_seek($resultmodules, 0);?> 
                                  <select id="selectmodules" class="selectpicker form-control">
                                     <?php
                            while ($panel = mysqli_fetch_array($resultmodules)) {
                                    ?>
                                    <option>
                                    <?php echo $panel['brand'] ?>
                                    </option>
                                    <?php }?>
                                  </select>
                               </div>
                            </div>
                         </div>

                         <?php mysqli_data_seek($resultmodules,0);?>
                          <div class="form-group row"  style="padding:20px">
                            <label class="col-sm-3 control-label" >Wattage</label>
                            <div class="col-sm-4 inputGroupContainer">
                               <div class="input-group">
                                  
                                  <select class="selectpicker form-control">
                                     <?php
                            while ($panel = mysqli_fetch_array($resultmodules)) {
                                    ?>
                                    <option>
                                    <?php echo $panel['wattage'] ?>
                                    </option>
                                    <?php }?>
                                  </select>
                               </div>
                            </div>
                         </div>
                          <div class="form-group row" style="padding:20px">
                            <label class="col-sm-3 control-label" >Qty</label>
                            <div class="col-sm-4 inputGroupContainer">
                               <div class="input-group">
                                  
                                  <input id="qty" min=0 name="qty" placeholder="Qty" class="form-control"  value="" type="number">
                               </div>
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
      <th scope="col" style="border:1px solid black;">Price/Wp</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td  style="border:1px solid black;">1</td>
      <td style="border:1px solid black;">Mark</td>
     
    </tr>
    <tr>
      <th scope="row" style="border-left:1px solid black;border-right:1px solid black;">Basic Cost</th>
      
      
      <td  style="border-right:1px solid black">Jacob</td>
     
    </tr>
    <tr>
      <th scope="row"  style="border-left:1px solid black;border-right:1px solid black;">GST @ 5%</th>
      <td colspan="2" style="border-right:1px solid black">Larry the Bird</td>
      
    </tr>
    <tr>
      <th scope="row"  style="border-left:1px solid black;border-right:1px solid black;border-bottom:1px solid black;">Total</th>
      <td colspan="2" style="border-right:1px solid black;border-bottom:1px solid black;">Larry the Bird</td>
     
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