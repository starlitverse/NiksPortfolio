<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap/dist/css/bootstrap-theme.min.css" />
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

  <style>
    .icon-button {
      font-size: 18px; /* Resize icons */
      display: inline-block; /* Align icons horizontally */
      margin-right: 5px; /* Add spacing between icons */
    }
  </style>
</head>

<h4 style="text-align: center;" >Note: Bill Amount = Total Consumption * Price/unit<br /></h4>
<?php
include 'db.php';
$id =$_REQUEST['id'];
$result = mysqli_query($conn,"SELECT * FROM bill where owners_id='$id'");

echo "<table class=\"table table-striped table-hover table-bordered\">
<tr>
<th>Id</th>
<th>Previous Reading</th>
<th>Present Reading</th>
<th>Consumption</th>
<th>Price</th>
<th>Date</th>
<th>Bill Amount</th>
<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    $prev=$row['prev'];
    $pres=$row['pres'];
    $price=$row['price'];
    $totalcons=$pres - $prev;
    $bill=$totalcons * $price;
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $prev . "</td>";
    echo "<td>" . $pres . "</td>";
    echo "<td>". $totalcons."</td>";
    echo "<td>" . $price . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $bill . "</td>";
    echo "<td>
        <a rel='facebox' href='viewpayment.php?id=".$row['id']."'>
          <button class='btn btn-info btn-xs icon-button'>
            <ion-icon name='eye'></ion-icon>
          </button>
        </a> 
        <a rel='facebox' href='delbill.php?id=".$row['id']."'>
          <button class='btn btn-danger btn-xs icon-button'>
            <ion-icon name='close'></ion-icon>
          </button>
        </a>
      </td>";
    echo "</tr>";
}
echo "</table>";
?>

</html>
