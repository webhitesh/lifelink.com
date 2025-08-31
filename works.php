<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>How It Works - LifeLink</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #fff5f5;
      animation: bgPulse 10s infinite alternate;
      scroll-behavior: smooth;
    }

    @keyframes bgPulse {
      0% { background-color: #fff5f5; }
      50% { background-color: #ffeaea; }
      100% { background-color: #fff5f5; }
    }

    /* Navbar */
    .navbar {
      background-color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 0px;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 100;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
      color: crimson;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 30px;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      position: relative;
    }

    nav ul li a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    nav ul li a:hover {
      color: crimson;
    }

    /* Dropdown */
.dropdown {
  position: absolute;
  top: 35px;
  right: 0; /* Yeh line change hai: right instead of left */
  background-color: white;
  border-radius: 6px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  display: none;
  flex-direction: column;
  min-width: 220px;
  z-index: 999;
}


    .dropdown a {
      padding: 10px 15px;
      text-decoration: none;
      color: #333;
      border-bottom: 1px solid #eee;
      transition: background-color 0.3s;
    }

    .dropdown a:last-child {
      border-bottom: none;
    }

    .dropdown a:hover {
      background-color: #ffeaea;
    }

    nav ul li:hover .dropdown {
      display: flex;
    }

    /* Section */
    .how-it-works {
      padding: 120px 20px 60px;
      max-width: 1200px;
      margin: auto;
      text-align: center;
    }

    .how-it-works h2 {
      font-size: 32px;
      color: crimson;
      margin-bottom: 10px;
    }

    .how-it-works p {
      color: #555;
      max-width: 800px;
      margin: auto;
      font-size: 16px;
      margin-bottom: 40px;
    }

    /* Cards */
    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }

    .card {
      background: white;
      border-radius: 10px;
      width: 300px;
      box-shadow: 0 6px 15px rgba(220, 20, 60, 0.1);
      overflow: hidden;
      animation: fadeInUp 1.5s ease;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card h3 {
      margin: 20px 0 10px;
      color: crimson;
    }

    .card p {
      padding: 0 20px 20px;
      color: #555;
      font-size: 14px;
    }

    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    footer {
      background: crimson;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 60px;
    }

    @media(max-width: 768px) {
      .card-container {
        flex-direction: column;
        align-items: center;
      }
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
      <li><a href="about.php">About Us</a></li>
      <li>
        <a href="#">Contact</a>
        <div class="dropdown">
          <a href="tel:9016669031">📞Contact 1: 9016669031</a>
          <a href="tel:7698037678">📞Contact 2: 7698037678</a>
          <a href="mailto:lifelinkinquiry@gmail.com">✉️ Email: lifelinkinquiry@gmail.com</a><li></li>
        </div>
      </li>
    </ul>
  </nav>
</header>

<!-- How It Works Section -->
<section class="how-it-works">
  <h2>How LifeLink Works</h2>
  <p>LifeLink connects blood and plasma donors to recipients in real time, especially in emergencies. Our system is fast, simple, and community-driven to save lives effectively.</p>

  <div class="card-container">
    <!-- Card 1 -->
    <div class="card">
      <img src="https://www.justforthehealthofit.org/sites/default/files/inline-images/NYBC-NJBS%20blood%20emergency%20donors%20needed%20now%20thumbnail.jpg" alt="Easy Donation">
      <h3>Easy for Donors</h3>
      <p>Donors can register and get matched with patients nearby in just a few clicks. You’ll receive alerts when your donation can help save a life.</p>
    </div>

    <!-- Card 2 -->
    <div class="card">
      <img src="https://ichef.bbci.co.uk/ace/standard/976/cpsprodpb/182FF/production/_107317099_blooddonor976.jpg" alt="Quick for Recipients">
      <h3>Fast for Recipients</h3>
      <p>People in need can easily request blood, and the system finds suitable donors fast. Our algorithm prioritizes emergencies and proximity.</p>
    </div>

    <!-- Card 3 -->
    <div class="card">
      <img src="https://www.tvsscs.com/courierservices/wp-content/uploads/2022/03/tvs-scs-safe-and-reliable-transport-of-blood-sample.webp" alt="Smart & Secure">
      <h3>Reliable & Secure</h3>
      <p>All data is securely handled. You can trust LifeLink to handle requests with privacy and connect genuine donors and recipients only.</p>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  <p>&copy; 2025 LifeLink | Designed for Humanity ❤️</p>
</footer>

</body>
</html>
