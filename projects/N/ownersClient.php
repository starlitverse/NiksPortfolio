<?php
 session_start();
 

include 'db.php';    
  
 $login = mysqli_query($conn,"SELECT id,fname,lname FROM owners WHERE id = '" .$_POST['id'] . "' and fname = '" .$_POST['fname'] . "' and lname = '" .$_POST['lname'] . "'   ");
 $row=mysqli_fetch_array($login);  
 
 if($row){
 $_SESSION['id'] = $row['id'];
 
 echo '<script>windows: location="homeClient.php"</script>';
 }
	else {
		header ("location: signInClient.php?err");
		}
 
 
?>
