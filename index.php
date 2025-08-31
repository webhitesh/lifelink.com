<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LifeLink - Blood & Plasma Donation</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #fff5f5;
      scroll-behavior: smooth;
      animation: backgroundFade 10s infinite alternate;
    }

    @keyframes backgroundFade {
      0% { background-color: #fff5f5; }
      50% { background-color: #ffeaea; }
      100% { background-color: #fff5f5; }
    }

    .navbar {
      background-color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 60px 20px 0px;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 100;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .navbar .logo {
      font-size: 24px;
      font-weight: bold;
      color: crimson;
    }

    .navbar ul {
      list-style: none;
      display: flex;
      gap: 30px;
      margin: 0;
      padding: 0;
    }

    .navbar ul li {
      position: relative;
    }

    .navbar ul li a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
      transition: color 0.3s ease;
      padding: 10px;
      display: block;
    }

    .navbar ul li a:hover {
      color: crimson;
    }

    .dropdown {
      position: relative;
    }

    .dropdown .dropdown-menu {
      display: none;
      position: absolute;
      top: 100%;
      right: 0;
      transform: translateX(-2%);
      background-color: white;
      min-width: 180px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      border-radius: 6px;
      z-index: 200;
    }

    .dropdown:hover .dropdown-menu {
      display: block;
    }

    .dropdown-menu li a {
      padding: 12px 16px;
      color: #333;
    }

    .dropdown-menu li a:hover {
      background-color: #f9f9f9;
      color: crimson;
    }

    .hero {
      height: 60vh;
      background: linear-gradient(rgba(220, 20, 60, 0.4), rgba(0, 0, 0, 0.6)),
        url('https://images.unsplash.com/photo-1600959907703-c9e9bd6fda96?auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      text-align: center;
      padding: 0 20px;
      margin-top: 80px;
      animation: fadeInHero 2s ease-in;
    }

    @keyframes fadeInHero {
      0% { opacity: 0; transform: translateY(-30px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    .hero .hero-text h1 {
      font-size: 42px;
      margin-bottom: 10px;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
    }

    .hero .hero-text p {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .btn {
      padding: 12px 24px;
      border: none;
      background: white;
      color: crimson;
      border-radius: 8px;
      margin: 10px;
      font-weight: bold;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .btn:hover {
      background-color: #f1f1f1;
    }

    .btn-primary {
      background: crimson;
      color: white;
    }

    .btn-primary:hover {
      background: #a4001d;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      padding: 40px 20px;
      text-align: center;
    }

    .container img {
      width: 100%;
      max-width: 800px;
      margin-top: 30px;
      border-radius: 10px;
    }

    .cta {
      background-color: #ffe4e4;
      padding: 60px 20px;
      text-align: center;
    }

    footer {
      background: crimson;
      color: white;
      text-align: center;
      padding: 20px;
    }

    .author-info {
      text-align: center;
      font-size: 14px;
      color: black;
      margin-top: 20px;
      font-style: italic;
    }
  </style>
</head>
<body>

<!-- Header -->
<header class="navbar">
  <div class="logo">🩸 LifeLink</div>
  <nav>
    <ul>
      <li><a href="about.php">About Us</a></li>
      <li><a href="works.php">How it Works</a></li>
      <li class="dropdown">
        <a href="#">Login ▼</a>
        <ul class="dropdown-menu">
          <li><a href="dlogin.php">Donor Login</a></li>
          <li><a href="rlogin.php">Recipient Login</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</header>

<!-- Hero Section -->
<section class="hero">
  <div class="hero-text">
    <h1>Welcome to 🩸LifeLink</h1>
    <p>Your trusted platform for connecting blood and plasma donors with those in urgent need.</p>
  </div>
</section>

<!-- CTA Section -->
<section class="cta">
  <h2>Ready to Save a Life?</h2>
  <a href="dregistration.php" class="btn btn-primary">Register as Donor</a>
  <a href="requester.php" class="btn btn-primary">Register as Recipient</a>
</section>

<!-- Overview Section -->
<section id="overview">
  <div class="container">
    <h2>Overview of Our System</h2>
    <p>
      LifeLink is a smart and responsive platform designed to help people in critical need of blood or plasma.
      By connecting donors and recipients efficiently, we make life-saving donations easier and faster.
      Our goal is to create a supportive community where availability of blood is never a problem.
    </p>
    <img src="https://cdn.expresshealthcare.in/wp-content/uploads/2020/06/15151518/GettyImages-1216694149-e1592214251281.jpg" alt="Blood Donation Overview">
  </div>
</section>

<!-- Footer -->
<footer>
  <p>&copy; 2025 LifeLink | Designed ForSSSS Humanity ❤️</p>
</footer>

<!-- Author Information -->
<p class="author-info">Developed by Hitesh Ghoyal</p>

</body>
</html>
