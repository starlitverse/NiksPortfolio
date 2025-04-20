<?php session_start();
if(!isset($_SESSION['id'])){
    echo '<script>windows: location="index.php"</script>';
}
?>

<?php
$session=$_SESSION['id'];
include 'db.php';
$result = mysqli_query($conn,"SELECT * FROM owners where id= '$session'");
while($row = mysqli_fetch_array($result))
  {
  $sessionname=$row['fname'];
}
?>

<?php
include 'db.php';
  $results = mysqli_query($conn,"SELECT * FROM user");
  $users = mysqli_num_rows($results);
?>
<?php
include 'db.php';
  $results = mysqli_query($conn,"SELECT * FROM bill");
  $bill = mysqli_num_rows($results);
?>
<?php
include 'db.php';
  $jibu = mysqli_query($conn,"SELECT * FROM owners");
  $client = mysqli_num_rows($jibu);
?>

<?php
if (isset($_POST['add']))
{       
    include 'db.php';
    $id=$_POST['id'] ;
    $lname= $_POST['lname'] ;                    
    $fname=$_POST['fname'] ;
    $address=$_POST['address'] ;
    $contact=$_POST['contact'] ;
    
    mysqli_query($conn,"INSERT INTO  owners (id,lname,fname,mi,address,contact) 
    VALUES ('$id','$lname','$fname','$mi','$address','$contact')"); 
    
    echo '<script>alert("success")</script>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css"  href="css/bootstrap/dist/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
<script type="text/javascript">
function addCommas(nStr){
 nStr += '';
 var x = nStr.split('.');
 var x1 = x[0];
 var x2 = x.length > 1 ? '.' + x[1] : '';
 var rgx = /(\d+)(\d{3})/;
 while (rgx.test(x1)) {
  x1 = x1.replace(rgx, '$1' + ',' + '$2');
 }
 return x1 + x2;
}
</script>
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script src="css/bootstrap/dist/js/jquery.js"></script>
<script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing System</title>
<style type="text/css">
#wrapper{
  width:100%;
  margin:0 auto;
  border:3px solid rgba(0,0,0,0);
  -webkit-border-radius:5px;
  -moz-border-radius:5px;
  border-radius:5px;
  -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
  -moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
  box-shadow:0 0 18px rgba(0,0,0,0.4);
  margin-top:2%;
  padding:10px;
  height:550px;
}
#header { width:900px; height:100px;}
table th {background:#020537;} /* Updated */
#form {
  width:400px;
  float:left;
  border:3px solid rgba(0,0,0,0);
  -webkit-border-radius:5px;
  -moz-border-radius:5px;
  border-radius:5px;
  -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
  -moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
  box-shadow:0 0 18px rgba(0,0,0,0.4);
  margin-top:5%;
}
#ryt {
  float:right;
  border:3px solid rgba(0,0,0,0);
  -webkit-border-radius:5px;
  -moz-border-radius:5px;
  border-radius:5px;
  -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4);
  -moz-box-shadow:0 0 18px rgba(0,0,0,0.4);
  box-shadow:0 0 18px rgba(0,0,0,0.4);
  margin-top:5%;
}

.nav-pills li a {
  background-color: #708090;  
  border-radius: 5px;          
  padding: 10px 20px;         
  color: white;                
  transition: background-color 0.3s, transform 0.3s; 
  display: inline-block;       
}

.nav-pills li a:hover {
  background-color: #3d3d3d;  
  transform: scale(1.1);        
}


.logout-icon {
    background-color: #708090;  
    border-radius: 50%;          
    padding: 10px;               
    transition: background-color 0.3s, transform 0.3s; 
    display: inline-block;       
}

.logout-icon ion-icon {
    color: white; 
}

.logout-icon:hover {
    background-color: #c0c0c0; 
    transform: scale(1.1);      
}
</style>
</head>

<body class="bg-info">
<div class="container">
<div id="wrapper">
  <h1><center><b>Fuel Consumption Portal</b></center></h1>
  <ul class="nav nav-pills">
    <!-- Modified Home button with specific hover effect -->
    <li><a href="homeClient.php" class="home-button"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
    <li><a href="billClient.php"><span class="glyphicon glyphicon-usd"></span>&nbsp;Billing</a></li>
    
    <!-- Logout Icon Button -->
    <li style="margin-left: 10px;">
        <a href="logout.php" class="logout-icon">
            <ion-icon name="log-out" style="font-size: 24px;"></ion-icon>
        </a>
    </li>
  </ul>
  <hr color="#020537" />  <!-- Updated -->
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h4 style="color: #020537; font-weight: bolder">Welcome Dear, <?php echo $sessionname; ?></h4>
      <hr color="#020537" /> <!-- Updated -->
      
      <div class="col-md-6">
         <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"><h5 style="font-size:24px; font-weight:bold; color: #020537;">Clients</h5></div>
            </div>
              <div class="panel-body">
               <h1 align="center" style="font:Verdana, Geneva, sans-serif; font-weight:bolder;"><?php echo $client; ?></h1>
              </div>
         </div>
      </div>
    </div>
   
    <div class="col-md-6">
         <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title"><h5 style="font-size:24px; font-weight:bold; color: #020537;">Bills and Income</h5></div>
            </div>
              <div class="panel-body">
              <h1 align="center" style="font:Verdana, Geneva, sans-serif; font-weight:bolder;"><?php echo $bill; ?>
              <?php
              include "db.php";
             
              $add=mysqli_query($conn,"Select SUM(price) from Bill");
              while($row1=mysqli_fetch_array($add))
               {
                 $total=$row1['SUM(price)'];
                  }
              ?>
              </h1><a href="billClient.php"> <div class="panel-footer"><span class="alert-link glyphicon glyphicon-circle-arrow-right"></span>View</div></a>
              </div>
         </div>
      </div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
</html>
