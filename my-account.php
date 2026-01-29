<?php
include "config.php";
if(!isset($_SESSION['user_id'])){
  header("Location: login.php");
  exit;
}

$user_id = $_SESSION['user_id'];

$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id='$user_id'"));
$bookings = mysqli_query($conn,"SELECT * FROM bookings WHERE user_id='$user_id' ORDER BY id DESC");
?>

<link rel="stylesheet" href="style.css">

<div class="dashboard">

<div class="topbar">
  <h2>My Account</h2>
  <div>Welcome, <?= $user['name']; ?> | <a href="logout.php">Logout</a></div>
</div>

<div style="padding:25px">

  <!-- PROFILE -->
  <div style="background:#f7f2ea;padding:20px;border-radius:15px;margin-bottom:25px">
    <h3>My Details</h3><br>
    <p><b>Name:</b> <?= $user['name']; ?></p>
    <p><b>Email:</b> <?= $user['email']; ?></p>
  </div>

  <!-- BOOKINGS -->
  <h3>My Table Bookings</h3><br>

  <div class="table-box">
  <table>
    <tr>
      <th>Name</th><th>Mobile</th><th>Date</th><th>Time</th><th>Persons</th>
    </tr>

    <?php while($row=mysqli_fetch_assoc($bookings)){ ?>
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
</div>
