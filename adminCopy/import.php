<?php
session_start();
include 'includes/dbconn.php';
if(isset($_POST["import"])){
		$name = trim($_POST['file']);

		 $filename=$_FILES["file"]["tmp_name"];
		

		 if($_FILES["file"]["size"] > 0)
		 {

		  	$file = fopen($filename, "r");
	         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
			 
	         {
			
	    
	          //It wiil insert a row to our subject table from our csv file`
	           $sql = "INSERT into cf_inventory  
	            	values(NULL,NULL,'$emapData[0]','$emapData[1]','$emapData[2]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
	         //we are using mysql_query function. it returns a resource on true else False on error
	          $result = mysql_query( $sql) or die (mysql_error());
				if(! $result )
				{
				$_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="20px;"> <strong> Invalid File: '.$name.' Please Upload CSV File</strong>';
    header("Location:cf_inventory_page");
	$_SESSION['class'] = 'danger';exit();
				}

	         }
	         fclose($file);
	         //throws a message if data successfully imported to mysql database from excel file
	        
	        
			 $_SESSION['success_msg'] = '<strong><span class="glyphicon glyphicon-ok"></span> '.$name.' File has been successfully Imported</strong>';
    header("Location:cf_inventory_page");
	$_SESSION['class'] = 'success';exit();

			 //close of connection
			mysql_close($con); 
				
		 	
			
		 }
	}
		 
?>		 