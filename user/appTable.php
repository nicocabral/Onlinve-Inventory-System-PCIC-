<?php session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
	header("location:../index");}else if($_SESSION['usertype']=='admin'){header("location:../adminCopy/");}else{?>
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
<div class="content-loader">
  <a href="#"><img src="/PCIC/img/icon/printer.ico" width="35px;" class="img-responsive"  data-toggle="tooltip" title="Print?" data-placement="right"/></a>
     
 <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive" style="font-family:'Comic Sans MS', cursive; font-size:12px;">
        
        <thead>
        
        <tr>
       	
        <td>ITEM NAME SPECIFICATION</td>
        <td>UNIT</td>
        <td>Q1 (JAN - Feb - MARCH)</td>
        <td>Q2 (APRIL - MAY - JUNE)</td>
        <td>Q3 (JULY - AUGUST - SEPT)</td>
        <td>Q4 (OCT - NOV - DEC)</td>
        <td>TOTAL</td>
       
       
        </tr>
        </thead>
     <tbody>
    <tr>
    <td>CATEGORY</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
            </tbody>
        
        </table>
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
<?php } ?>