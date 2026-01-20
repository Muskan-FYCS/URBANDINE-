<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>

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
}
.form-control{
  width:100%;
  height:45px;
  margin-bottom:15px;
  padding:10px;
  border-radius:10px;
  border:1px solid #ddd;
}
.btn-reset{
  background:#c59d5f;
  color:#fff;
  border:none;
  height:45px;
  width:100%;
  border-radius:10px;
  cursor:pointer;
}
.popup{
  position:fixed;
  top:0;left:0;
  width:100%;height:100%;
  background:rgba(0,0,0,.6);
  display:flex;
  align-items:center;
  justify-content:center;
}
.popup-box{
  background:#fff;
  padding:25px;
  border-radius:15px;
  text-align:center;
  width:300px;
}
.popup-box.success{border-top:5px solid green}
.popup-box.error{border-top:5px solid red}
.popup-box button{
  margin-top:15px;
  padding:8px 20px;
  border:none;
  border-radius:8px;
  background:#c59d5f;
  color:#fff;
}
</style>
</head>

<body>

<div class="reset-box" style="margin:120px auto">
<h3>Reset Password</h3>

<form method="POST">
  <input class="form-control" name="email" type="email" placeholder="Registered Email" required>
  <input class="form-control" name="new_password" type="password" placeholder="New Password" required>
  <button class="btn-reset">Reset Password</button>
</form>
</div>

<!-- POPUP MESSAGE -->
<?php if(!empty($msg)): ?>
<div class="popup">
  <div class="popup-box <?= $msg ?>">
    <h3><?= $msg=="success"?"Success":"Failed" ?></h3>
    <p>
      <?= $msg=="success" 
      ?"Password reset successfully!" 
      :"Email not found!" ?>
    </p>
    <button onclick="location.href='login.php'">OK</button>
  </div>
</div>
<?php endif; ?>

</body>
</html>
