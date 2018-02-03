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
<?php
include('includes/dbconn.php');
include('includes/head.php');
$que = mysql_real_escape_string($_GET['q']);
$dis = '';
$q = mysql_query("SELECT * FROM office_equipment WHERE oid = '$que'") or die (mysql_error());
if(mysql_num_rows($q)>0){
	while($r = mysql_fetch_array($q)){
			if($r['m_dep']==0 && $r['e_life']==0){
				$dis = 'Disabled';}else {$dis = 'Enabled';}
		}}
$sql=mysql_query("SELECT * FROM office_ledgercard WHERE oid LIKE '$que'") or die (mysql_error());

?>

 <table id="example" class="table table-responsive table-hover"  width="100%">
           <tr style="background-color: #0C3; color: #FFF;">
           <th style="text-align:center; width:auto;"><span class="glyphicon glyphicon-calendar"></span> Date</th>
           <th style="text-align:center; width:auto;"><span class="glyphicon glyphicon-usd"></span> Amount</th>
           <th style="text-align:center; width:auto;"><span class="glyphicon glyphicon-usd"></span> Net Book Value</t	h>
           <th style="text-align:center; width:auto;"><span class="glyphicon glyphicon-floppy-disk"></span> Action</th>
          
           </tr>
         <?php
		 if(mysql_num_rows($sql)==0){?>  
           <span style="font-size:12px;color:#F00;"><p>Select item name to view data in database</p></span><?php } else { while($row=mysql_fetch_array($sql)){?>
           <tr class="table-row">
          
           <td style="text-align:center; width:auto; font-weight:bold;  background-color: #CFC; color:#000;"><?php $isdate = new DateTime($row['date']);echo $isdate->format('M -  d - Y');?></td>
           <td style="text-align:center; width:auto;background-color:#CFC;"><?php echo number_format($row['cost'],2,'.',',');?></td>
   
           <td style="text-align:center; width:auto; background-color:#CFC; "><?php echo number_format($row['bookvalue'],2,'.',',');?></td> 
           <td style="text-align:center; width:auto; background-color:#CCC;"><a  href="myModalupdateledgerOffice?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Update?"><span style="color:#FFF;"><i class="glyphicon glyphicon-edit"></i> Update</span></a> | <a  href="deleteedpledgeroffice_process?id=<?php echo $row['id']; ?>" <?php echo $dis;?> class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete?"><span style="color:#FFF;"><i class="glyphicon glyphicon-trash"></i> Delete</span></a> </td>
           
           </tr>

           
           <?php }} ?>
           </table> 
<script type="text/javascript" src="assets/datatables.min.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$('#example').DataTable();

	$('#example')
	.removeClass( 'display' )
	.addClass('table table-bordered');
});
</script>
