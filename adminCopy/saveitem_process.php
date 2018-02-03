<?php session_start();
include('includes/dbconn.php');

$itemname = mysql_real_escape_string(trim($_POST['itemname']));
$description =  mysql_real_escape_string(trim($_POST['description']));
$unit = mysql_real_escape_string(trim($_POST['unit']));
$qty = mysql_real_escape_string(trim($_POST['qty']));
$bqty = mysql_real_escape_string(trim($_POST['qty']));
$spec = mysql_real_escape_string(trim($_POST['spec']));
$ucost = mysql_real_escape_string(trim($_POST['ucost']));
$tcost = mysql_real_escape_string(trim($_POST['tcost']));
$itmno = mysql_real_escape_string(trim($_POST['itemno']));
$cat = mysql_real_escape_string(trim($_POST['cat']));
$date = trim($_POST['date']);
$query = mysql_query("SELECT itemno FROM pcic_items WHERE itemno = '$itmno'") or die (mysql_error());
	if(mysql_num_rows($query)>0){
		//$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-remove"></span> Sorry, Due to duplication of id your process cannot be complited, please refresh the page and try again. Thank you!</strong>';
//    header("Location:stock_page");
//	$_SESSION['class'] = 'danger';
echo '<script>
						$("#ackMsg").empty();
						$("#ackMsg").removeClass();
						$("#ackMsg").addClass("alert alert-danger");
						$("#ackMsg").html("Sorry, Due to duplication of id your process cannot be complited, please refresh the page and try again. Thank you!");
						
					</script>';

}else{

if(empty($itemname) || empty($description) || empty($unit) || empty($qty) || empty($spec) || empty($ucost) || empty($tcost) || empty($date)){
// $_SESSION['success_msg'] = '<strong> <span class="glyphicon glyphicon-remove"></span> Fields must not be empty.Try again</strong>';
//    header("Location:stock_page");
//	$_SESSION['class'] = 'danger';
echo '<script>
						$("#ackMsg").empty();
						$("#ackMsg").removeClass();
						$("#ackMsg").addClass("alert alert-warning");
						$("#ackMsg").html("<center>Oooops! Sorry,Fields cannot be empty. Please try again!</center>");
						
					</script>';
	}
else{

$query ="INSERT INTO pcic_items VALUES(NULL,'$itmno','$itemname','$description','$unit','$qty','$bqty','$spec','$ucost','$tcost','$tcost','$date','$cat')";
$result = mysql_query($query) or die (mysql_error());
$sql = mysql_query("INSERT INTO pcic_stockcard VALUES(NULL,'$itmno',
			'$itemname',
			'$description',
			'$unit',
			'$date','$qty','$ucost','$tcost',NULL,NULL,NULL,NULL,'Updated','$qty','$ucost','$tcost','$date')") or die (mysql_error());	
	if($result==true){
	 //$_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-ok"></span> '.$itemname.' save successfully</strong>';
//    header("Location:stock_page");
//	$_SESSION['class'] = 'success';exit();
echo '<script>
						$("#ackMsg").empty();
						$("#ackMsg").removeClass();
						$("#ackMsg").addClass("alert alert-success");
						$("#ackMsg").html("<center> <strong>'.$itemname.' </strong>save successfully</center>");
					
						
					</script>';
	}
	else{
	//$_SESSION['success_msg'] = '<span class="glyphicon glyphicon-remove"></span> Sorry unable to process your request!';
//    header("Location:stock_page");
//				exit();
echo '<script>
						$("#ackMsg").empty();
						$("#ackMsg").removeClass();
						$("#ackMsg").addClass("alert alert-danger");
						$("#ackMsg").html("<center>Sorry Unable to process your request</center>");
						
					</script>';
exit();

				}} 
	mysql_close($con);
	}
?>