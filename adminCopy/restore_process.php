 <?php 
session_start();
       $con = mysql_connect("localhost","root","") or die(mysql_error());
        $sql = "SHOW databases";
        $result = mysql_query($sql);
        $counter = 0;
        while($row=mysql_fetch_array($result)){
          if($row['Database']=="pcic"){
            $counter++;
          }
        }

        if($counter==0){
          $sql = "CREATE database pcic" or die();
          mysql_query( $sql) or die();
        }

          $hostname = "localhost"; 
          $username = "root"; 
          $password = ""; 
          $dbname   = "pcic";

          if(isset($_POST['restore'])){
	

            $filetype = $_FILES['rfile']['type'];
            $filename = $_FILES['rfile']['tmp_name'];

             $command = exec('C:\wamp\bin\mysql\mysql5.6.12\bin\mysql --user='.$username.' --password='.$password.' --host='.$hostname.' '.$dbname.' < '.$filename.'');
             if(isset($command)){
                   $_SESSION['success_msg'] = '<img src="/PCIC/img/icons/ok2.ico" width="20px;"><strong> Database restored!</strong>';
  header("Location:database");
$_SESSION['class'] = 'success';exit();
                  exit();
                  
             }else{
                   $_SESSION['success_msg'] = '<img src="/PCIC/adminCopy/delete.png" width="30px;"><strong> Sorry unable to process your request</strong>';
 header("Location:database");
$_SESSION['class'] = 'danger';                exit();
             }
          }
          
?>