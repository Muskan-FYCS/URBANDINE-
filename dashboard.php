<?php
include "../config.php";
if(!isset($_SESSION['admin'])){ header("Location: login.php"); }

$search="";
if(isset($_GET['search'])){
  $search=$_GET['search'];
  $data=mysqli_query($conn,"SELECT * FROM bookings WHERE name LIKE '%$search%' ORDER BY id DESC");
}else{
  $data=mysqli_query($conn,"SELECT * FROM bookings ORDER BY id DESC");
}
?>
<link rel="stylesheet" href="style.css">

<div class="dashboard">

  <div class="topbar">
    <h2>Urban Dine <span>Admin</span></h2>
    <div>
      Welcome, <?php echo $_SESSION['admin']; ?> |
      <a href="logout.php">Logout</a>
    </div>
  </div>

  <form class="search-box">
    <input type="text" name="search" placeholder="Search customer name..." value="<?php echo $search; ?>">
    <button>Search</button>
  </form>

  <div class="table-box">
    <table>
      <tr>
        <th>Name</th>
        <th>Mobile</th>
        <th>Date</th>
        <th>Time</th>
        <th>Persons</th>
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
