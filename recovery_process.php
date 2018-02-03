<?php
	session_start();

    include('includes/dbconn.php');

       	$id = intval($_SESSION['id']);
		$password =mysql_real_escape_string( trim($_POST['password']));
        
		if(empty($password))
		echo '<script>
						window.alert("Please check ypur fields");
						window.location.assign("password_recovery");
					</script>';
		else
			$sql = "UPDATE pcic_accounts SET password = '$password' WHERE id = '$id'";
		
			$result = mysql_query($sql);
			
			if($result) {
				echo '<script>
						window.alert("Account password recover");
						window.location.assign("logout_process?logout=1");
					</script>';
				exit();

			} else {
					echo '<script>
						window.alert("Sorry unable to process your request");
						window.location.assign("password_recovery");
						
					</script>';
			}
		
	mysql_close($con);

?>