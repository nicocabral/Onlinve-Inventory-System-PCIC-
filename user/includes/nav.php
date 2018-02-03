 <header class="main-header">
    <nav class="navbar navbar-static-top" style="background-color:#0C6;">
      <div class="container" >
        <div class="navbar-header">
        
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li  style="font-family:'Comic Sans MS', cursive" class="active"><a href="index1" data-toggle="tooltip" title="Home Page"><center><img src="/PCIC/img/icon/home.png" class="img-responsive" width="40px;" data-toggle="tooltip" title="Home Page" data-placement="bottom"/></center> <strong>HOME</strong><span class="sr-only">(current)</span></a></li>
            <li style="font-family:'Comic Sans MS', cursive"> <a href="requisitionandissuanceslip_page"><img src="/PCIC/img/icon/report.png" class="img-resposive" width="37px" data-toggle="tooltip" title="REQUISITION AND ISSUANCE SLIP" data-placement="bottom" /> <br /><strong>RIS</strong><span class="badge" style="background-color:#F00; color:#FFF;" data-toggle="tooltip" title="<?php echo @$_SESSION['title'];?>" data-placement="bottom"><?php include('includes/dbconn.php');
			$name=$_SESSION['name'];
			$query = mysql_query("SELECT COUNT(*) as newris FROM pcic_requestitem WHERE status = 'Completed' AND requested_by = '$name'") or die(mysql_error());
			if($rows = mysql_fetch_array($query)){
				$newris = $rows['newris'];
				if($newris==0){
					$_SESSION['title'] = 'You have &nbsp;'.$newris.'&nbsp;notification';}else{
							$_SESSION['title'] = 'You have &nbsp;'.$newris.'&nbsp;notification';
						}
				echo $rows['newris'];
			
			}mysql_close($con);?></span></a></li>
            <li  class="dropdown" style="font-family:'Comic Sans MS', cursive"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><center><img src="/PCIC/img/icon/request.png" class="img-resposive" width="41px" data-toggle="tooltip" title="ANNUAL PROCUREMENT PLAN" data-placement="bottom"/></center><strong>APP</strong></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="upload" data-toggle="tooltip" title="Upload File" data-placement="right"><span class="glyphicon glyphicon-upload"></span>Upload</a></li>
                <li><a href="download" data-toggle="tooltip" title="Download File" data-placement="right"><span class="glyphicon glyphicon-download"></span>Download</a></li>
                
                
                
              </ul></li>
            
           
            
               
                
                
                
              </ul>
            </li>
          </ul>
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
           
            <!-- User Account Menu -->
            <li class="dropdown user user-menu"  style="font-family:'Comic Sans MS', cursive">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <center><img src="/PCIC/adminCopy/img/admin.png" class="img-responsive" width="40px;" /></center>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><strong>Welcome, <?php echo $_SESSION['name'];?></strong></span>
              </a>
              <ul class="dropdown-menu" >
                <!-- The user image in the menu -->
               
                <li class="user-header" style="background-color:#0C3;">
                  <img src="img/admin.png" class="img-circle" alt="User Image" width="45px">
                  
                 <p><?php echo date('D-m-Y');?></p>
                </li>
                <li><a href="update_account"><span class="glyphicon glyphicon-cog"></span> Update Account</a></li>
                <li class="divider"></li>
                <li><a href="change_password"><span class="glyphicon glyphicon-cog"></span> Change password</a></li>
                <li><a href="logout_process?logout=1"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                
              </ul>
            
            </li>
              
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
     </header>
     <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/inventory3.png" width="45px"/> STOCK CARD</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="#"  data-toggle="tooltip" title="Close" class="pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body">
        <form method="post" action="inventorybackup">
     <div class="row">
     <div class="col-md-12">
  <div class="form-group has-success">
    <label for="exampleInputEmail1">Item Name</label>
    <?php include('includes/dbconn.php');
		$sql = mysql_query("SELECT stockno,stockitemname FROM pcic_stockcard order by stockitemname") or die (mysql_error());
			?>
        <select id="id" name="id" class="form-control">
        <option></option>
        <?php 
		if(mysql_num_rows($sql)>0){
		while($row=mysql_fetch_array($sql)){?>
        <option value="<?php echo $row['stockno'];?>"><?php echo '<strong style="font-size:14px;">'.$row['stockitemname'].'</strong>';?></option>
        <?php }} else {?>
        <option><span style="color:#F00;">No data available</span></option>
        <?php } mysql_close($con);?>
        </select>
  </div></div>
   <div class="col-md-11">
  </div>
  </div>
  
    <div class="row">
    <div class="col-md-11">
   
  

 </div>
 
 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="submit" id="submit"><span class="glyphicon glyphicon-search"></span> Submit</button>
      </div>
</div>
</form>
      </div>
      
    </div>
  </div>
</div>
<!----------------end of modal stockcard------------>
 <!-- Modal for stock inventory -->
<div class="modal fade" id="myModalinventory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/inventory2.png" width="45px"/> STOCK INVENTORY</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="#"  data-toggle="tooltip" title="Close" class="pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body">
        <form method="post" action="stockinventorybackup">
    <div class="row">
    <div class="col-md-11">
   <div class="col-md-5">
   <div class="form-group">
    <label for="exampleInputEmail1">DATE FROM</label>
    <input type="date" class="form-control" id="from" name="from">
  </div></div>
 <div class="col-md-5">
   <div class="form-group">
    <label for="exampleInputEmail1">DATE TO</label>
    <input type="date" class="form-control" id="to" name="to" required>
  </div></div>
 </div>
 
 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="submit" id="submit"><span class="glyphicon glyphicon-search"></span> Submit</button>
      </div>
</div>
</form>
      </div>
      
    </div>
  </div>
</div>

<!-----Print Modal------->
<div class="modal fade bs-example-modal-sm" tabindex="-1" id="modalPrint" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
     <div class="modal-header" style="background-color:#0C3;">
    <div class="row">
        <div class="col-md-12">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/printer.ico" width="45px"/> Print Request by:</span>
       </div> 

                                    </div></div>
      <div class="modal-body">
       <form method="post" action="printrequest">
       Print:<span style="padding-left:1px;"><select id="printsel" name="printsel" >
       <option value="Completed">Completed</option>
       <option value="Pending">Pending</option>
       </select>
       <select id="dep" name="dep" >
       <option value="AFD">AFD</option>
       <option value="CAD">CAD</option>
       <option value="MSD">MSD</option>
       </select></span>
       <button name="printreq" id="printreq" type="submit"><span class="glyphicon glyphicon-print"></span> Print</button>
       </form>
      </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>