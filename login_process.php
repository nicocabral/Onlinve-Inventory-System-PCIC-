<?php
	session_start();

    include('includes/dbconn.php');

       	$username =mysql_real_escape_string( trim($_POST['username']));
		$password =mysql_real_escape_string( trim($_POST['password']));
        
			$sql = "SELECT * FROM pcic_accounts WHERE username='$username' AND password='$password'";
		
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result)==0) {
				$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> Invalid username or password!';
    header("Location:index");
	$_SESSION['class'] = 'danger';
				exit();

			} else {
					while($row=mysql_fetch_array($result))
					{
						$_SESSION['id'] = $row['id'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['password'] = $row['password'];
						$_SESSION['usertype'] = $row['usertype'];
						$_SESSION['position'] =  $row['position'];
						$_SESSION['dep'] =	$row['office'];
						$_SESSION['hasclass'];
					}
					if($_SESSION['usertype']=='user'){
						$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/img/admin.png" width="40px;"> Welcome!&emsp;'.$_SESSION['name'];
    header("Location:user/index");
	$_SESSION['class'] = 'success';}
						else {
					$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/img/admin.png" width="40px;"> Welcome!&emsp;'.$_SESSION['name'];
    header("Location:adminCopy/index1");
	$_SESSION['class'] = 'success';}
			}
		
	mysql_close($con);

?>