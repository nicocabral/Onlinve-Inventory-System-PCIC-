<div class="modal fade" id="appModal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
      <div class="modal-header" style="background-color: #0C6;">
        <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon_png/c_abacus_256.png" width="30px"/> Total Quantity Requirements</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="#"  data-toggle="tooltip" title="Close" class="pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div><br>
    </div></div>
      
      </div>
      <div class="modal-body">
      <div class="row">
      	<div class="col-lg-12">
        
        	<form class="form-horizontal" method="post" action="app_process">
            <input type="hidden" name="itmno" value="<?php echo $row['itemno'];?>" />
            <input type="hidden" name="itemname" value="<?php echo $row['item_name'];?>" />
          
            <div class="col-lg-4">
            <label>Quantity</label>
            <input type="number" name="qty" class="form-control" />
            
            </div> 
            <div class="col-lg-4">
            <label>Department</label>
            <select name="dep" class="form-control">
            <option></option>
            <option value="AFD"> AFD</option>
            <option value="CAD"> CAD</option>
            <option value="MSD"> MSD</option>
            
            </select>
            </div>
       <div class="col-lg-4">
   
              <div class="modal-footer">
              <label></label><br /><br /><br /><br />
       <button type="submit" class="btn btn-success btn-block" name="submit" > Submit</button>
       
      </div>    </div>
            </form>
        </div>
      </div>
      
      
      </div>
    
    </div>
  </div>
</div>
<!-------end deleteModal------->