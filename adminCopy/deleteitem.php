<div class="modal fade" id="deleteModal<?php echo $row['itemno'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#F00;">
        <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/adminCopy/img/delete.png" width="30px"/> DELETE ITEM/STOCK</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="#"  data-toggle="tooltip" title="Close" class="pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div><br>
    </div></div>
      
      </div>
      <div class="modal-body">
      <h3>Are you sure you want to DELETE <?php echo '<strong style="color:#F00;">'.$row['item_name'].'&nbsp;'.$row['description'].'&nbsp;'.$row['specification'].'?</strong>';?></h3>
      </div>
      <div class="modal-footer">
        <a href="deleteitem_process?id=<?php echo $row['itemno'];?>" role="button" class="btn btn-danger">YES</a>
        <a href="#" role="button" class="btn btn-default" data-dismiss="modal">NO</a>
      </div>
    </div>
  </div>
</div>
<!-------end deleteModal------->