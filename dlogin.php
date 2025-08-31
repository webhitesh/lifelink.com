<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "web");

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query user
    $sql = "SELECT * FROM donors WHERE email='$email' AND pass='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Set all needed session variables
        $_SESSION["donor_email"] = $user["email"];
        $_SESSION["donor_name"] = $user["name"];
       $_SESSION["donor_bloodgroup"] = $user["bloodgroup"];
        $_SESSION["donor_city"] = $user["city"];

        header("Location: ddash.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }

    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Donor Login - LifeLink</title>

  <style>
    /* Base Setup */
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #fff5f5;
      scroll-behavior: smooth;
      animation: bgPulse 10s infinite alternate;
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

    /* Login Form Section */
    .login-section {
      padding: 100px 20px 60px;
      background: linear-gradient(rgba(255, 246, 246, 0.95), rgba(255, 246, 246, 0.95)),
                  url('https://t3.ftcdn.net/jpg/03/60/19/34/360_F_360193480_kiF7OU7k3YUhAADbLQzobEFwgOeejHZJ.jpg') no-repeat center center/cover;
      animation: fadeInUp 1.5s ease forwards;
      margin: 0;
      background-size: cover;
    }

    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    .container {
      max-width: 400px;
      margin: auto;
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(220, 20, 60, 0.1);
    }

    .login-section h2 {
      text-align: center;
      color: crimson;
      margin-bottom: 10px;
    }

    .login-section p {
      text-align: center;
      margin-bottom: 30px;
      color: #444;
      font-size: 16px;
    }

    /* Form Styling */
    .login-form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group label {
      margin-bottom: 6px;
      font-weight: 500;
      color: #333;
    }

    .form-group input {
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-group input:focus {
      outline: none;
      border-color: crimson;
      box-shadow: 0 0 6px rgba(220, 20, 60, 0.3);
    }

    .btn {
      padding: 14px;
      background: crimson;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background: #a4001d;
    }

    footer {
      background: crimson;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 200px;
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
      <li><a href="pages/about.php">About Us</a></li>
      <li><a href="pages/works.php">How it Works</a></li>
      <li></li>
  
        </div>
    </ul>
  </nav>
</header>

<!-- Donor Login Form -->
<section class="login-section">
  <div class="container">
    <h2>Donor Login</h2>
    <p>Please enter your credentials to log in.</p>

    <form action="dlogin.php" method="POST" class="login-form">
      <div class="form-group">
        <label for="email">Email </label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit" class="btn">Login</button>
    </form>
     <p class="note">Not registered yet? <a href="dregistration.php">Register as Donor</a></p>
  </div>
</section>

<!-- Footer -->
<footer>
  <p>&copy; 2025 LifeLink | Designed for Humanity ❤️</p>
</footer>

</body>
</html>
