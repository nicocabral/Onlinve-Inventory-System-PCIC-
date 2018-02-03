
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if ($_SESSION['usertype'] =='user'){header("location:../user/");}else{?>
<?php include('includes/head.php');?>

<body class="hold-transition skin-blue layout-top-nav" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%; height:100%">

<div class="wrapper" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%;">

 
 <?php include('includes/nav.php');?>
  <!-- Full Width Column -->
  <div class="content-wrapper" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%;">
    <div class="container" style=" background-image:url(dist/img/boxed-bg.jpg); width:100%;">
     

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="row">
            <div class="col-lg-12">
          <div class="box-body">
           
       <!------modal------->
    <div class="modal draggable fade bs-example-modal-lg" id="myModalcheck" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
      <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon_png/a_check_256.png" width="45px"/> SAVE CHECK</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="cf_inventory_page"  data-toggle="tooltip" title="Close" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body">
     
      <div class="box-body">
       <form id="formSavecheckprocess">
   <div class="row">
      	<div class="col-lg-12">
        <div id="ackMsg"></div>
        </div></div>
    <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">

      <label for="exampleInputEmail1">Check No</label>
<input type="text" id="ckno" name="ckno" class="form-control" placeholder="Check no" required/>
  </div>
   <div class="col-xs-6 col-sm-6 col-md-6">
  <div class="form-group">
    <label for="exampleInputEmail1"> Check Date</label>
    <input type="date" class="form-control" name="ckdate" id="ckdate" required>
  </div></div></div>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group ">
    <label for="exampleInputEmail1">Payee</label>
    <textarea  class="form-control"  name="payee" id="payee" required></textarea>
  </div></div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label>Address</label>
     <select name="address" id="address" class="form-control">
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
    <option value="Cabucgayan">Cabucgayan</option>
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
    <label for="exampleInputEmail1">OR Number</label>
    <input type="number" step="any" class="form-control" placeholder="OR number" name="orno" id="orno" required/>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-lg-6">
   <div class="form-group ">
   <label for="exampleInputEmail1">Amount</label>
    <input type="number" step="any" class="form-control"  name="amount" id="amount" placeholder="0.00" required>
    
  </div></div></div>
   <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
   <label for="exampleInputEmail1">PEO</label>
   <select name="peo" id="peo" class="form-control">
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
  
   <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Status</label>
    <select name="stat" id="stat" class="form-control">
   
    <option value=" "></option>
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
    <label>DV Number</label>
 <input type="number" step="any" name="dv_no" id="dv_no"  class="form-control"/>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Date Recieved</label>
    <input type="date" name="dr" id="dr" class="form-control" />
  </div></div>
  
  </div>
    <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Remarks</label>
    <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks Status" />
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">ID type and ID No.</label>
    <input type="text" name="idtidno" id="idtidno" class="form-control" placeholder="ID type and ID no" />
  </div></div>
  
  </div>
   <div class="row">
 <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    <label for="exampleInputEmail1">Particular</label>
    <textarea class="form-control" name="part"></textarea>
  </div></div>
  <div class="col-xs-6 col-sm-6 col-md-6">
   <div class="form-group">
    
  </div></div>
  
  </div>
 <div class="modal-footer">
  <button type="submit" class="btn btn-success" name="save" id="save"><span class="glyphicon glyphicon-save-file"></span> SAVE</button>
  <button type="reset" class="btn btn-default">CLEAR</button>
</div>

</form>
<script type="text/javascript">
	$("#formSavecheckprocess").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	  url: 'savecheck_process',
	  type: 'POST',
	  data: formData,
	  async: false,
	  cache: false,
	  contentType: false,
	  processData: false,
	  success: function (data) {
	     $("#ackMsg").empty();
	     $("#ackMsg").html(data);
		 
	    //alert(returndata);
	  }
	  });
	  return false;
	});


</script>
<script type="text/javascript">
	$("#ckno").keypress(function(){
	  $("#ackMsg").empty();
	  $("#ackMsg").removeClass();
	 	$("#ckdate").val("");
		$("#payee").val("");
		$("#address").val("");
		$("#orno").val("");
		$("#amount").val("");
		$("#peo").val("");
		$("#stat").val("");
		$("#dv_no").val("");
		$("#dr").val("");
		$("#remakrs").val("");
		$("#part").val("");
		$("#idtidno").val("");
	});
</script>
</div>
      </div>
      
    </div>
  </div>
</div>
<!----end of modal-------->
<!-----------------------------Print AR/Transmital modal------------------------>
 <div class="modal fade" id="myModalprintAR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="font-family:'Comic Sans MS', cursive;">
      <div class="modal-header" style="background-color:#0C3;">
       <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/printer.ico" width="45px"/> PRINT AR/TRANSMITAL</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="#"  data-toggle="tooltip" title="Close" class="pull-right"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body">
      
       <form method="post" action="printcheckAR">
  
   <div class="row" id="peoRow">
 <div class="col-lg-12">
   <div class="form-group">
 
   <label for="exampleInputEmail1">SELECT PEO</label>
     <div class="input-group">
   <select name="peo" class="form-control">
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
    <option value="others">Others</option>
   
  
   </select>
   <span class="input-group-btn">
    <button type="submit" class="btn btn-success" name="save"><span class="glyphicon glyphicon-print"></span> Print</button></span></div>
   <hr style="border-top: 1px dashed #8c8b8b;
	border-bottom: 1px dashed #fff;"/>
   <!------------------>
   <div style=" margin-top:10px;">
     <strong> Select Check no:</strong>
       <div class="input-group">
       <div class="col-lg-6">
      <select class="form-control" name="checknofrom" data-toggle="tooltip" title="Start from">
      <option></option>
	  <?php include('includes/dbconn.php');
	  $sql = mysql_query("SELECT checkno FROM cf_inventory order by checkno desc") or die (mysql_error());
	  while($r = mysql_fetch_array($sql)){?>
      
      <option value="<?php echo $r['checkno'];?>"><?php echo $r['checkno'];?></option>
      <?php }?>
      </select></div>
      <div class="col-lg-6">
      <select class="form-control" name="checknoto" data-toggle="tooltip" title="End from">
      <option></option>
      <?php include('includes/dbconn.php');
	  $sql = mysql_query("SELECT checkno FROM cf_inventory order by checkno desc") or die (mysql_error());
	  while($r = mysql_fetch_array($sql)){?>
      
      <option value="<?php echo $r['checkno'];?>"><?php echo $r['checkno'];?></option>
      <?php }?>
      </select></div>
      
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default pull-left" name="printcheckno"><span class="glyphicon glyphicon-print"></span> Print</button>
      </span>
     </div>
     </div>
  </div></div>
  
  </div>
  
</form>
  <!-------------------------------------------------------------->

   <div class="row" id="peoOthers">
 <div class="col-lg-12">
   <div class="form-group">
     <form method="post" action="printcheckAR2">
   <label>SELECT PEO/ADDRESS</label>
  <div class="input-group">
     <select name="address" class="form-control">
     <option value="printPeo">PEO</option>
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
   <span class="input-group-btn">
        <button class="btn btn-success" type="submit" name="peoAddressprint"><i class="glyphicon glyphicon-print"></i> Print</button>
      </span>
      </div>
   <hr style="border-top: 1px dashed #8c8b8b;
	border-bottom: 1px dashed #fff;"/>
   <!------------------>
   <div style=" margin-top:10px;">
     <strong> Select Check no:</strong>
       <div class="input-group">
       <div class="col-lg-6">
      <select class="form-control" name="cknofrom" data-toggle="tooltip" title="Start from">
      <option></option>
	  <?php include('includes/dbconn.php');
	  $sql = mysql_query("SELECT checkno FROM cf_inventory order by checkno desc") or die (mysql_error());
	  while($r = mysql_fetch_array($sql)){?>
      
      <option value="<?php echo $r['checkno'];?>"><?php echo $r['checkno'];?></option>
      <?php }?>
      </select></div>
      <div class="col-lg-6">
      <select class="form-control" name="cknoto" data-toggle="tooltip" title="End from">
      <option></option>
      <?php include('includes/dbconn.php');
	  $sql = mysql_query("SELECT checkno FROM cf_inventory order by checkno desc") or die (mysql_error());
	  while($r = mysql_fetch_array($sql)){?>
      
      <option value="<?php echo $r['checkno'];?>"><?php echo $r['checkno'];?></option>
      <?php }?>
      </select></div>
      
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default pull-left" name="printckno"><span class="glyphicon glyphicon-print"></span> Print</button>
      </span>
     </div>
     </div>
     </form>
  </div></div>
  
  </div>
 
      </div>
      
    </div>
  </div>
</div>
<!----end of modal-------->
<!-- print modal -->
<div class="modal fade" tabindex="-1" id="printcheckModal" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-body">
    <div class="row">
      <div class="col-lg-12">
      <form method="post" action="printallcheck">
        <strong><span class="glyphicon glyphicon-calendar"></span> Select Date:</strong>
       <div class="input-group">
      <input type="date" name="date" class="form-control" />
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default pull-left" name="printdate"><span class="glyphicon glyphicon-print"></span> Print</button>
      </span>
     </div><br />
    
      </form>
      <form method="post" action="printallcheckno">
       <!------------------>
     <strong><span class="glyphicon glyphicon-sort-by-attributes"></span> Select Check no:</strong>
       <div class="input-group">
       <div class="col-lg-6">
      <select class="form-control" name="checknofrom" data-toggle="tooltip" title="Start from">
      <?php include('includes/dbconn.php');
	  $sql = mysql_query("SELECT checkno FROM cf_inventory order by checkno desc") or die (mysql_error());
	  while($r = mysql_fetch_array($sql)){?>
      <option value="<?php echo $r['checkno'];?>"><?php echo $r['checkno'];?></option>
      <?php }?>
      </select></div>
      <div class="col-lg-6">
      <select class="form-control" name="checknoto" data-toggle="tooltip" title="End to">
      <?php include('includes/dbconn.php');
	  $sql = mysql_query("SELECT checkno FROM cf_inventory order by checkno desc") or die (mysql_error());
	  while($r = mysql_fetch_array($sql)){?>
      <option value="<?php echo $r['checkno'];?>"><?php echo $r['checkno'];?></option>
      <?php }?>
      </select></div>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default pull-left" name="printcheckno"><span class="glyphicon glyphicon-print"></span> Print</button>
      </span>
     </div>
      </form>
       </div></div>
      </div>
    </div>
  </div>
</div>
<!---------------------update stat modal------------------->
<!-- print modal -->
<div class="modal fade" tabindex="-1" id="myModalupdatecheck" role="dialog" aria-labelledby="mySmallModalLabel" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-body">
    <div class="row">
      <div class="col-lg-12">
      <form method="post" action="updatecheckstat">
       <!------------------>
     <strong><span class="glyphicon glyphicon-sort-by-attributes"></span> Select Check no:</strong>
       <div class="input-group">
       <div class="col-lg-6">
      <select class="form-control" name="checknofrom" data-toggle="tooltip" title="Start from">
      <?php include('includes/dbconn.php');
	  $sql = mysql_query("SELECT checkno FROM cf_inventory order by checkno desc") or die (mysql_error());
	  while($r = mysql_fetch_array($sql)){?>
      <option value="<?php echo $r['checkno'];?>"><?php echo $r['checkno'];?></option>
      <?php }?>
      </select></div>
      <div class="col-lg-6">
      <select class="form-control" name="checknoto" data-toggle="tooltip" title="End to">
      <?php include('includes/dbconn.php');
	  $sql = mysql_query("SELECT checkno FROM cf_inventory order by checkno desc") or die (mysql_error());
	  while($r = mysql_fetch_array($sql)){?>
      <option value="<?php echo $r['checkno'];?>"><?php echo $r['checkno'];?></option>
      <?php }?>
      </select></div>
      
      <div class="col-lg-6" style="margin-top:10px;">
      	 <label for="exampleInputEmail1"><i class="glyphicon glyphicon-home"></i> SELECT PEO</label>
   <select name="peo" class="form-control">
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
      </div>
      <div class="col-lg-6" style="margin-top:10px;">
      	 <label for="exampleInputEmail1"><i class="glyphicon glyphicon-stats"></i> Status</label>
    <select name="stat" class="form-control">
    <option value=" "></option>
    <option value="CANCELLED">Cancelled</option>
    <option value="CLAIMED">Claimed</option>
    <option value="UN-CLAIMED">Un-Claimed</option>
    <option value="REPLACE">Replace</option>
    <option value="STALE">Stale</option>
    <option value="W/O AR">W/O AR</option>
    </select>
      </div>
 <div class="col-lg-6" style="margin-top:10px;">
 <div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
 	<input type="date" name="date" class="form-control" data-toggle="tooltip" title="Date of Transaction" />
    </span></div>
 </div>
      <div class="col-lg-6" style="margin-top:10px;">
     
      <div class="btn-group pull-right" role="group" aria-label="...">
        <button type="submit" class="btn btn-success pull-left" name="update"><span class="glyphicon glyphicon-refresh"></span> Update</button>
        <button class="btn btn-danger" data-dismiss="modal" style="margin-left:5px;">Cancel</button>
        
      </div>
      </div>
     </div>
      </form>
       </div></div>
      </div>
    </div>
  </div>
</div>
<!---------------------------ednmodal-------------------------->
      <div class="col-lg-6" style="margin-bottom:5px;">
    
      <button class="btn btn-success" data-toggle="modal" data-target="#myModalcheck"><span class="glyphicon glyphicon-save-file"></span> SAVE CHECK</button>
       <a href="#myModalprintAR" data-toggle="modal" data-target="#myModalprintAR" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> PRINT AR/TRANSMITAL</a>
       
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#printcheckModal"><span class="glyphicon glyphicon-print"></span> Print check</button>
      <button class="btn btn-primary" data-toggle="modal" data-target="#myModalupdatecheck"><i class="glyphicon glyphicon-refresh"></i> <span data-toggle="tooltip" title="Update Transmitted check"> TRANSMITAL</span></button>
       </div>
       <div class="col-lg-6">
     
       	<?php 
if(!empty($_SESSION['success_msg'])) {
    ?>
<div class="alert alert-<?php echo $_SESSION['class'];?> alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" data-toggle="tooltip" title="Close"><span aria-hidden="true">&times;</span></button>
  <div class="row"><div class="col-md-9"><strong><?php echo $_SESSION['success_msg'];?></strong></div></div>
</div>
<?php unset($_SESSION['success_msg']);
	  unset($_SESSION['class']); } ?>
       <!------------------------------------------->
      
       <div class="row" id="uploadpanel">
       	<div class="col-md-12">
        	<form class="form-horizontal" method="post" action="import" enctype="multipart/form-data">
          
                	<div class="form-group">
                    <div class="col-md-8">
                    <input type="file" name="file" id="file" placeholder="Select CSV/Excel file to upload"  class="form-control" required data-toggle="tooltip" title="Click me to select CSV/Excel file to upload" data-placement="bottom"/>
                    </div>
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-warning" name="import"><span class="glyphicon glyphicon-upload"></span> Upload Check</button>
                    </div>
                </div>   
                         
            </form>
       
        </div>
       </div>
       
       </div>
   
		<iframe src="/PCIC/adminCopy/cfTable.php" class="form" height="700px;" width="100%" style="border-style:none;"></iframe>
          </div></div></div>
         
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