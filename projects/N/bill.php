<?php session_start();
if(!isset($_SESSION['id'])){
	echo '<script>windows: location="index.php"</script>';
	
	}
?>
<?php
  $session=$_SESSION['id'];
  include 'db.php';
  $result = mysqli_query($conn,"SELECT * FROM user where id= '$session'");
  while($row = mysqli_fetch_array($result))
  {
  $sessionname=$row['name'];
  }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css"  href="css/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
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
    #header { width:900px; height:100px;}
    table th {background:#999;}
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
    body {
      background-color: #eae2e4;
    }
    h1, h4 {
      color: #2b5288;
    }
    .nav-pills li a {
      color: #2b5288 !important;
    }
    .nav-pills li a:hover {
      color: #2b5288 !important;
    }
    .logout-icon {
      font-size: 24px;
      color: #2b5288;
      cursor: pointer;
    }
    .welcome-text {
            margin-top: 20px;
            font-size: 18px;
            color: #2b5288;
        }
    #header ul li{
      list-style:none;
      float:left; margin-top:30px; margin-left:10px;
    }
  </style>
</head>

<body>
<div class="container">
  <div>
    <h1><center><b>Billing Dashboard</b></center></h1>
    
    <ul class="nav nav-pills">
      <li><a href="billing.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
      <li><a href="bill.php"><span class="glyphicon glyphicon-usd"></span>&nbsp;Billing</a></li>
      <li><a href="user.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Users</a></li>
      <li><a href="clients.php"><span class="glyphicon glyphicon-list"></span>&nbsp;Clients</a></li>
      <li><a href="logout.php"><ion-icon name="log-out" class="logout-icon"></ion-icon></a></li>
    </ul>
    <div class="welcome-text">
            <p>Welcome, <b><?php echo $sessionname; ?></b></p>
        </div>
        <hr>

    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="panel-title"><h5>Payment List</h5></div>
      </div>
      <div class="panel-body">
        <?php
          include 'db.php';
          $result = mysqli_query($conn,"SELECT * FROM owners");
          echo "<table class=\"table\" bgcolor=\"#003399\">
          <tr>
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Mi</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Action</th>
          </tr>";
          
          while($row = mysqli_fetch_array($result))
          {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['lname'] . "</td>";
            echo "<td>" . $row['mi'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['contact'] . "</td>";
            echo "<td>
              <a rel='facebox' href='paybill.php?id=".$row['id']."'>
                <button class=\"btn btn-info btn-xs\">
                  <ion-icon name=\"add-circle\"></ion-icon>
                </button>
              </a> | 
              <a rel='facebox' href='viewbill.php?id=".$row['id']."'>
                <button class=\"btn btn-danger btn-xs\">
                  <ion-icon name=\"eye\"></ion-icon>
                </button>
              </a>
            </td>";
            echo "</tr>";
          }
          echo "</table>";
        ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script src="js/jquery.js"></script>
<script type="text/javascript">
  $(function() {
    $(".delbutton").click(function(){
      var element = $(this);
      var del_id = element.attr("id");
      var info = 'id=' + del_id;
      if(confirm("Sure you want to delete this update? There is NO undo!")) {
        $.ajax({
          type: "GET",
          url: "delete.php",
          data: info,
          success: function(){
          }
        });
        $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
        .animate({ opacity: "hide" }, "slow");
      }
      return false;
    });
  });
</script>
