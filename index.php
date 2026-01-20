<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restaurant | Menu & Table Booking</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    
    *{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif}
    body{background:#fafafa;color:#333}
    header{background:url('https://images.unsplash.com/photo-1552566626-52f8b828add9') center/cover no-repeat;height:90vh;color:#fff}
    header::after{content:'';position:absolute;inset:0;background:rgba(0,0,0,.55)}
    .hero{position:relative;z-index:1;height:100%;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;padding:20px}
    .hero h1{font-size:3rem;font-weight:700}
    .hero p{margin:15px 0;font-size:1.1rem}
    .btn{padding:12px 25px;background:#c59d5f;color:#fff;border:none;border-radius:30px;cursor:pointer;text-decoration:none;font-weight:600}
    nav{position:absolute;top:0;width:100%;display:flex;justify-content:space-between;align-items:center;padding:20px 50px;z-index:2}
    nav h2{color:#fff}
    nav a{color:#fff;margin-left:20px;text-decoration:none;font-weight:500}
    section{padding:80px 8%}
    .section-title{text-align:center;margin-bottom:50px}
    .section-title h2{font-size:2.2rem}
    .menu{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:30px}
    .menu-card{background:#fff;border-radius:15px;overflow:hidden;box-shadow:0 10px 25px rgba(0,0,0,.1)}
    .menu-card img{width:100%;height:200px;object-fit:cover}
    .menu-card .info{padding:20px}
    .menu-card h3{margin-bottom:10px}
    .price{color:#c59d5f;font-weight:600}
    .booking{background:#111;color:#fff;border-radius:20px;padding:50px}
    .booking form{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px}
    input,select{padding:12px;border-radius:10px;border:none}
    .gallery{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px}
    .gallery img{width:100%;height:220px;object-fit:cover;border-radius:15px}
    footer{background:#000;color:#aaa;text-align:center;padding:25px}
    /* ===== MOBILE RESPONSIVE ===== */

@media (max-width: 768px){

  header{
    height:70vh;
  }

  .hero h1{
    font-size:2rem;
  }

  .hero p{
    font-size:1rem;
  }

  nav{
    padding:15px 20px;
  }

  nav div{
    display:none;
    position:absolute;
    top:60px;
    right:20px;
    background:#111;
    padding:15px;
    border-radius:12px;
    flex-direction:column;
    gap:15px;
  }

  nav div a{
    display:block;
  }

  .menu{
    grid-template-columns:1fr;
  }

  .booking{
    padding:25px;
  }

  .booking form{
    grid-template-columns:1fr;
  }

  section{
    padding:60px 5%;
  }

  footer{
    font-size:0.9rem;
  }
}

/* Hamburger Icon */
.menu-toggle{
  display:none;
  font-size:26px;
  color:#fff;
  cursor:pointer;
}

@media (max-width:768px){
  .menu-toggle{
    display:block;
  }
}

  </style>
</head>
<body>

<header>
  <nav>
  <h2>Urban Dine</h2>

  <div class="menu-toggle" onclick="toggleMenu()">☰</div>

  <div id="navLinks">
    <a href="#menu">Menu</a>
      <a href="#booking">Book Table</a>
      <a href="#gallery">Gallery</a>
      <a href="admin/signup.php"
   style="border:1px solid #c59d5f;padding:8px 18px;border-radius:20px">
   Admin
</a>
</div>
  </nav>
  <script>
function toggleMenu(){
  let nav = document.getElementById("navLinks");
  nav.style.display = nav.style.display === "flex" ? "none" : "flex";
}
</script>

  <div class="hero">
    <h1>Fine Dining Experience</h1>
    <p>Delicious food • Cozy ambience • Perfect moments</p>
    <a href="#booking" class="btn">Reserve Your Table</a>
  </div>
</header>

<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:'Poppins',sans-serif;
}
body{
  background:#fafafa;
}
.menu-section{
  padding:70px 8%;
}
.menu-title{
  text-align:center;
  margin-bottom:30px;
}
.menu-title h2{
  font-size:32px;
}
.filter-btns{
  display:flex;
  justify-content:center;
  flex-wrap:wrap;
  gap:15px;
  margin-bottom:40px;
}
.filter-btns button{
  padding:10px 22px;
  border:none;
  border-radius:25px;
  background:#eee;
  cursor:pointer;
  font-weight:500;
  transition:.3s;
}
.filter-btns button.active,
.filter-btns button:hover{
  background:#c59d5f;
  color:#fff;
}
.menu-items{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
  gap:30px;
}
.menu-card{
  background:#fff;
  border-radius:15px;
  overflow:hidden;
  box-shadow:0 10px 25px rgba(0,0,0,.1);
  transition:.3s;
}
.menu-card:hover{
  transform:translateY(-8px);
}
.menu-card img{
  width:100%;
  height:200px;
  object-fit:cover;
}
.menu-info{
  padding:20px;
}
.menu-info h4{
  margin-bottom:8px;
}
.price{
  color:#c59d5f;
  font-weight:600;
}
</style>
</head>

<body>

<section class="menu-section">
  <div class="menu-title">
    <h2>Our Menu</h2>
    <p>Choose your favorite</p>
  </div>

  <!-- FILTER BUTTONS -->
  <div class="filter-btns">
    <button class="active" onclick="filterMenu('all')">All</button>
    <button onclick="filterMenu('starters')">Starters</button>
    <button onclick="filterMenu('main')">Main Course</button>
    <button onclick="filterMenu('chinese')">Chinese</button>
    <button onclick="filterMenu('desserts')">Desserts</button>
    <button onclick="filterMenu('drinks')">Drinks</button>
  </div>

  <!-- MENU ITEMS -->
  <div class="menu-items">

    <!-- STARTERS -->
    <div class="menu-card starters">
      <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092">
      <div class="menu-info">
        <h4>Paneer Tikka</h4>
        <p class="price">₹220</p>
      </div>
    </div>

    <div class="menu-card starters">
      <img src="https://images.unsplash.com/photo-1628294895950-9805252327bc">
      <div class="menu-info">
        <h4>Veg Spring Roll</h4>
        <p class="price">₹180</p>
      </div>
    </div>

    <!-- MAIN COURSE -->
    <div class="menu-card main">
      <img src="https://images.unsplash.com/photo-1546833999-b9f581a1996d">
      <div class="menu-info">
        <h4>Paneer Butter Masala</h4>
        <p class="price">₹280</p>
      </div>
    </div>

    <div class="menu-card main">
      <img src="https://images.unsplash.com/photo-1601050690597-df0568f70950">
      <div class="menu-info">
        <h4>Veg Biryani</h4>
        <p class="price">₹260</p>
      </div>
    </div>

    <!-- CHINESE -->
    <div class="menu-card chinese">
      <img src="https://images.unsplash.com/photo-1617196034183-421b4917c92d">
      <div class="menu-info">
        <h4>Hakka Noodles</h4>
        <p class="price">₹230</p>
      </div>
    </div>

    <div class="menu-card chinese">
      <img src="https://images.unsplash.com/photo-1612929633738-8fe44f7ec841">
      <div class="menu-info">
        <h4>Manchurian</h4>
        <p class="price">₹210</p>
      </div>
    </div>

    <!-- DESSERTS -->
    <div class="menu-card desserts">
      <img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb">
      <div class="menu-info">
        <h4>Chocolate Brownie</h4>
        <p class="price">₹150</p>
      </div>
    </div>

    <div class="menu-card desserts">
      <img src="https://images.unsplash.com/photo-1605475127963-639d85d7f6f2">
      <div class="menu-info">
        <h4>Ice Cream Sundae</h4>
        <p class="price">₹130</p>
      </div>
    </div>

    <!-- DRINKS -->
    <div class="menu-card drinks">
      <img src="https://images.unsplash.com/photo-1544145945-f90425340c7e">
      <div class="menu-info">
        <h4>Cold Coffee</h4>
        <p class="price">₹120</p>
      </div>
    </div>

    <div class="menu-card drinks">
      <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93">
      <div class="menu-info">
        <h4>Fresh Lime Soda</h4>
        <p class="price">₹90</p>
      </div>
    </div>

  </div>
</section>

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
