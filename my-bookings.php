<?php
include "config.php";
if(!isset($_SESSION['user_id'])){
  header("Location: login.php");
  exit;
}

$user_id=$_SESSION['user_id'];
$data=mysqli_query($conn,"SELECT * FROM bookings WHERE user_id='$user_id' ORDER BY id DESC");
?>
<link rel="stylesheet" href="style.css">

<div class="dashboard">

<div class="topbar">
  <h2>My Bookings</h2>
  <div>Welcome, <?= $_SESSION['user_name']; ?> |
    <a href="logout.php">Logout</a>
  </div>
</div>

<div class="table-box">
<table>
<tr>
<th>Name</th><th>Mobile</th><th>Date</th><th>Time</th><th>Persons</th>
</tr>

<?php while($row=mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['mobile'] ?></td>
<td><?= $row['date'] ?></td>
<td><?= $row['time'] ?></td>
<td><?= $row['persons'] ?></td>
</tr>
<?php } ?>
</table>
</div>

</div>
