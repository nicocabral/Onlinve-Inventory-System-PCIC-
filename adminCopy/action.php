<?php
session_start();
include('includes/dbconn.php');
if(isset($_POST['deletecheck'])){
    $idArr =$_POST['checked_id'];
    foreach($idArr as $id){
        mysql_query("DELETE FROM cf_inventory WHERE id=".$id);
    }
    $_SESSION['success_msg'] = '<span class="glyphicon glyphicon-ok"></span> Check Delete Successfully';
	$_SESSION['class'] = 'success';
    header("Location:cfTable");
}
?>