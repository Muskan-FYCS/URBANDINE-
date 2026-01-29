<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Urban Dine | Restaurant</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif}
body{background:#fafafa;color:#333}

/* ===== HEADER & HERO ===== */
header{
  background:url('https://images.unsplash.com/photo-1552566626-52f8b828add9') center/cover no-repeat;
  min-height:100vh;
  color:#fff;
  position:relative;
}
header::after{
  content:'';
  position:absolute;
  inset:0;
  background:rgba(0,0,0,.55);
}
nav{
  position:absolute;
  top:0;left:0;
  width:100%;
  padding:20px 50px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  z-index:2;
}
nav h2{color:#fff}
nav a{color:#fff;margin-left:20px;text-decoration:none;font-weight:500}

.hero{
  position:relative;
  z-index:1;
  min-height:100vh;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  text-align:center;
  padding:20px;
}
.hero h1{font-size:3rem}
.hero p{margin:15px 0}

.btn{
  padding:12px 28px;
  background:#c59d5f;
  color:#fff;
  border-radius:30px;
  text-decoration:none;
  font-weight:600;
  display:inline-block;
}

/* ===== SECTIONS ===== */
section{padding:80px 8%}
.section-title{text-align:center;margin-bottom:40px}
.section-title h2{font-size:2.3rem}

/* ===== MENU ===== */
.menu-section{background:#fafafa}
.filter-btns{display:flex;justify-content:center;gap:15px;flex-wrap:wrap;margin-bottom:35px}
.filter-btns button{
  padding:10px 22px;border:none;border-radius:25px;
  background:#eee;cursor:pointer;font-weight:500;
}
.filter-btns button.active,
.filter-btns button:hover{background:#c59d5f;color:#fff}

.menu-items{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
  gap:30px;
}
.menu-card{
  background:#fff;border-radius:16px;
  box-shadow:0 10px 25px rgba(0,0,0,.1);
  overflow:hidden;transition:.3s;
}
.menu-card:hover{transform:translateY(-8px)}
.menu-card img{width:100%;height:200px;object-fit:cover}
.menu-info{padding:18px}
.price{color:#c59d5f;font-weight:600}

/* ===== BOOKING ===== */
.booking{
  background:#111;color:#fff;
  border-radius:20px;padding:40px;
}
.booking form{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
  gap:18px;
}
input,select{
  padding:12px;border-radius:10px;border:none
}

/* ===== GALLERY ===== */
.gallery{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
  gap:20px;
}
.gallery img{
  width:100%;height:220px;
  object-fit:cover;border-radius:16px
}

/* ===== FOOTER ===== */
footer{
  background:#000;color:#aaa;
  text-align:center;padding:25px
}

/* ===== MOBILE ===== */
@media(max-width:768px){
  nav{padding:15px 20px}
  .hero h1{font-size:2rem}
  section{padding:60px 5%}
}
</style>
</head>

<body>

<header>
 <nav>
  <h2>Urban Dine</h2>

  <div class="menu-toggle" id="menuToggle">
    ☰
  </div>

  <div class="nav-links" id="navLinks">
    <a href="#menu" onclick="closeMenu()">Menu</a>
    <a href="#booking" onclick="closeMenu()">Book Table</a>
    <a href="#contact" onclick="closeMenu()">Contact</a>

    <?php if(isset($_SESSION['user_id'])){ ?>
        <a href="my-account.php" class="btn" onclick="closeMenu()">My Account</a>
        <a href="logout.php" class="btn" onclick="closeMenu()">Logout</a>
    <?php } else { ?>
        <a href="login.php" class="btn" onclick="closeMenu()">Login</a>
        <a href="signup.php" class="btn" onclick="closeMenu()">Signup</a>
    <?php } ?>
  </div>
</nav>

<style>.menu-toggle{
  display:none;
  font-size:30px;
  cursor:pointer;
  user-select:none;
}

.nav-links{
  display:flex;
  align-items:center;
}

/* ===== MOBILE NAV ===== */
@media(max-width:768px){

  .menu-toggle{
    display:block;
    color:#fff;
  }

  .nav-links{
    position:fixed;
    top:0;
    right:-100%;
    height:100vh;
    width:260px;
    background:#000;
    flex-direction:column;
    padding-top:90px;
    gap:20px;
    transition:0.4s;
    z-index:999;
  }

  .nav-links a{
    font-size:18px;
  }

  .nav-links.active{
    right:0;
  }
}

</style>
<script>
const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");

menuToggle.onclick = () => {
  navLinks.classList.toggle("active");
};

function closeMenu(){
  navLinks.classList.remove("active");
}
</script>



<div class="hero">
<h1>Fine Dining Experience</h1>
<p>Delicious food • Cozy ambience • Perfect moments</p>
<a href="#booking" class="btn">Reserve Your Table</a>
</div>
</header>

<!-- ===== MENU ===== -->
<section id="menu" class="menu-section">
<div class="section-title">
<h2>Our Menu</h2>
<p>Choose your favorite</p>
</div>

<div class="filter-btns">
<button class="active" onclick="filterMenu('all')">All</button>
<button onclick="filterMenu('starters')">Starters</button>
<button onclick="filterMenu('main')">Main Course</button>
<button onclick="filterMenu('chinese')">Chinese</button>
<button onclick="filterMenu('desserts')">Desserts</button>
<button onclick="filterMenu('drinks')">Drinks</button>
</div>

<div class="menu-items">
<div class="menu-card starters"><img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092"><div class="menu-info"><h4>Paneer Tikka</h4><p class="price">₹220</p></div></div>
<div class="menu-card main"><img src="https://images.unsplash.com/photo-1601050690597-df0568f70950"><div class="menu-info"><h4>Veg Biryani</h4><p class="price">₹260</p></div></div>
<div class="menu-card chinese"><img src="https://images.unsplash.com/photo-1617196034183-421b4917c92d"><div class="menu-info"><h4>Hakka Noodles</h4><p class="price">₹230</p></div></div>
<div class="menu-card desserts"><img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb"><div class="menu-info"><h4>Chocolate Brownie</h4><p class="price">₹150</p></div></div>
</div>
</section>

<script>
function filterMenu(cat){
  let items=document.querySelectorAll('.menu-card');
  document.querySelectorAll('.filter-btns button').forEach(b=>b.classList.remove('active'));
  event.target.classList.add('active');

  items.forEach(item=>{
    item.style.display=(cat=="all"||item.classList.contains(cat))?"block":"none";
  });
}
</script>

</body>
</html>


<script>
function filterMenu(category){
  let items = document.querySelectorAll('.menu-card');
  let buttons = document.querySelectorAll('.filter-btns button');

  buttons.forEach(btn=>btn.classList.remove('active'));
  event.target.classList.add('active');

  items.forEach(item=>{
    if(category === 'all' || item.classList.contains(category)){
      item.style.display = "block";
    }else{
      item.style.display = "none";
    }
  });
}
</script>

<section id="booking">
  <div class="section-title">
    <h2>Online Table Booking</h2>
    <p>Reserve your seat now</p>
  </div>
  <div class="booking">
    <form action="book.php" method="POST">
  <input type="text" name="name" placeholder="Full Name" required>
  <input type="tel" name="mobile" placeholder="Mobile Number" required>
  <input type="date" name="date" required>
  <input type="time" name="time" required>

  <select name="persons">
    <option>1 Person</option>
    <option>2 Persons</option>
    <option>4 Persons</option>
    <option>6+ Persons</option>
  </select>

  <button class="btn" type="submit">Confirm Booking</button>
</form>

  </div>
</section>

<section id="gallery">
  <div class="section-title">
    <h2>Our Ambience</h2>
    <p>Moments captured</p>
  </div>
  <div class="gallery">
    <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5">
    <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de">
    <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1">
  </div>
</section>

<section id="contact">
  <div class="section-title">
    <h2>Contact & Location</h2>
    <p>Visit us or call for instant booking</p>
  </div>
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:30px;align-items:center">
    <div>
      <h3>Urban Dine Restaurant</h3>
      <p>📍 Mumbai, Maharashtra</p>
      <p>📞 <a href="tel:+918879352443" style="color:#c59d5f;font-weight:600;text-decoration:none">+91 88793 52443</a></p>
      <p>⏰ Open: 11:00 AM – 11:30 PM</p>
      <br>
      <a href="https://wa.me/918879352443" class="btn">WhatsApp Booking</a>
    </div>
    <iframe src="https://www.google.com/maps?q=Mumbai&output=embed" width="100%" height="300" style="border:0;border-radius:15px" loading="lazy"></iframe>
  </div>
</section>

<footer>
  <p>© 2025 Urban Dine | 📞 +91 88793 52443 | Mumbai</p>
</footer>

</body>
</html>
