
    <!------modal------->
    <div class="modal fade" id="updateedp<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
      <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon_png/c_blacklist_256.png" width="45px"/> UPDATE EQUIPMENT</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="officeTable"  data-toggle="tooltip" title="Close" class="pull-right" ><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body" style="font-size:16px;">
        
    	<form class="form-horizontal" method="post" action="officeupdate_inventoryprocess">
   <div class="row">
  <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
   <input type="hidden" name="idno" value="<?php echo $row['oid'];?>" />
    <input type="hidden" name="mdep" value="<?php echo $row['m_dep'];?>" />
    <input type="hidden" name="amount" value="<?php echo $row['amount'];?>" />
     <input type="hidden" name="name" value="<?php echo $row['itemname'];?>" />
            <input type="hidden" name="qty" value="<?php echo $row['qty'];?>" />
        <input type="hidden" name="dateacquired" value="<?php echo $row['date_acquired'];?>" />
        <input type="hidden" name="sval" value="<?php echo $row['s_val'];?>" />
  
   <div class="col-xs-6 col-sm-6 col-md-6">
  
    <center><label>PREVIOUS DATE UPDATED</label></center>
    <div class="form-group has-success">
 <div class="col-lg-12">
 
 <?php $id = $row['oid'];
 include('includes/dbconn.php');
 $q = mysql_query("SELECT date ,oid FROM office_ledgercard WHERE oid = '$id' order by date desc") or die (mysql_error());
 if($r = mysql_fetch_array($q)){?>
   <input type="text" class="form-control" name="pdate" value="<?php $d = $r['date'];
   																	 $sd = new DateTime($d);
																	 echo $sd->format('M d, Y');?>" data-toggle="tooltip" title="<?php $date = $r['date'];
   																															$isdate = new DateTime($date);
																															echo 'LAST UPDATED ON '.$isdate->format('M d, Y');?>" readonly="readonly"/>
   <?php }
	$dateacuired = mysql_query("SELECT date, oid FROM office_ledgercard WHERE oid = '$id' GROUP by oid") or die (mysql_error());
	if($a = mysql_fetch_array($dateacuired)){
	?>         <input type="hidden" name="datea" value="<?php echo $a['date'];?>" />
    <?php } ?>                                                                                                                       
   
  </div>
  </div>
  </div>

    
   <div class="col-xs-6 col-sm-6 col-md-6">
  
    <center><label>DATE</label></center>
    <div class="form-group has-success">
 <div class="col-lg-12">
     <input type="date" class="form-control" name="date" required />
   
  </div>
  </div></div></div>
 
  <div class="modal-footer">
 
<center><button type="submit" class="btn btn-success btn-block" name="save"><span class="glyphicon glyphicon-open"></span> Update</button>
		<button type="reset" class="btn btn-default btn-block" ><span class="glyphicon glyphicon-erase"></span> CLEAR</button></center>
</div>

</form>
        </div>
      
    </div>
  </div>
</div>
<!----end of modal-------->

   