<?php session_start();
if (!isset($_SESSION['id'])) {
    echo '<script>windows: location="index.php"</script>';
}

$session = $_SESSION['id'];
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM user where id= '$session'");
while ($row = mysqli_fetch_array($result)) {
    $sessionname = $row['name'];
}

$results = mysqli_query($conn, "SELECT * FROM user");
$users = mysqli_num_rows($results);

$results = mysqli_query($conn, "SELECT * FROM bill");
$bill = mysqli_num_rows($results);

$jibu = mysqli_query($conn, "SELECT * FROM owners");
$client = mysqli_num_rows($jibu);

if (isset($_POST['add'])) {
    include 'db.php';
    $id = $_POST['id'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mi = $_POST['mi'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    mysqli_query($conn, "INSERT INTO owners (id,lname,fname,mi,address,contact) VALUES ('$id','$lname','$fname','$mi','$address','$contact')");
    echo '<script>alert("success")</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Fuel Consumption Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap/dist/css/bootstrap.min.css" />
    <script src="lib/jquery.js"></script>
    <script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <style>
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
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center" style="font-weight: bolder;">Fuel Consumption Dashboard</h1>
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

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title" style="font-size: 24px; font-weight: bold;">Clients</h5>
                    </div>
                    <div class="panel-body">
                        <h1 align="center" style="font:Verdana, Geneva, sans-serif; font-weight:bolder;"><?php echo $client; ?></h1>
                    </div>
                    <a href="clients.php">
                        <div class="panel-footer"><span class="alert-link glyphicon glyphicon-circle-arrow-right"></span> View</div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title" style="font-size: 24px; font-weight: bold;">Users</h5>
                    </div>
                    <div class="panel-body">
                        <h1 align="center" style="font:Verdana, Geneva, sans-serif; font-weight:bolder;"><?php echo $users; ?></h1>
                    </div>
                    <a href="user.php">
                        <div class="panel-footer"><span class="alert-link glyphicon glyphicon-circle-arrow-right"></span> View</div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h5 class="panel-title" style="font-size: 24px; font-weight: bold;">Bills and Income</h5>
                    </div>
                    <div class="panel-body">
                        <h1 align="center" style="font:Verdana, Geneva, sans-serif; font-weight:bolder;"><?php echo $bill; ?></h1>
                    </div>
                    <a href="bill.php">
                        <div class="panel-footer"><span class="alert-link glyphicon glyphicon-circle-arrow-right"></span> View</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
