<?php
// PHP code to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection setup
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $password = $_POST["password"];
    $city = $_POST["city"];
    $bloodgroup = $_POST["bloodgroup"];
    $reason = $_POST["reason"];

    // Insert into requesters table
    $sql = "INSERT INTO requesters (name, email, contact, pass, city, bloodgroup, reason)
            VALUES ('$name', '$email', '$contact', '$password', '$city', '$bloodgroup', '$reason')";

    if ($conn->query($sql) === TRUE) {
        header("Location: rlogin.php"); // Redirect to login page after success
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register as Requester - LifeLink</title>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fff5f5;
      scroll-behavior: smooth;
      animation: bgPulse 10s infinite alternate;
    }

    @keyframes bgPulse {
      0% { background-color: #fff5f5; }
      50% { background-color: #ffeaea; }
      100% { background-color: #fff5f5; }
    }

    .navbar {
      background-color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 60px;
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

    .request-section {
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
      max-width: 600px;
      margin: auto;
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(220, 20, 60, 0.1);
    }

    .request-section h2 {
      text-align: center;
      color: crimson;
      margin-bottom: 10px;
    }

    .request-section p {
      text-align: center;
      margin-bottom: 30px;
      color: #444;
      font-size: 16px;
    }

    .request-form {
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

    .form-group input,
    .form-group select,
    .form-group textarea {
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
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
      margin-top: 60px;
    }
  </style>
</head>
<body>

<header class="navbar">
  <div class="logo">🩸 LifeLink</div>
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About Us</a></li>
      <li><a href="works.php">How it Works</a></li>
      <li><a href="contact.html">Contact</a></li>
    </ul>
  </nav>
</header>

<section class="request-section">
  <div class="container">
    <h2>Register as Blood/Plasma Requester</h2>
    <p>Please fill in the form to register yourself. We’ll notify you when a matching donor is available.</p>

    <form method="post" class="request-form">
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required />
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
      </div>

      <div class="form-group">
        <label for="contact">Contact Number</label>
        <input type="tel" id="contact" name="contact" pattern="[0-9]{10}" required />
      </div>

      <div class="form-group">
        <label for="password">Create Password</label>
        <input type="password" id="password" name="password" required />
      </div>

      <div class="form-group">
          <label for="city">City</label>
<select id="city" name="city" required>
  <option value="">Select City</option>
  <option value="Dewbhumi Dwarka">Dewbhumi Dwarka</option>
  <option value="Ahmedabad">Ahmedabad</option>
  <option value="Surat">Surat</option>
  <option value="Rajkot">Rajkot</option>
  <option value="Jamnagar">Jamnagar</option>
  <option value="Mehsana">Mehsana</option>
  <option value="Bharuch">Bharuch</option>
   <option value="Khambhalia">Khambhalia</option>
  <option value="Junagadh">Junagadh</option>
  <option value="Valsad">Valsad</option>
  <option value="Morbi">Morbi</option>
  <option value="Patan">Patan</option>
  <option value="Porbandar">Porbandar</option>
  <option value="Veraval">Veraval</option>

</select>
      </div>

      <div class="form-group">
        <label for="bloodgroup">Required Blood Group</label>
        <select id="bloodgroup" name="bloodgroup" required>
          <option value="">--Select--</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
        </select>
      </div>

      <div class="form-group">
        <label for="reason">Medical Reason / Notes</label>
        <textarea id="reason" name="reason" rows="4" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</section>

<footer>
  <p>&copy; 2025 LifeLink | Designed for Humanity ❤️</p>
</footer>

</body>
</html>
