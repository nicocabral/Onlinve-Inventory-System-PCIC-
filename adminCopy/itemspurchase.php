<script>
function totalCost() {
            var txtnumberUcost = document.getElementById('ucost').value;
			var txtnumberqty = document.getElementById('qty').value;
            var resTcost = parseFloat(txtnumberUcost) * parseFloat(txtnumberqty);
            
			
            if (!isNaN(resTcost)) {
                document.getElementById('tcost').value = resTcost;
				}
			if(txtnumberUcost == '' && txtnumberqty ==''){
				restTcost = 0;
				
				}

}		
			
			
</script>
    <!------modal------->
    <div class="modal fade" id="myModaladditem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/addsupplier.png" width="45px"/> PURCHASE ITEM</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="purchase_pageTable"  data-toggle="tooltip" title="Close" class="pull-right" ><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body">
      <div id="logMsg"></div>
       <form method="post" action="saveitem_process">
      <div class="row">
      <div class="col-lg-12">
     <div class="row">
     <div class="col-md-12">
  <div class="form-group">
    <label for="exampleInputEmail1">Item Name</label>
    <input type="text" class="form-control" id="itemname" name="itemname" placeholder="Item Name" required>
  </div></div></div>
  <div class="row">
     <div class="col-md-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" class="form-control" id="description" name="description" placeholder="Item Description" required>
  </div></div></div>
   <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Unit</label>
    <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" required>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-lg-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Quantity</label>
    <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity" onkeyup="totalCost();" required>
  </div></div></div>
  <div class="row">
     <div class="col-md-12">
   <div class="form-group">
    <label for="exampleInputEmail1">Specification</label>
    <input type="text" class="form-control" id="spec" name="spec" placeholder="Item Specification" required>
  </div></div></div>
   <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Unit Cost</label>
    <input type="text" class="form-control" id="ucost" name="ucost" placeholder="0.00" onkeyup="totalCost();"  required>
  </div></div>
  
   <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Total Cost</label>
    <input type="number" class="form-control" id="tcost" name="tcost" placeholder="0.00" required readonly>
  </div></div></div>
  <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Date Arrival</label>
    <input type="date" class="form-control" id="date" name="date" required>
  </div></div>
  
  </div>
 
  <button type="submit" class="btn btn-success" id="submit"><span class="glyphicon glyphicon-save"></span> Save</button>
  <button type="reset" class="btn btn-default">Clear</button>
</div></div>
</form>
      </div>
      
    </div>
  </div>
</div>
<!----end of modal-------->
