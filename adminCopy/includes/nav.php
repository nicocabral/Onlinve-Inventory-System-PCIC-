
  <header class="main-header mydivs">
    <nav class="navbar navbar-statis-top mydivs" style="background-color:#0C6;">
      <div class="container">
      <div class="navbar-header" style="background-color: #9F0;">
        
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <h1><i class="glyphicon glyphicon-menu-hamburger" data-toggle="tooltip" title="Click me to view Navbars" data-placement="bottom"></i></h1>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
 
          <ul class="nav navbar-nav mydivs">
            <li  style="font-family:'Comic Sans MS', cursive" class="mydivs"><a href="index1" data-toggle="tooltip" title="Home Page"><center><img src="/PCIC/img/icon/home.png" class="img-responsive" width="40px;" data-toggle="tooltip" title="Home Page" data-placement="bottom"/></center> <strong>HOME</strong><span class="sr-only">(current)</span></a></li>
            <li style="font-family:'Comic Sans MS', cursive"> <a href="stockcard_page"><center><img src="/PCIC/img/icon/inventory3.png" width="40px;" class="img-responsive" data-toggle="tooltip" title="STOCK CARD" data-placement="bottom" /></center><strong>STOCK CARD</strong></a></li>
            <li style="font-family:'Comic Sans MS', cursive"> <a href="#myModalinventory" data-toggle="modal" data-target="#myModalinventory"><center><img src="/PCIC/img/icon/inventory2.png" width="47px;" class="img-responsive" data-toggle="tooltip" title="STOCKS INVENTORY" data-placement="bottom" /></center><strong> STOCKS INVENTORY</strong></a></li>
            <li style="font-family:'Comic Sans MS', cursive"> <a href="requisitionandissuanceslip_page"><img src="/PCIC/img/icon/report.png" class="img-resposive" width="37px" data-toggle="tooltip" title="REQUISITION AND ISSUANCE SLIP" data-placement="bottom" /> <br /><strong>RIS</strong><span class="badge" style="background-color:#F00; color:#FFF;" data-toggle="tooltip" title="<?php echo @$_SESSION['title'];?>" data-placement="bottom"><?php include('includes/dbconn.php');
			$query = mysql_query("SELECT COUNT(*) as newris FROM pcic_requestitem WHERE status = 'Pending'") or die(mysql_error());
			if($rows = mysql_fetch_array($query)){
				$newris = $rows['newris'];
				if($newris==0){
					$_SESSION['title'] = 'You have &nbsp;'.$newris.'&nbsp;Request';}else{
							$_SESSION['title'] = 'You have &nbsp;'.$newris.'&nbsp;Request';
						}
				echo $rows['newris'];
			
			}mysql_close($con);?></span></a></li>
            <li style="font-family:'Comic Sans MS', cursive"> <a href="purchase_page"><center><img src="/PCIC/img/icon/purchaseorder.png" class="img-resposive" width="41px" data-toggle="tooltip" title="ITEM PURCHASE" data-placement="bottom" /></center><strong>PURCHASE</strong></a></li>
             <li class="dropdown" style="font-family:'Comic Sans MS', cursive"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><center><img src="/PCIC/img/icon/request.png" class="img-resposive" width="41px" data-toggle="tooltip" title="ANNUAL PROCUREMENT PLAN" data-placement="bottom"  /></center><strong>APP</strong></a>
             <ul class="dropdown-menu" role="menu">
                <li><a href="upload" data-toggle="tooltip" title="Upload Annual procure plan" data-placement="right"><span class="glyphicon glyphicon-upload"></span>Upload</a></li>
                <li><a href="download" data-toggle="tooltip" title="Download Annual procurement plan" data-placement="right"><span class="glyphicon glyphicon-download"></span> Download</a></li>
               
         
                
              </ul>
             </li>
            
            
            <li class="dropdown" style="font-family:'Comic Sans MS', cursive">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><center><img src="/PCIC/img/icon/tools.png" width="41px;" class="img-responsive" data-toggle="tooltip" title="MANAGE" data-placement="bottom"/></center> <strong>MANAGE</strong> </a>
              <ul class="dropdown-menu" role="menu">
              <li><a href="availablestocks_page" data-toggle="tooltip" title="Request available stocks" data-placement="right"><span class="glyphicon glyphicon-cog"></span> Available Stocks</a></li>
              <li><a href="cf_inventory_page" data-toggle="tooltip" title="Manage CF" data-placement="right"><span class="glyphicon glyphicon-cog"></span> CF Inventory</a></li>
              
              <li><a href="stock_page" data-toggle="tooltip" title="Manage Stocks" data-placement="right"><span class="glyphicon glyphicon-cog"></span> Stocks</a></li>
              <li><a href="stockcard" data-toggle="tooltip" title="Manage Stockcard" data-placement="right"><span class="glyphicon glyphicon-cog"></span> Stockcard</a></li>  
                 <li><a href="system_user_page" data-toggle="tooltip" title="Add new system user accounts" data-placement="right"><span class="glyphicon glyphicon-cog"></span> System User</a></li>
                <li class="divider"></li>
                <li><a href="database" data-toggle="tooltip" title="Back up and restore database" data-placement="right"><span class="glyphicon glyphicon-hdd"></span> Database</a></li>
 </ul>
            </li>
            <li class="dropdown" style="font-family:'Comic Sans MS', cursive">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><center><img src="/PCIC/img/icon/supplier.png" width="41px;" class="img-responsive" data-toggle="tooltip" title="MANAGE" data-placement="bottom"/></center> <strong>PROPERTY & EQUIPMENT</strong> </a>
              <ul class="dropdown-menu" role="menu">
              	 <li><a href="edp" data-toggle="tooltip" title="Manage EDP Equipment" data-placement="right"><span class="glyphicon glyphicon-cog"></span>EDP Equipment</a></li>
                <li><a href="office_equipment_page" data-toggle="tooltip" title="Manage Office Equipment" data-placement="right"><span class="glyphicon glyphicon-cog"></span>Office Equipemnt</a></li>
                <li><a href="furnitureandfixture_page" data-toggle="tooltip" title="Manage Furniture and Fixtures" data-placement="right"><span class="glyphicon glyphicon-cog"></span>Furniture & Fixtures</a></li>
                 <li><a href="transportation_page" data-toggle="tooltip" title="Manage Transportation Equipment" data-placement="right"><span class="glyphicon glyphicon-cog"></span>Transportation Equipment</a></li>
                
 </ul>
            </li>
          
            <!-- User Account Menu -->
            <li class="dropdown"  style="font-family:'Comic Sans MS', cursive">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <center><img src="/PCIC/adminCopy/img/admin.png" class="img-responsive" width="40px;" /></center>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><strong><?php echo $_SESSION['name'];?></strong></span>
              </a>
              <ul class="dropdown-menu" >
                <!-- The user image in the menu -->
               
               
                <li><a href="update_account"><span class="glyphicon glyphicon-cog"></span> Update Account</a></li>
             
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
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
       <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/printer.ico" width="45px"/>OFFICE SUPPLIES INVENTORY</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="#"  data-toggle="tooltip" title="Close" class="pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body">
        <form method="post" action="printitems">
     <div class="row">
     <div class="col-md-6">
  <p><i class="glyphicon glyphicon-calendar"></i>SELECT YEAR</p>
  <div class="input-group">
 
  <select name="year" class="form-control"><?php ddY()?>
  
  </select>  

<?php

function ddY(){
        for($i=2013;$i<=date('Y');$i++)
        $arr[] = $i;
        $arr = array_reverse($arr);
        foreach($arr as $year){ 
         if($year == date('Y')) {
         echo '
		 <option>SELECT YEAR</option>
<option></option>
		 <option value="'.$year.'" selected="selected">'.$year.'</option>';

         } else {
            echo '<option value="'.$year.'">'.$year.'</option>
			';
        }



        //echo'<option value="'.$year.'">'.$year.'</option>'; 
    } 
    }

?>
<span class="input-group-btn">
 <button type="submit" class="btn btn-success" name="submit" id="submit"><span class="glyphicon glyphicon-print"></span> Print</button></span>
  </div></div>
 
  </div>
  <div class="row">
   <div class="col-lg-12">
  <p><i class="glyphicon glyphicon-print"></i> PRINT STOCK (CONSUMABLE / NON - CONSUMABLE)</p>
  	<div class="input-group">
      <select class="form-control" name="category">
      	<option></option>
        <option value="Consumable">CONSUMABLE</option>
        <option value="Non-consumable">NON - CONSUMABLE</option>
      </select>
      <span class="input-group-btn">
        <button class="btn btn-warning" type="submit" name="printcategory"><i class="glyphicon glyphicon-print"></i> Print</button>
      </span>
    </div><!-- /input-group -->

  </div>
 
 </div>
   <div class="col-md-11">
  </div>
  
  
    <div class="row">
    <div class="col-md-11">
   
  

 </div>
  <br />
 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
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
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
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
      
                <div class="form-group">
                
                    <select style="width:100%;" id="option" class="form-control">
                        <option>------------ Search by ------------</option>
                       	<option></option>
                        <option value="rangeinventory">Inventory Report</option>
                        <option value="range">Issued Report</option>
                    </select>
                </div>
 <!-- search by date range -->
                 <form action="stockinventorybackup" method="POST">
                    <div id="rangeinventory" class="form-group input-group">
                 		<p><span class="glyphicon glyphicon-book"></span> Inventory Report</p>
                        <div class="col-md-4">  <strong><span class="glyphicon glyphicon-calendar"></span> Date from</strong>
                      <input type="date" name="from" class="form-control"></div>
                     
                        <div class="col-md-4"><strong> <span class="glyphicon glyphicon-calendar"></span> Date to</strong>
                     <input type="date" name="to" class="form-control"></div>
                        <div class="col-md-4">
                        <br />
                            <button  name="submit" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Submit</button>
                        </div>
                    </div>
                 </form>
                  <form action="stockinventorybackupCopy" method="POST">
                    <div id="range" class="form-group input-group">
                 <p><span class="glyphicon glyphicon-list-alt"></span> Issued Report</p>
                        <div class="col-md-4">  <strong><span class="glyphicon glyphicon-calendar"></span> Date from</strong>
                      <input type="date" name="from" class="form-control"></div>
                     
                        <div class="col-md-4"><strong><span class="glyphicon glyphicon-calendar"></span> Date to</strong>
                     <input type="date" name="to" class="form-control"></div>
                        
                        <div class="col-md-4"><br />    <button  name="range" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Submit</button></div>
                        
                    </div>
                 </form>
      </div>
      
    </div>
  </div>
</div>
 <script type="text/javascript">
    $("#range").hide();
    $("#rangeinventory").hide();

   $(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            if($(this).attr("value")=="range"){
                $("#rangeinventory").hide();
                $("#range").show(200);
              
            }
            else if($(this).attr("value")=="rangeinventory"){
                 $("#rangeinventory").show(200);
                $("#range").hide();
               
            }
          else{
                $("#rangeinventory").hide();
                $("#range").hide();
               
            }

        });
    }).change();
    });
  </script>
<?php include('items1.php');?>
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