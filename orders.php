<?php
session_start();
if(!isset($_SESSION['admin'])) header("Location: login.php");
?>
<h2>Orders Coming Soon 🚀</h2>
<p>This section will store online food orders.</p>
