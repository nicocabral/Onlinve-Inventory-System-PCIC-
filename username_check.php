<?php
	session_start();

    include('includes/dbconn.php');

       	$username =mysql_real_escape_string( trim($_POST['username']));
		
        
			$sql = "SELECT * FROM pcic_accounts WHERE username='$username'";
		
			$result = mysql_query($sql);
			
			if(mysql_num_rows($result)==0) {
				echo '<script>
						$("#logMsg").empty();
						$("#logMsg").removeClass();
						$("#logMsg").addClass("alert alert-danger");
						$("#logMsg").html("<center>Invalid username not exist in databases!</center>");
					</script>';
				exit();

			} else {
					while($row=mysql_fetch_array($result))
					{
						$_SESSION['id'] = $row['id'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['password'] = $row['password'];
						$_SESSION['user_type'] = $row['usertype'];
						$_SESSION['position'] =  $row['position'];
						$_SESSION['office'] =	$row['office'];
					}
					if($_SESSION['user_type']=='user'){
						echo'<script>
						window.location.href="user/index.php"</script>';}
						else {
					echo '<script>window.location.href="password_recovery";</script>';}
			}
		
	mysql_close($con);

?>