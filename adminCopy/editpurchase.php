
    <!----modal starts here--->
     
<div id="modalUpdate<?php echo $row['id'];?>" class="modal fade"  role='dialog'>
    <div class="modal-dialog">
     
        <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
            <div class="modal-header" style="background-color:#0C3; color:#FFF;">
              <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icons/pen_yellow.ico" width="45px"/> EDIT PURCHASE</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="purchase_pageTable"  data-toggle="tooltip" title="Close" class="pull-right" ><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
           
            <div class="modal-body">
            
            <form  method="post" action="#"> 
                <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
               <div class="form-group has-success">
   <center> <label for="inputEmail3">ITEM NAME</label></center>

       <input type="text" class="form-control" id="itemname" name="itemname"  value="<?php echo $row['p_itemname'];?>" required>
       <input type="hidden" class="form-control" id="id" name="id"  value="<?php echo $row['id'];?>" required>
    </div>
  </div>
   <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group has-success">
    <center><label for="inputEmail3">Quantity</label></center>

      <input type="text" class="form-control" id="qty" name="qty"  value="<?php echo $row['p_qty'];?>" required>
    </div>
  </div></div>
     <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
  
  <div class="form-group <?php echo $_SESSION['hasclass']='has-success';?>">
    <center><label for="inputEmail3">Unit Cost</label></center>
      <input type="text" class="form-control" id="ucost" name="ucost" value="<?php echo $row['p_cost'];?>" required>
    </div>
  </div>
   <div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group <?php echo $_SESSION['hasclass']='has-success';?>">
    <center><label for="inputEmail3">Total Cost</label></center>

      <input type="text" class="form-control" id="ucost" name="ucost" value="<?php echo $row['p_tcost'];?>" required>
    </div>
  </div></div>
     <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group <?php echo $_SESSION['hasclass']='has-success';?>">
   <center> <label for="inputEmail3">Date</label></center>

      <input type="date" class="form-control" id="date" name="date" required>
    </div>
  </div></div>
 
             <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="update"><span class="glyphicon glyphicon-edit"></span> UPDATE</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>    
            </div>
           
        </div>
  
      </div>
  </div>



    