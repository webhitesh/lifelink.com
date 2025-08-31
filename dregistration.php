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
    $pass = $_POST["password"];
    $age = $_POST["age"];
    $bloodgroup = $_POST["bloodgroup"];
    $city = $_POST["city"];
    $gender = $_POST["gender"];
    

    // Insert into requesters table
    $sql = "INSERT INTO donors (name, email, contact, pass, age, bloodgroup, city, gender)
            VALUES ('$name', '$email', '$contact', '$pass', '$age', '$bloodgroup', '$city', '$gender')";

    if ($conn->query($sql) === TRUE) {
        header("Location: dlogin.php"); // Redirect to login page after success
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register as Donor | LifeLink</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(rgba(255, 246, 246, 0.95), rgba(255, 246, 246, 0.95)),
                  url('https://t3.ftcdn.net/jpg/03/60/19/34/360_F_360193480_kiF7OU7k3YUhAADbLQzobEFwgOeejHZJ.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    .navbar {
      background: #fff;
      padding: 20px 60px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
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

    .container {
      max-width: 600px;
      margin: 80px auto;
      background: #ffffff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: crimson;
    }

    form label {
      display: block;
      margin-bottom: 5px;
      color: #444;
      font-weight: 500;
    }

    form input, form select {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
    }

    .gender {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
    }

    .gender label {
      font-weight: 400;
      color: #444;
    }

    button {
      width: 100%;
      padding: 12px;
      background: crimson;
      color: white;
      font-size: 1rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: darkred;
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
        <li><a href="pages/about.php">About</a></li>
        <li><a href="pages/works.php">How it Works</a></li>
      </ul>
    </nav>
  </header>

  <div class="container">
    <h2>Donor Registration</h2>
    <form action="./dregistration.php" method="POST">

      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="contact">Contact Number</label>
      <input type="tel" id="contact" name="contact" pattern="[0-9]{10}" required>

      <label for="password">Create Password</label>
      <input type="password" id="password" name="password" required>

      <label for="age">Age</label>
      <input type="number" id="age" name="age" min="18" max="65" required>

      <label for="bloodgroup">Blood Group</label>
      <select id="bloodgroup" name="bloodgroup" required>
        <option value="">Select</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
      </select>

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


      <div class="gender">
        <label><input type="radio" name="gender" value="Male" required> Male</label>
        <label><input type="radio" name="gender" value="Female"> Female</label>
        <label><input type="radio" name="gender" value="Other"> Other</label>
      </div>

      <button type="submit">Submit</button>

    </form>
  </div>

  <footer>
    <p>&copy; 2025 LifeLink | Designed for Humanity ❤️</p>
  </footer>
</body>
</html>
