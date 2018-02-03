<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="adminCopy/Assets/custom.css" />  
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<link href="Assets/datatables.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="Assets/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<script type="text/javascript">
$(document).ready(function($) {
    $(".table-row").dblclick(function() {
        window.document.location= $(this).data("href");
    });
});
</script>
<style type="text/css">
.table-row{
cursor:pointer;
}
</style>
<script type="text/javascript">

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
	$('.checkbox').on('click',function(){
		if($('.checkbox:checked').length == $('.checkbox').length){
			$('#select_all').prop('checked',true);
		}else{
			$('#select_all').prop('checked',false);
		}
	});
});
</script>
<div class="row">
<div class="col-lg-12">
<div class="container">
<div class="content-loader">
  <div class="panel panel-default">
  
 
  <div class="panel-body">
   <?php 
   session_start();
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong> <?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>  
        
 <p style="color: #090; font-size:14px; font-weight:bold;">Edit Check</p>
 
 <br />
       <form method="post" action="#">
  <?php include('includes/dbconn.php');
  $id = intval($_GET['id']);
  $query = mysql_query("SELECT * FROM cf_inventory WHERE id = '$id'") or die (mysql_error());
  if(mysql_num_rows($query)>0){
	  while($row = mysql_fetch_array($query)){?>
    <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">

      <label for="exampleInputEmail1">Check No</label>
<input type="text" name="ckno" class="form-control" value="<?php echo $row['checkno'];?>" required readonly="readonly"/>
<input type="hidden" name="id" class="form-control" value="<?php echo $row['id'];?>" required/>
  </div>
   <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group">
    <label for="exampleInputEmail1"> Check Date</label>
    <input type="text" class="form-control" name="ckdate" value="<?php echo $row['checkdate'];?>" required>
  </div></div></div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group ">
    <label for="exampleInputEmail1">Payee</label>
    <textarea  class="form-control"  name="payee"required> <?php echo $row['payee_name'];?></textarea>
  </div></div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label>Address</label>
     <select name="address" class="form-control" required>
     <option value="<?php echo $row['address'];?>"><?php echo $row['address'];?></option>
   	<option></option> 
     <option value="ABUYOG">Abuyog</option>
    <option>---------------------------</option>

    <option value="Bato">Bato</option>
    <option value="Baybay">Baybay</option>
 
    <option value="Hilongos">Hilongos</option>
    <option value="Hindang">Hindang</option>
    <option value="Inopacan">Inopacan</option>

   
    <option value="Javier">Javier</option>

    <option value="La paz">La paz</option>

    <option value="Macarthur">Macarthur</option>
    <option value="Mahaplag">Mahaplag</option>

    <option value="Matalom">Matalom</option>
    <option value="Mayorga">Mayorga</option>
    <option></option>
     <option value="BILIRAN">Biliran</option>
    <option>---------------------------</option>
    <option value="Almeria">Almeria</option>
    <option value="BILIRAN">Biliran</option>
    <option value="Cabuccayan">Cabuccayan</option>
    <option value="Caibiran">Caibiran</option>
    <option value="Culaba">Culaba</option>
    <option value="Kawayan">Kawayan</option>
    <option value="Maripipi">Maripipi</option>
    <option value="Naval">Naval</option>
    <option></option>
    <option value="DIST 1">DIST 1</option> 
    <option>---------------------------</option>
    <option value="Alangalang">Alangalang</option>
    <option value="Babatngon">Babatngon</option>
    <option value="Palo">Palo</option>
    <option value="San Miguel">San Miguel</option>
    <option value="Sta. Fe">Sta. Fe</option>
    <option value="Tacloban">Tacloban </option>
    <option value="Tanauan">Tanauan</option>
    <option value="Tolosa">Tolosa</option>  
    <option></option>
    <option value="DIST II">DIST II</option> 
    <option>---------------------------</option>
    <option value="Barugo">Barugo</option>
    <option value="Burauen">Burauen</option>
    <option value="Capoocan">Capoocan</option>
    <option value="Carigara">Carigara</option>
    <option value="Dagami">Dagami</option>
    <option value="Dulag">Dulag</option>
    <option value="Jaro">Jaro</option>
    <option value="Julita">Julita</option>
    <option value="Pastrana">Pastrana</option>
    <option value="Tabon-tabon">Tabon-tabon</option>
    <option value="Tunga">Tunga</option>
    <option></option>
    
    <option value="ORMOC">Ormoc</option>
    <option>---------------------------</option>
    <option value="ALBUERA">Albuera</option>
    <option value="ORMOC">Ormoc</option>
    <option value="ALBUERA">Kananga</option>
    <option value="Tabango">Tabango</option>
    <option value="Matagob">Matagob</option>
    <option value="Merida">Merida</option>
    <option value="Isabel">Isabel</option>
    <option value="Palompon">Palompon</option>
    <option value="Villaba">Villaba</option>
    <option value="Calubian">Calubian</option>
    <option value="Leyte leyte">Leyet, leyte</option>
    <option value="Tabango">San Isidro</option>
    <option></option>
    <option value="NORTHERN SAMAR">Northern Samar</option>
    <option>---------------------------</option>
    <option value="Allen">Allen</option>
    <option value="Biri">Biri</option>
    <option value="Bobon">Bobon</option>
    <option value="Capul">Capul</option>
    <option value="Catarman">Catarman</option>
    <option value="Catubig">Catubig</option>
	<option value="Gamay">Gamay</option>
    <option value="Las Navas">Las Navas</option>
    <option value="Laoang">Laoang</option>
    <option value="Lapineg">Lapineg</option>
    <option value="Lavezares">Lavezares</option>
    <option value="Lope de Vega">Lope de Vega</option>
    <option value="Mapanas">Mapanas</option>
    <option value="Mondragon">Mondragon</option>
    <option value="Palapag">Palapag</option>
    <option value="Pambujan">Pambujan</option>
    <option value="Rosario">Rosario</option>
    <option value="San Antonio">San Antonio</option>
    <option value="San Isidro">San Isidro</option>
    <option value="San Jose">San Jose</option>
    <option value="San Roque">San Roque</option>
    <option value="San Vicente">San Vicente</option>
    <option value="Silvin Lubos">Silvin Lubos</option>
    <option value="Victoria">Victoria</option>
     <option></option>
     <option value="WESTERN SAMAR">Western Samar</option>
     <option>---------------------------</option>
     <option value="Almaqro">Almaqro</option>
     <option value="Basey">Basey</option>
     <option value="Calbayog City">Calbayog City</option>
     <option value="Calbiga">Calbiga</option>
     <option value="Catbalogan">Catbalogan</option>
     <option value="Daram">Daram</option>
     <option value="Gandara">Gandara</option>
     <option value="Hinbangan">Hinbangan</option>
    <option value="Jiabong">Jiabong</option>
    <option value="Marabut">Marabut</option>
    <option value="Matuguinao">Matuguinao</option>
    <option value="Motiong">Motiong</option>
    <option value="Paranas">Paranas</option>
    <option value="Pagsanjan">Pagsanjan</option>
    <option value="Panibacdao">Panibacdao</option>
    <option value="San Jorge">San Jorge</option>
    <option value="San Jose De Bauan">San Jose De Bauan</option>
    <option value="San Sebastian">San Sebastian</option>
    <option value="Sta. Margarita">Sta. Margarita</option>
    <option value="Sta. Rita">Sta. Rita</option>
    <option value="Sto. Nino">Sto. Nino</option>
    <option value="Tagapulan">Tagapulan</option>
    <option value="Talarora">Talarora</option>
    <option value="Tarangnan">Tarangnan</option>
    <option value="Villareal">Villareal</option>
    <option value="Wright (Paranas)">Wright (Paranas)</option>
    <option value="Zumarraga">Zumarraga</option>
    <option></option>
    <option value="EASTERN SAMAR">Eastern Samar</option>
    <option>---------------------------</option>
    <option value="Arteche">Arteche</option>
    <option value="Balangiga">Balangiga</option>
    <option value="Balangkayan">Balangkayan</option>
    <option value="Borongan">Borongan</option>
    <option value="Can - Avid">Can - Avid</option>
    <option value="Dolores">Dolores</option>
    <option value="Gen. McArthur">Gen. McArthur</option>
    <option value="Giporlos">Giporlos</option>
    <option value="Guiuan">Guiuan</option>
    <option value="Hernani">Hernani</option>
    <option value="Jipapad">Jipapad</option>
    <option value="Lawa - an">Lawa - an</option>
    <option value="Liorente">Liorente</option>
    <option value="Maslog">Maslog</option>
    <option value="Maydolong">Maydolong</option>
    <option value="Mercedes">Mercedes</option>
    <option value="Oras">Oras</option>
    <option value="Quinapundan">Quinapundan</option>
    <option value="Salcedo">Salcedo</option>
    <option value="San Julain">San Julian</option>
    <option value="San Policarpio">San Policarpio</option>
    <option value="Sulat">Sulat</option>
    <option value="Taft">Taft</option>
    <option></option>
   
   
    <option value="Southern Leyte">Southern Leyte</option>
    <option>---------------------------</option>
 
    <option value="Anahawan">Anahawan</option>
    <option value="Bomtoc">Bomtoc</option>
    <option value="Hinunangan">Hinunangan</option>
    <option value="Hinundayan">Hinundayan</option>
    <option value="Libagon">Libagon</option>
    <option value="Liloan">Liloan</option>
    <option value="Maasin">Maasin</option>
    <option value="Macrohon">Macrohon</option>
    <option value="Malitbog">Malitbog</option>
    <option value="Padre Burgos">Padre Burgos</option>
    <option value="Pintuyan">Pintuyan</option>
    <option value="San Francisco">San Francisco</option>
    <option value="San Juan(Cabalian)">San Juan(Cabalian)</option>
    <option value="San Ricardo">San Ricardo</option>
    <option value="Silago">Silago</option>
    <option value="Sogod">Sogod</option>
    <option value="St. Bernard">St. Bernard</option>
    <option value="Tomas Oppus">Tomas Oppus</option>
   </select>
  </div></div></div>
   <div class="row ">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    
    
    <label for="exampleInputEmail1">PEO</label>
   <select name="peo" class="form-control" required>
   	<option value="<?php echo $row['peo'];?>"> <?php echo $row['peo'];?></option>
    	<option></option> 
        <option value="ABUYOG">Abuyog</option>
        <option value="BILIRAN">Biliran</option>
     <option value="DIST 1">DIST 1 </option>
     
     <option value="DIST II">DIST II </option> 
      <option value="ORMOC">Ormoc</option> 
     <option value="EASTERN SAMAR">Eastern Samar</option> 
    <option value="NORTHERN SAMAR">Northern Samar</option>
   <option value="Southern Leyte">Southern Leyte</option>
     <option value="WESTERN SAMAR">Western Samar</option>
    <option value="PCIC R08">PCIC R08</option>
   
    
    
   </select>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-lg-6">
   <div class="form-group ">
   <label for="exampleInputEmail1">Amount</label>
    <input type="number" step="any" class="form-control"  name="amount" value="<?php echo $row['amount'];?>" required readonly="readonly">
    
  </div></div></div>
   <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
  <label>DV Number</label>
  <input type="number" step="any" name="dv_no" class="form-control" value="<?php echo $row['dvno'];?>" required />
  </div></div>
  
   <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Status</label>
    <select name="stat" class="form-control">
    <option value="<?php echo $row['status'];?>"> <?php echo $row['status'];?></option>
    <option>---------------------------------</option>
    <option></option>
     <option value="CANCELLED">Cancelled</option>
    <option value="CLAIMED">Claimed</option>
    <option value="UN-CLAIMED">Un-Claimed</option>
    <option value="REPLACE">Replace</option>
    <option value="STALE">Stale</option>
    <option value="W/O AR">W/O AR</option>
    </select>
  </div></div></div>
  <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Particular</label>
    <textarea class="form-control" name="part"> <?php echo $row['particular'];?></textarea>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Date Recieved</label>
    <input type="date" name="dr" class="form-control" value="<?php echo $row['date_recieved'];?>" />
  </div></div>
  
  </div>
    <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Remarks</label>
    <input type="text" class="form-control" name="remarks" value="<?php echo $row['remarks'];?>" />
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">ID type and ID No.</label>
    <input type="text" name="idtidno" class="form-control" value="<?php echo $row['idtypeandno'];?>" />
  </div></div>
  
  </div>
    <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">OR Number</label>
    <input type="number" step="any" class="form-control" value="<?php echo $row['orno'];?>" name="orno"/>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    
  </div></div>
  
  </div>
 <div class="modal-footer">
 <a href="cfTable" class="btn btn-danger">Back</a>
  <button type="submit" class="btn btn-success" name="save"><span class="glyphicon glyphicon-save-file"></span> SAVE CHANGES</button>
  <button type="reset" class="btn btn-default">CLEAR</button>
</div>
<?php }} ?>
</form>
<?php include('includes/dbconn.php');
if(isset($_POST['save'])){
	$idno = trim($_POST['id']);
	$ckno = mysql_real_escape_string(trim($_POST['ckno']));
	$ckdate = mysql_real_escape_string(trim($_POST['ckdate']));
	$payee = mysql_real_escape_string(trim($_POST['payee']));
	$address = mysql_real_escape_string(trim($_POST['address']));
	$orno = mysql_real_escape_string(trim($_POST['orno']));
	$amount = mysql_real_escape_string(trim($_POST['amount']));
	$peo = mysql_real_escape_string(trim($_POST['peo']));
	$stat = mysql_real_escape_string(trim($_POST['stat']));
	$part = mysql_real_escape_string(trim($_POST['part']));
	$dr = mysql_real_escape_string(trim($_POST['dr']));
	$remarks = mysql_real_escape_string(trim($_POST['remarks']));
	$id = mysql_real_escape_string(trim($_POST['idtidno']));
	$dvno = mysql_real_escape_string(trim($_POST['dv_no']));
	
	$query = "UPDATE cf_inventory SET checkdate = '$ckdate',
									  payee_name = '$payee',
									  amount = '$amount',
									  orno = '$orno',
									  address = '$address',
									  peo = '$peo',
									  status = '$stat',
									  date_recieved = '$dr',
									  remarks = '$remarks',
									  idtypeandno = '$id',
									  dvno = '$dvno',
									  particular = '$part' WHERE id = '$idno'";
	$res = mysql_query($query) or die (mysql_error());
	if($res == true){
			$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-ok"></span> Check no: '.$ckno.' Updated successfully</strong>';
    header("Location:cfTable");
	$_SESSION['class'] = 'success';exit();}else {
		$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong>Oooops! Sorry, Unable to process your request!</strong>';
    header("Location:cfTable");
	$_SESSION['class'] = 'danger';exit();
		}
	}?>
      </div>
      
    </div>
  </div>
</div>
</div></div>
<!----end of modal-------->