<?php
session_start();
if(!isset($_SESSION['admin_id'])) header("Location:login.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<style>
body{font-family:Poppins;background:#f4f6f9;padding:30px}
.card{background:#fff;padding:30px;border-radius:15px}
</style>
</head>
<body>

<div class="card">
<h3>Admin Account</h3>
<p>You can manage your account details here.</p>
</div>

</body>
</html>
