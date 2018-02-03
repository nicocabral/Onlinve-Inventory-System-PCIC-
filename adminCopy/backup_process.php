 <?php 
session_start();
        $hostname = "localhost"; 
        $username = "root"; 
        $password = ""; 
        $dbname   = "pcic";
        /****************/

        if(isset($_POST['backup'])){
     
		   $commandsql = exec('C:\wamp\bin\mysql\mysql5.6.12\bin\mysqldump --user='.$username.' --password='.$password.' --host='.$hostname.' '.$dbname.' > C:\wamp\www\PCIC\backup\pcic_database'.date('Y-m-d-H-i-s').'.sql');
           if(isset($commandsql)==true){
                $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" width="20px;"><strong> PCIC iventory database backup file save successfully Please check backup folder</strong>';
    header("Location:database");
	$_SESSION['class'] = 'success';exit();
	

           }else{
                $_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="30px;"><strong> Sorry unable to process your request</strong>';
    header("Location:database");
	$_SESSION['class'] = 'danger';
                exit();
           }
        }
	
		
     
