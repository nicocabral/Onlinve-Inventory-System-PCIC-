<script>
function totalCost() {
            var txtnumberUcost = document.getElementById('ucost').value;
			var txtnumberqty = document.getElementById('qty').value;
            var resTcost = parseFloat(txtnumberUcost) * parseFloat(txtnumberqty);
            
			
            if (!isNaN(resTcost)) {
                document.getElementById('tcost').value = resTcost;
				}


}		
			
			
</script>
    <!------modal------->
    <div class="modal fade" id="myModalupdatestock<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
      <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/receiveditem.png" width="45px"/> RE-STOCK ITEM</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="stock_pageTable"  data-toggle="tooltip" title="Close" class="pull-right" ><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body" style="font-size:16px;">
      <form method="post" action="edititems_process">
      <div class="row">
      <div class="col-lg-12">
      <center><strong><?php echo $row['item_name'];?></strong></center><br />
      <input type="hidden" value="<?php echo $row['item_name'];?>" class="form-control" id="itemname" name="itemname"  required />
      <input type="hidden" value="<?php echo $row['description'];?>" class="form-control" id="des" name="des"  required />
      <input type="hidden" value="<?php echo $row['specification'];?>" class="form-control" id="spec" name="spec"  required />
      <input type="hidden" value="<?php echo $row['unit'];?>" class="form-control" id="unit" name="unit"  required />
      <div class="col-md-6">
      <div class="form-group">
      <label>Qty</label>
	  <input type="number" value="<?php echo $row['bal_qty'];?>" class="form-control" id="qty" name="qty" onKeyUp="totalCost();" required />
      <input type="hidden" value="<?php echo $row['bal_qty'];?>" class="form-control" id="bqty" name="bqty" onKeyUp="totalCost();" required />
      <input type="hidden" value="<?php echo $row['itemno'];?>" class="form-control" id="itemno" name="itemno"  required />
      <input type="hidden" value="<?php echo $row['id'];?>" class="form-control" id="id" name="id"  required />
      </div></div>
     
      <div class="col-md-6">
      <div class="form-group">
      <label>Unit Cost</label>
	  <input type="number" step="any" value="<?php echo $row['unit_cost'];?>" class="form-control" id="ucost" name="ucost" onkeyup="totalCost();" required />
      </div></div>
      
      </div>
       <div class="col-lg-12">
      <div class="col-md-6">
      <div class="form-group">
      <label>Total Cost</label>
	  <input type="text" value="<?php echo $row['total_cost'];?>" class="form-control" id="tcost" name="tcost" required  readonly="readonly"/>
      </div></div>
      <div class="col-md-6">
      <div class="form-group">
      <label>Date</label>
	  <input type="date" value="<?php echo $row['date_arrival'];?>" class="form-control" id="date" name="date" required />
      </div></div>
      
      </div>
      
      
      </div>
      <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="update" id="update"><span class="glyphicon glyphicon-saved"></span> Update</button>
      <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
      </div>
      </form>
     
        </div>
      
    </div>
  </div>
</div>
<!----end of modal-------->

   