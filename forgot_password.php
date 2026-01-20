<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
  background:linear-gradient(135deg,#111,#c59d5f);
  font-family:Poppins;
}
.reset-box{
  width:360px;
  background:#fff;
  padding:30px;
  border-radius:15px;
}
.reset-box h3{
  text-align:center;
  margin-bottom:20px;
  color:#333;
}
.form-control{
  height:45px;
  border-radius:10px;
}
.btn-reset{
  background:#c59d5f;
  color:#fff;
  border:none;
  height:45px;
  border-radius:10px;
  font-weight:500;
}
.btn-reset:hover{
  background:#b68b50;
}
</style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">

<div class="reset-box shadow">
<h3>Reset Password</h3>

<form action="reset_password.php" method="POST">
  <input class="form-control mb-3" name="email" type="email" placeholder="Registered Email" required>
  <input class="form-control mb-3" name="new_password" type="password" placeholder="New Password" required>
  <button class="btn btn-reset w-100">Reset Password</button>
</form>
</div>

</body>
</html>
