<?php
session_start();
if(!isset($_SESSION['admin_id'])) header("Location:login.php");
$conn=new mysqli("localhost","root","","restaurant");
$data=$conn->query("SELECT * FROM bookings ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
<title>Bookings</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{font-family:Poppins;background:#f4f6f9}
.sidebar{width:250px;height:100vh;position:fixed;background:#111;color:#fff}
.sidebar a{display:block;padding:12px 20px;color:#bbb;text-decoration:none}
.sidebar a:hover{background:#c59d5f;color:#fff}
.main{margin-left:250px;padding:20px}
@media(max-width:768px){.sidebar{position:relative;width:100%}.main{margin-left:0}}
</style>
</head>
<body>

<div class="sidebar">
  <h4 class="p-3">Urban Dine</h4>
  <a href="dashboard.php">Dashboard</a>
  <a href="bookings.php">Bookings</a>
  <a href="profile.php">Account</a>
  <a href="logout.php">Logout</a>
</div>

<div class="main">
<h3>Table Bookings</h3>

<table class="table table-bordered bg-white shadow mt-3">
<tr>
<th>Code</th><th>Name</th><th>Mobile</th><th>Date</th><th>Time</th><th>Persons</th>
</tr>

<?php while($r=$data->fetch_assoc()){ ?>
<tr>
<td><?= $r['confirmation_code'] ?></td>
<td><?= $r['name'] ?></td>
<td><?= $r['mobile'] ?></td>
<td><?= $r['booking_date'] ?></td>
<td><?= $r['booking_time'] ?></td>
<td><?= $r['persons'] ?></td>
</tr>
<?php } ?>
</table>
</div>

</body>
</html>
