
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
       <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style=" font-family:'Comic Sans MS', cursive;">
      <div class="modal-header" style="background-color:#0C6; color:#FFF;">
      <div class="row">
        <div class="col-md-9">
        <span style="font-size:23px; color: #fff; font-weight:bold;"><img src="/PCIC/img/icon/printer.ico" width="45px"/>FRUNITURE AND FIXTURES EQUIPMENT ITEMS</span>
       </div> 
<div class="col-md-2">
    <div class="a_close"><a  href="#"  data-toggle="tooltip" title="Close" class="pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a></div><br>
                                        </div>
                                    </div>
      </div>
      <div class="modal-body">
      <div class="row">
      <div class="col-lg-12">
       <form class="form-inline" method="post" action="ff_printitems">
  <div class="form-group">
    <select name="month" class="form-control" data-toggle="tooltip" title="SELECT MONTH">
   
    <option value="1"> JANUARY</option>
    <option value="2"> FEBRUARY</option>
    <option value="3"> MARCH</option>
    <option value="4"> APRIL</option>
    <option value="5"> MAY</option>
    <option value="6"> JUNE</option>
    <option value="7"> JULY</option>
    <option value="8"> AUGUST</option>
    <option value="9"> SEPTEMBER</option>
    <option value="10"> OCTOBER</option>
    <option value="11"> NOVEMBER</option>
    <option value="12"> DECEMBER</option></select>
  </div>
  <div class="form-group">
     <select name="year" class="form-control" data-toggle="tooltip" title="SELECT YEAR"><?php ddY()?>
  
  </select>  

<?php

function ddY(){
        for($i=1900;$i<=date('Y');$i++)
        $arr[] = $i;
        $arr = array_reverse($arr);
        foreach($arr as $year){ 
         if($year == date('Y')) {
         echo '
		 <option>----------SELECT YEAR----------</option>
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
  </div>
  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Print</button>
</form></div></div>
      </div>
     
    </div>
  </div>
</div>
     
  <div class="col-lg-12" style="margin-bottom:5px;"><a href="#myModal" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Print/Export data to Excel</a></div>   
 <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive" style="font-family:'Comic Sans MS', cursive; font-size:12px;">
        
        <thead>
        <tr style="background-color:#3C6; color:#FFF; font-size:14px; font-weight:bold;">
     	<td style="text-align:center;">UPDATE</td>
        <td style="text-align:center;">ITEM</td>
        <td style="text-align:center;">QTY</td>
        <td style="text-align:center;">AMOUNT</td>
        <td style="text-align:center;">DATE ACQUIRED</td>
        <td style="text-align:center;">SALVAGE VALUE</td>
        <td style="text-align:center;">MONTHLY DEP</td>
        <td style="width:150px;">ACTION</td>
        </tr>
        </thead>
        <tbody style="font-size:14px;">
 <?php include('includes/dbconn.php');
 	$sql = mysql_query("SELECT * FROM fixtureandfurniture") or die (mysql_error());
	$count = 0;
	$dis = '';
	$fid = '';
	$itemname = '';
	while($row = mysql_fetch_assoc($sql)){
	$fid = $row['ffid'];
	$itemname = $row['itemname'];	
 	$count++;
	if($row['m_dep']==0){
		$dis = 'disabled';}else{$dis ='enabled';}
	$dep = mysql_query("SELECT * FROM ff_depreciated WHERE eno = '$fid'") or die (mysql_error());
	if($deprow = mysql_fetch_array($dep)){
	if($deprow['status'] == 'Depreciated'){
		$dis = 'disabled';
		}}
 ?>		
        <tr class="table-row" data-href="ffinventoryledger?id=<?php echo $row['ffid'];?>" data-toggle="tooltip" title="<?php $query = "SELECT date FROM ff_ledgercard WHERE ffid='$fid' order by date desc";
		$res = mysql_query($query) or die (mysql_error());
		if($r = mysql_fetch_array($res)){
			$date = $r['date'];
			$isdate = new DateTime($date);
			echo $itemname.' LAST UPDATED ON '.$isdate->format('M d, Y');}?>">
        <td style="text-align:center; background-color:#CCC;"><a href="#updateedp<?php echo $row['id'];?>" <?php echo $dis;?> data-toggle="modal"  data-target="#updateedp<?php echo $row['id'];?>" class="btn btn-default"><span class="glyphicon glyphicon-open" data-toggle="tooltip" title="Update"></span> Update</a></td>
        <td style=" width:auto;"><?php echo $row['itemname'];?></td>
     
       <td style="text-align:center; width:auto;"><?php echo $row['qty'];?></td>
       <td style="background-color: #F30; color: #FFF;text-align:center; width:auto;"><?php echo number_format($row['amount'],2,'.',',');?></td>
       <td style="text-align:center; font-weight:bold;"><?php 
	   $date_ac = new DateTime($row['date_acquired']);
	   echo $date_ac->format('M d, Y');?></td>
       <td style="background-color:#CFC; color: #000; text-align:center; font-weight:bold;"><?php echo number_format($row['s_val'],2,'.',',');?></td>
       <td style="background-color:#CFC; color: #000; text-align:center; font-weight:bold;"><?php echo number_format($row['m_dep'],2,'.',',');?></td>
        <td style="text-align:center; width:130px; background-color:#CCC;"><a href="editff?id=<?php echo $row['id']?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit?"></span> Edit</a> | <a href="#deleteModal<?php echo $row['id'];?>" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $row['id'];?>"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete?"></span> Del</a> </td>
        </tr>
   		<?php 
			  include('ffdelete.php');
			  include('updateff.php');
			  ?>
                    
        <?php }$count-1;?>
        </tbody>
        
        </table>


</div>
</div>
</div>
<script type="text/javascript" src="assets/datatables.min.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').DataTable();

	$('#example')
	.removeClass( 'display' )
	.addClass('table table-bordered');
});
</script>
