<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us - 🩸 LifeLink</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fff6f6;
    }

    .navbar {
      background: #fff;
      padding: 20px 60px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .navbar .logo {
      font-size: 24px;
      font-weight: bold;
      color: crimson;
    }

    .navbar nav ul {
      list-style: none;
      display: flex;
      gap: 30px;
      margin: 0;
      padding: 0;
    }

    .navbar nav ul li a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
      transition: color 0.3s;
    }

    .navbar nav ul li a:hover {
      color: crimson;
    }

    .hero-section {
      background: linear-gradient(to right, #ffe6e6, #fff0f0);
      padding: 60px 20px;
      text-align: center;
    }

    .hero-section h1 {
      color: crimson;
      font-size: 2.5rem;
      margin-bottom: 10px;
    }

    .hero-section p {
      color: #555;
      font-size: 1.2rem;
    }

    .services-section {
      padding: 60px 20px;
      text-align: center;
    }

    .container {
      max-width: 1100px;
      margin: 0 auto;
    }

    .services {
      display: flex;
      flex-wrap: nowrap;
      gap: 30px;
      justify-content: center;
      overflow-x: auto;
    }

    .service-card {
      background: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 50px 50px rgba(0,0,0,0.1);
      width: 260px;
      text-align: center;
      flex-shrink: 0;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .service-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
    }

    .service-card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      margin-bottom: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .service-card h3 {
      color: crimson;
      margin-bottom: 10px;
      font-size: 1.2rem;
    }

    .service-card p {
      color: #555;
      font-size: 0.95rem;
    }

    footer {
      background: crimson;
      color: white;
      text-align: center;
      padding: 15px;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <header class="navbar">
    <div class="logo">🩸 LifeLink</div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="works.php">How it Works</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-text">
      <h1>About 🩸 LifeLink</h1>
      <p>We believe every drop counts. Join our mission to save lives through easy and fast blood access.</p>
    </div>
  </section>

  <!-- Services Section -->
  <section class="services-section">
    <div class="container">
      <h2>What We Do ?</h2>
      <div class="services">
        <div class="service-card">
          <img src="https://images.onlymyhealth.com/imported/images/2024/June/14_Jun_2024/mn-donor.jpg" alt="Find Donors" />
          <h3>Find Blood Donors</h3>
          <p>Search and connect instantly with suitable blood donors in your area.</p>
        </div>
        <div class="service-card">
          <img src="https://www.earth.com/assets/_next/image/?url=https%3A%2F%2Fcff2.earth.com%2Fuploads%2F2019%2F03%2F01115339%2FCan-an-opt-out-organ-donation-policy-help-save-lives-1400x850.jpg&w=1200&q=75" alt="Register as Donor" />
          <h3>Easy Donor Registration</h3>
          <p>Register yourself as a donor with a simple and quick form.</p>
        </div>
        <div class="service-card">
          <img src="https://cdn.mos.cms.futurecdn.net/d4CbziPfy4qWaBHSnt2sXP.jpg" alt="Emergency Help" />
          <h3>Emergency Support</h3>
          <p>Fast response in emergencies to connect patients with potential donors.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 🩸 LifeLink. All rights reserved.</p>
  </footer>
</body>
</html>
