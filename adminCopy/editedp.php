<?php include('includes/head.php')?>
<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="panel panel-default" style="font-family:'Comic Sans MS', cursive;">
  <div class="panel-heading" style="background-color:#0C6; color:#FFF; font-size:14px;"><strong><span class="glyphicon glyphicon-edit"></span> EDIT OFFICE EQUIPMENT</strong></div>
  <div class="panel-body">
         <script>
    function totalAmount(){
		var numA = document.getElementById('amount').value;
		var numF = document.getElementById('elife').value;
		var numC = parseFloat(numA).toFixed(2)  * parseFloat(0.10).toFixed(2);
		var numD = parseFloat(numA).toFixed(2) - parseFloat(numC).toFixed(2);
		var mdep = parseFloat(numD).toFixed(2) / parseFloat(numF).toFixed(2);
		if(!isNaN(numC)){
			document.getElementById('samount').value = numC.toFixed(2);
		
			}
		if(numA == ''){
			document.getElementById('samount').value = 0;
		}
		if(!isNaN(mdep)){
			document.getElementById('mdep').value = mdep.toFixed(2);
			
			}
		if(numF == ''){
			document.getElementById('elife').value = 0;}
	}
		
    </script>
   
   
    	<form class="form-horizontal" method="post" action="edp_editprocess">
        <?php include('includes/dbconn.php');
		$id = intval($_GET['id']);
		$query = mysql_query("SELECT * FROM edp_equipement WHERE id = '$id'") or die (mysql_error());
		if(mysql_num_rows($query)>0){
			while($row=mysql_fetch_array($query)){ ?>
 <div class="col-lg-2">
 <a href="edpTable" class="btn btn-danger btn-block">Back</a></div>
 <div class="col-lg-8">
  <div class="panel panel-default">
  <div class="panel-body">
   <div class="row">
 
  <input type="hidden" name="id" value="<?php echo $row['id'];?>" />
   <input type="hidden" name="idno" value="<?php echo $row['e_no'];?>" />
  <div class="col-xs-6 col-sm-6 col-md-6">
  
    <center><label>ITEM NAME</label></center>
    <div class="form-group">
 <div class="col-lg-12">
      <textarea class="form-control" id="name" name="name" required><?php echo $row['itemname'];?></textarea>
   
  </div>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
  
    <center><label>DESCRIPTION</label></center>
    <div class="form-group">
     <div class="col-lg-12">
      <textarea class="form-control" id="des" name="des" required> <?php echo $row['description'];?></textarea>
  </div>
  </div></div></div>

 <div class="row">
   <div class="col-xs-6 col-sm-6 col-md-6">
  
    <center><label >QUANTITY</label></center>
    <div class="form-group">
    <div class="col-lg-12">
      <input type="number" class="form-control" id="qty" name="qty" value="<?php echo $row['qty'];?>"  placeholder="0"  required>
 </div>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
 
    <center><label>AMOUNT</label></center>
     <div class="form-group">
    <div class="col-lg-12">
     <input type="number" step="any" class="form-control"  value="<?php echo $row['amount'];?>" id="amount" name="amount" onkeyup="totalAmount();" placeholder="0.00" required>
</div>
  </div></div></div>

<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6">
  
   <center><label>DATE</label></center>
   <div class="form-group">
    <div class="col-lg-12">
     <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['date_acquired'];?>" required>
   </div>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
  
  <center><label data-toggle="tooltip" title="Year months">ESTMATED LIFE</label></center>
  <div class="form-group">
  <div class="col-lg-12">
      <input type="number" step="any" class="form-control" id="elife"  name="elife" value="<?php echo $row['e_life'];?>" onkeyup="totalAmount();" required>
   </div>
  </div></div>
  </div>
  
  <div class="row">
   <div class="col-xs-6 col-sm-6 col-md-6">
    <center><label>SALVAGE AMOUNT</label></center>
     <div class="form-group">
  <div class="col-lg-12">
      <input type="number" step="any" class="form-control" id="samount"  name="samount" value="<?php echo $row['s_value'];?>" required readonly="readonly" placeholder="0.00">
   </div>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
  <center><label data-toggle="tooltip" title="Year months">MONTHLY DEPRECIATION</label></center>
  <div class="form-group">
  <div class="col-lg-12">
      <input type="number" step="any" class="form-control" id="mdep"  name="mdep" value="<?php echo $row['monthly_dep'];?>" required readonly="readonly">
      <?php }}?>
 </div>
  </div></div>
</div>
  <div class="modal-footer">
 
<center><button type="submit" class="btn btn-success btn-block" name="save"><span class="glyphicon glyphicon-saved"></span> SAVE CHANGES</button>
		<button type="reset" class="btn btn-default btn-block" name="save"><span class="glyphicon glyphicon-erase"></span> CLEAR</button></center>
</div>
</div>
</div></div>
</form>

        </div>
      </div></div>
    </div>

<?php include('includes/footer.php')?>
<!----end of modal-------->

   