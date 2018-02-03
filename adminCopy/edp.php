<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if ($_SESSION['usertype'] =='user'){header("location:../user/");}else{?>
<?php include('includes/head.php');?>

<body class="hold-transition skin-blue layout-top-nav" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%; height:100%">

<div class="wrapper" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%;">

 
 <?php include('includes/nav.php');?>
 <!-- Modal -->
<div class="modal fade  bs-example-modal-lg" id="myModalledger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
       <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/edit.png" width="50px"/> EDIT EDP EQUIPMENT LEDGERCARD</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="edp"  data-toggle="tooltip" title="Close" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body">
        <script>
var xmlhttp;
if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
} else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

function showData(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getdata1.php?q="+str,true);
  xmlhttp.send();
}


</script>

<form method="post" action="">
<div class="row">
  <div class="col-md-6">
    <select id="mysel" class="form-control" name="grade" onchange="showData(this.value)">
    <option>SELECT ITEM</option>
   	<option></option>
   <?php $s = mysql_query("SELECT * FROM edp_equipement order by date_acquired") or die (mysql_error());
   if(mysql_num_rows($s)>0){
	   while($r = mysql_fetch_array($s)){
		   $isdate = new DateTime($r['date_acquired']);?>
	<option value="<?php echo $r['e_no'];?>"><?php echo $isdate->format('M d, Y').'&emsp;'.$r['itemname'];?></option>	
    <?php }}?>
    </select></div>
    
 </div>
  </form>
  
  <div class="row">
  <div class="col-lg-12">
  <br />
  <div id="txtHint">
  </div>

  <span class="col-lg-2"></span>
  <span class="col-lg-8">
  </span>
<span class="col-lg-2">
<span class="pull-right">
  <a  href="edp"  data-toggle="tooltip" title="Close" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Close</a></span></span></div>
</div>
      </div>
      
    </div>
  </div>
</div>

  <!-- Full Width Column -->
  <div class="content-wrapper" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%;">
    <div class="container" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%;">
     
	
      <!-- Main content -->
      <section class="content">
        <div class="box box-default" style="font-family:'Comic Sans MS', cursive;">
          <div class="row">
            <div class="col-lg-12">
          <div class="box-body">
          <center><h3 style="color:#093;"><img src="/PCIC/img/icon/receiveditem.png" width="40px" /> <strong>PROPERTY AND EQUIPMENT</strong></h3>
    		  <p><strong style="color:#039;"><img src="/PCIC/img/icon_png/a_calculator_256.png" width="25px;" /> EDP EQUIPMENT</strong></p></center>
             
            <div class="col-md-2">
 
                <div class="form-group">
                    <select style="width:100%;" id="option" class="form-control">
                        <option>SELECT ACTION</option>
                       	<option></option>
                        <option value="all">ADD ITEM</option>  
                         
                    </select>
                   
                </div>
                
            </div>
            <div class="col-lg-4">
            <div class="col-lg-2">
                <a href="#myModalledger" data-toggle="modal" data-target="#myModalledger" class="btn btn-success"><span class="glyphicon glyphicon-hand-up"></span> Edit Ledger Card here</a></div>
                
               
            </div>
       <span id="btn-all" class="col-lg-12">

	 	<form class="form-horizontal" method="post" action="edp_process">
    <script>
    function totalAmount(){
		var numA = document.getElementById('itmqty').value;
		var numB = document.getElementById('itmamount').value;
		var numF = document.getElementById('elife').value;
		var numC = parseFloat(numA).toFixed(2)  * parseFloat(numB).toFixed(2);
		var numD = parseFloat(numC).toFixed(2) * parseFloat(.10);
		
		if(!isNaN(numC)){
			document.getElementById('itmtamount').value = numC.toFixed(2);
		
			}
		if(numA == '' && numB == ''){
			document.getElementById('itmqty').value = 0;
			document.getElementById('itmtamount').value=0;
			document.getElementById('stamount').value =0;
			document.getElementById('mdep').value = 0;}
		if(!isNaN(numD)){
			var numE = (parseFloat(numC) - parseFloat(numD)) / parseFloat(numF);
			document.getElementById('stamount').value = numD.toFixed(2);
			
			}
		if(!isNaN(numE)){
			document.getElementById('mdep').value = numE.toFixed(2);}
		}
		
    </script>
       
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
   <div class="row">
   <div class="col-xs-6 col-sm-6 col-md-6">
  
    <center><label>ITEM NAME</label></center>
    <div class="form-group has-success">
 <div class="col-lg-12">
      <textarea class="form-control" id="name" name="name" required></textarea>
      <?php include('includes/dbconn.php');
	  $sql = mysql_query("SELECT e_no FROM edp_equipement order by e_no") or die (mysql_error());
	  $itemno =1;
	
		  while($row = mysql_fetch_array($sql)){
			  if($row['e_no'] == ''){
				  $itemno = 1;}else{
			  $itemno =$row['e_no']+1;
			  ?>
   
     
     <?php } }?>

      <input type="hidden" class="form-control pull-left "id="eno" name="eno" value="<?php echo $itemno;?>" readonly="readonly">
  </div>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
  
    <center><label>DESCRIPTION</label></center>
    <div class="form-group has-success">
     <div class="col-lg-12">
      <textarea class="form-control" id="des" name="des" required></textarea>
  </div>
  </div></div></div>

 <div class="row">
   <div class="col-xs-6 col-sm-6 col-md-6">
  
    <center><label >QUANTITY</label></center>
    <div class="form-group has-success">
    <div class="col-lg-12">
      <input type="number" class="form-control" id="itmqty" name="qty" placeholder="0"  required>
 </div>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
 
    <center><label>AMOUNT</label></center>
     <div class="form-group has-success">
    <div class="col-lg-12">
     <input type="number" step="any" class="form-control" id="itmamount" name="amount" placeholder="0.00" onkeyup="totalAmount();" required>
</div>
  </div></div></div>

<div class="row">
   <div class="col-xs-6 col-sm-6 col-md-6">

   <center><label>TOTAL AMOUNT</label></center>
     <div class="form-group has-success">
  <div class="col-lg-12">
      <input type="number" step="any" class="form-control" id="itmtamount" name="tamount" placeholder="0.00" readonly="readonly" required>
   </div>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
  
   <center><label>DATE</label></center>
   <div class="form-group has-success">
    <div class="col-lg-12">
     <input type="date" class="form-control" id="date" name="date" required>
   </div>
  </div></div></div>
  <div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6">
  
  <center><label data-toggle="tooltip" title="Year months">ESTMATED LIFE</label></center>
  <div class="form-group has-success">
  <div class="col-lg-12">
      <input type="number" step="any" class="form-control" id="elife" name="elife"  onkeydown="totalAmount();">
   </div>
  </div></div>
   <div class="col-xs-6 col-sm-6 col-md-6">
 
    <center><label>SALVAGE AMOUNT</label></center>
     <div class="form-group has-success">
  <div class="col-lg-12">
      <input type="number" step="any" class="form-control" id="stamount" name="samount"  readonly="readonly" placeholder="0.00">
   </div>
  </div></div>
</div>
<div class="row">
	<div class="col-lg-12">
  <center><label data-toggle="tooltip" title="Year months">MONTHLY DEPRECIATION</label></center>
  <div class="form-group has-success">
  <div class="col-lg-12">
  
      <input type="number" step="any" class="form-control" id="mdep" name="mdep"  readonly="readonly">
 </div>
  </div></div></div>
<center><button type="submit" class="btn btn-success btn-block" name="save"><span class="glyphicon glyphicon-saved"></span> SAVE</button>
		<button type="reset" class="btn btn-default btn-block" name="save"><span class="glyphicon glyphicon-erase"></span> CLEAR</button></center>
</div>
<div class="row">
<div class="col-lg-12">
<div class="col-lg-4"></div>
<div class="col-lg-4"></div>
<div class="col-lg-4"></div>
</div></div>
</form>
</span>
<!-----------------------------inventory-------------------------------->
<span id="single" class="col-lg-12">
<div class="col-lg-12">
<center>
<form class="form-inline" method="post" action="edp_schedulePandE">

<label><h4 data-toggle="tooltip" title="SEARCH SCHEDULE"><span class="glyphicon glyphicon-calendar btn btn-default"></span></h4></label>
 <input type="date" name="fmonth" class="form-control" required data-toggle="tooltip" title="DATE FROM"/>

 <label><h4 data-toggle="tooltip" title="SEARCH SCHEDULE"><span class="glyphicon glyphicon-calendar btn btn-default"></span></h4></label>
 <input type="date" name="month" class="form-control" required data-toggle="tooltip" title="DATE TO"/>
  <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Submit</button>
</form>
</center>
</div>
</span>
<div class="row">
	<div class="col-lg-6">
    	    <?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong><?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } 
	?>
    </div></div>
  <iframe class="embed-responsive-item" width="100%;" height="700px;" style="border:hidden;" src="edpTable"></iframe>

          <hr /></div></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 01
      </div>
      <div class="row">
        <div class="col-md-9">
      <strong><div class="col-md-1"><img src="/PCIC/img/icon/inventory.png" width="70px;" class="img-responsive" /></div></strong><strong> Inventory Management System IMS &copy; <?php echo date('Y');?> <a href="#">Philippine Crop Insurance Corporation - Tacloban City</a>.</strong>
      </div></div>
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.0 -->
<?php include('includes/footer.php');?>
<?php } ?>
</body>
</html>