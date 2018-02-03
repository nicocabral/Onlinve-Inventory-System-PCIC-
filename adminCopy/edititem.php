<script>
function totalCostupdate() {
            var txtnumberUcost = document.getElementById('ucostupdate').value;
			var txtnumberqty = document.getElementById('qtyupdate').value;
            var resTcost = parseFloat(txtnumberUcost) * parseFloat(txtnumberqty);
            
			
            if (!isNaN(resTcost)) {
                document.getElementById('tcostupdate').value = resTcost;
				}


}		
			
			
</script>
    <!------modal------->
    <div class="modal fade" id="updatestock<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
      <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon_png/c_blacklist_256.png" width="45px"/> EDIT ITEM</span>
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
      
      <div class="col-md-6">
      <div class="form-group">
      <label>Item Name</label>
	  <input type="text" value="<?php echo $row['item_name'];?>" class="form-control" id="itemname" name="itemname" required />
      <input type="hidden" value="<?php echo $row['id'];?>" class="form-control" id="id" name="id" required />
      <input type="hidden" value="<?php echo $row['itemno'];?>" class="form-control" id="itemno" name="itemno" required />
      </div></div>
      <div class="col-md-6">
      <div class="form-group">
      <label>Description</label>
	  <input type="text" value="<?php echo $row['description'];?>" class="form-control" id="des" name="des" required />
      </div></div>
      
      </div>
      <div class="col-lg-12">
      <div class="col-md-6">
      <div class="form-group">
      <label>Unit</label>
	  <input type="text" value="<?php echo $row['unit'];?>" class="form-control" id="unit" name="unit" required />
      </div></div>
      <div class="col-md-6">
      <div class="form-group">
      <label>Qty</label>
	  <input type="number" value="<?php echo $row['qty'];?>" class="form-control" id="qtyupdate" name="qty" onKeyUp="totalCostupdate();" required />
     
      </div></div>
      
      </div>
      <div class="col-lg-12">
      <div class="col-md-6">
      <div class="form-group">
      <?php $dis = '';if($row['bal_qty']==0){
		  $dis = 'readonly';}else {$dis='';}?>
      <label>Bal Qty</label>
	  <input type="number" value="<?php echo $row['bal_qty'];?>" class="form-control" id="bqty" name="bqty" required <?php echo $dis;?>/>
      </div></div>
      
      <div class="col-md-6">
      <div class="form-group">
      <label>Specification</label>
	  <input type="text" value="<?php echo $row['specification'];?>" class="form-control" id="spec" name="spec" required />
      </div></div></div>
      <div class="col-lg-12">
      <div class="col-md-6">
      <div class="form-group">
      <label>Unit Cost</label>
	  <input type="number" step="any" value="<?php echo $row['unit_cost'];?>" class="form-control" id="ucostupdate" name="ucost" onkeyup="totalCostupdate();" required />
      </div></div>
   
      <div class="col-md-6">
      <div class="form-group">
      <label>Total Cost</label>
	  <input type="text" value="<?php echo $row['total_cost'];?>" class="form-control" id="tcostupdate" name="tcost" required  readonly="readonly"/>
      </div></div></div>
      <div class="col-lg-12">
      <div class="col-md-6">
      <div class="form-group">
      <label>Date Arrival</label>
	  <input type="date" value="<?php echo $row['date_arrival'];?>" class="form-control" id="date" name="date" required />
      </div></div>
      <div class="col-md-6">
      <div class="form-group">
      <label>Category</label>
	  <select name="cat" class="form-control">
      <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
      <option value="Consumable">Consumable</option>
      <option value="Non-consumable">Non-consumable</option>
      </select>
      </div></div>
   
      
      </div>
      
      </div>
      <div class="modal-footer">
      <button class="btn btn-success" type="submit" name="edit" id="edit"><span class="glyphicon glyphicon-ok"></span> Save changes</button>
      <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
      </div>
      </form>
     
        </div>
      
    </div>
  </div>
</div>
<!----end of modal-------->

   