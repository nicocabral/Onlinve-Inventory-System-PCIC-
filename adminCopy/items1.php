<script>
function totalCost() {
            var txtnumberUcost = document.getElementById('ucost').value;
			var txtnumberqty = document.getElementById('qty').value;
            var resTcost = parseFloat(txtnumberUcost).toFixed(2) * parseFloat(txtnumberqty).toFixed(2);
            
			
            if (!isNaN(resTcost)) {
                document.getElementById('tcost').value = resTcost.toFixed(2);
				}
			if(txtnumberUcost == '' && txtnumberqty ==''){
				restTcost = 0;
				
				}

}		
			
			
</script>
    <!------modal------->
    <div class="modal fade" id="myModaladdstock" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
      <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon_png/file_write_128.png" width="45px"/> ADD STOCK</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="stock_page"  data-toggle="tooltip" title="Close" class="pull-right" ><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body">
       <div class="row">
      	<div class="col-lg-12">
        <div id="ackMsg"></div>
        </div></div>
       <form id="formsaveItemprocess">
  
    <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
      <?php include('includes/dbconn.php');
	  $sql = mysql_query("SELECT itemno FROM pcic_items order by itemno") or die (mysql_error());
	  $itemno =1;
	
		  while($row = mysql_fetch_array($sql)){
			  if($row['itemno'] == ''){
				  $itemno = 1;}else{
			  $itemno =$row['itemno']+1;
			  ?>
   
     
     <?php } }?>

      <input type="hidden" class="form-control pull-left "id="itemno" name="itemno" value="<?php echo $itemno;?>" readonly="readonly">
       <label for="exampleInputEmail1">Item Name</label>
    <input type="text" class="form-control" id="itemname" name="itemname" placeholder="Item Name" required></div>

   <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea  class="form-control" id="description" name="description"required></textarea>
  </div></div></div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group ">
    <label for="exampleInputEmail1">Specification</label>
    <textarea class="form-control" id="spec" name="spec"  required></textarea>
  </div></div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
   <label for="exampleInputEmail1">Unit</label>
    <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" required>
  </div></div></div>
   <div class="row ">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Quantity</label>
    <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity" onkeyup="totalCost();" required>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-lg-6">
   <div class="form-group ">
    <label for="exampleInputEmail1">Unit Cost</label>
    <input type="number" step="any" class="form-control" id="ucost" name="ucost" placeholder="0.00" onkeyup="totalCost();"  required>
  </div></div></div>
   <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Total Cost</label>
    <input type="number" class="form-control" id="tcost" name="tcost" placeholder="0.00" required readonly>
  </div></div>
  
   <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Date Arrival</label>
    <input type="date" class="form-control" id="date" name="date" required>
  </div></div></div>
  <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
   <label for="exampleInputEmail1">Category</label>
    <select name="cat" class="form-control"> 
    <option></option>
	   <option value="Consumable">Consumable</option>
       <option value="Non-consumable">Non-consumable</option> 
    </select>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    
  </div></div>
  
  </div>
 <div class="modal-footer">
  <button type="submit" class="btn btn-success" id="submit"><span class="glyphicon glyphicon-save"></span> Save Stock</button>
  <button type="reset" class="btn btn-default">Clear</button>
</div>
</form>
<script type="text/javascript">
	$("#formsaveItemprocess").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'saveitem_process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#ackMsg").empty();
	     $("#ackMsg").html(data);
		 
	    //alert(returndata);
	  }
	  });
	  return false;
	});


</script>
<script type="text/javascript">
	$("#itemname").keypress(function(){
	  $("#ackMsg").empty();
	  $("#ackMsg").removeClass();
	 	$("#description").val("");
		$("#spec").val("");
		$("#unit").val("");
		$("#qty").val("");
		$("#ucost").val("");
		$("#tcost").val("");
		$("#date").val("");
		$("#cat").val("");
		
	});
</script>
      </div>
      
    </div>
  </div>
</div>
<!----end of modal-------->
