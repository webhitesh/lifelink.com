<?php
session_start();

// Protect page
if (!isset($_SESSION['donor_email'])) {
  header("Location: dlogin.php");
  exit();
}

// Retrieve session data
$name = $_SESSION['donor_name'];
$email = $_SESSION['donor_email'];
$bloodgroup = $_SESSION['donor_bloodgroup'];
$city = $_SESSION['donor_city'];

// DB connection
$conn = new mysqli("localhost", "root", "", "web");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get matching requesters
$match_sql = "SELECT * FROM requesters WHERE bloodgroup = ? AND city = ?";
$stmt = $conn->prepare($match_sql);
$stmt->bind_param("ss", $bloodgroup, $city);
$stmt->execute();
$matched_result = $stmt->get_result();

// Get all donors
$all_donors_result = $conn->query("SELECT * FROM donors");

// Get all requesters
$all_requesters_result = $conn->query("SELECT * FROM requesters");

// Handle search query
$searchResults = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
  $searchBlood = $_POST['search_blood'];
  $searchCity = $_POST['search_city'];

  $search_sql = "SELECT name, email, bloodgroup, city, contact FROM donors WHERE bloodgroup = ? AND city = ?";
  $search_stmt = $conn->prepare($search_sql);
  $search_stmt->bind_param("ss", $searchBlood, $searchCity);
  $search_stmt->execute();
  $searchResults = $search_stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Donor Dashboard - LifeLink</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #efdadaff;
    }

    .navbar {
      background-color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 0px;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
      color: crimson;
      margin-left: 20px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 30px;
      margin: 0;
      padding: 0;
      margin-right: 20px;
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

    .welcome {
      background-color: #ffe5e5;
      padding: 80px 40px 30px;
      margin-top: 70px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .welcome h2 {
      margin: 0 0 10px;
      color: crimson;
      font-size: 28px;
    }

    .welcome p {
      margin: 4px 0;
      font-size: 16px;
      color: #333;
    }

    .dashboard {
      padding: 40px;
    }

    .section {
      background: #fff;
      margin-bottom: 60px;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 12px 20px rgba(0,0,0,0.15);
      animation: fadeIn 0.6s ease-in-out;
    }

    .section-title {
      font-size: 24px;
      margin-bottom: 20px;
      font-weight: bold;
      color: #b30000;
      border-left: 5px solid crimson;
      padding-left: 15px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
      font-size: 15px;
    }

    th {
      background-color: #ffe5e5;
      color: crimson;
    }

    .call-btn {
      background-color: crimson;
      color: white;
      padding: 8px 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .call-btn:hover {
      background-color: #a00000;
    }

    .matching-requests {
      background-color: #fff0f0;
      border-left: 6px solid crimson;
    }

    footer {
      background-color: crimson;
      color: white;
      text-align: center;
      padding: 20px;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .toggle-btn {
      background-color: crimson;
      color: white;
      padding: 10px 18px;
      margin-top: 15px;
      font-size: 15px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      display: block;
      margin-left: auto;
      margin-right: auto;
      box-shadow: 0 4px 12px rgba(255, 0, 0, 0.3);
      transition: all 0.3s ease;
    }

    .toggle-btn:hover {
      background-color: #a00000;
      transform: scale(1.05);
    }
  </style>
</head>
<body>

<!-- Navbar -->
<header class="navbar">
  <div class="logo">🩸 LifeLink</div>
  <nav>
    <ul>
      <li><a href="index.php">Logout</a></li>
    </ul>
  </nav>
</header>

<!-- Welcome Section -->
<div class="welcome">
  <h2>Welcome Blood Donor, <?php echo htmlspecialchars($name); ?></h2>
  <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
  <p><strong>Bloodgroup:</strong> <?php echo htmlspecialchars($bloodgroup); ?></p>
  <p><strong>City:</strong> <?php echo htmlspecialchars($city); ?></p>
</div>

<!-- Dashboard -->
<div class="dashboard">

  <!-- Search Section -->
  <div class="section">
    <div class="section-title">Search Requesters by Blood Group & City</div>
    <form method="POST" style="display: flex; flex-wrap: wrap; gap: 20px; align-items: center;">
      <div>
        <label for="search_blood">Blood Group:</label><br>
        <select name="search_blood" id="search_blood" required style="padding: 8px; border-radius: 6px; border: 1px solid #ccc;">
          <option value="">Select Blood Group</option>
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

      <div>
        <label for="search_city">City:</label><br>
        <select name="search_city" id="search_city" required style="padding: 8px; border-radius: 6px; border: 1px solid #ccc;">
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

      <div>
        <button type="submit" name="search" class="call-btn">Search</button>
      </div>
    </form>

    <?php if (!empty($searchResults) && $searchResults->num_rows > 0): ?>
      <table style="margin-top: 30px;">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Blood Group</th>
          <th>City</th>
          <th>Contact</th>
          <th>Action</th>
        </tr>
        <?php while ($row = $searchResults->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['bloodgroup']) ?></td>
            <td><?= htmlspecialchars($row['city']) ?></td>
            <td><?= htmlspecialchars($row['contact']) ?></td>
            <td><button class="call-btn" onclick="window.location.href='tel:<?= $row['contact'] ?>'">Call</button></td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
      <p style="margin-top: 20px; color: crimson;">No matching requesters found.</p>
    <?php endif; ?>
  </div>

  <!-- Matching Blood Requesters -->
  <div class="section matching-requests">
    <div class="section-title">Matching Blood Requesters</div>
    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Blood Group</th>
        <th>Location</th>
        <th>Contact</th>
        <th>Action</th>
      </tr>
      <?php
      $count = 0;
      while ($row = $matched_result->fetch_assoc()) {
        $hidden = $count >= 7 ? "style='display: none'" : "";
        echo "<tr class='match-row' $hidden>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bloodgroup']) . "</td>";
        echo "<td>" . htmlspecialchars($row['city']) . "</td>";
        echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
        echo "<td><button class='call-btn' onclick=\"window.location.href='tel:{$row['contact']}'\">Call</button></td>";
        echo "</tr>";
        $count++;
      }
      ?>
    </table>
    <?php if ($count > 7): ?>
    <button class="toggle-btn" onclick="toggleRows('match-row', this)">Show More</button>
    <?php endif; ?>
  </div>

  <!-- All Donors -->
  <div class="section">
    <div class="section-title">All Registered Donors</div>
    <table>
      <tr>
        <th>Name</th>
        <th>Blood Group</th>
        <th>Location</th>
      </tr>
      <?php
      $count = 0;
      $conn2 = new mysqli("localhost", "root", "", "web");
      $donor_result = $conn2->query("SELECT * FROM donors");
      while ($row = $donor_result->fetch_assoc()) {
        $hidden = $count >= 7 ? "style='display: none'" : "";
        echo "<tr class='donor-row' $hidden>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bloodgroup']) . "</td>";
        echo "<td>" . htmlspecialchars($row['city']) . "</td>";
        echo "</tr>";
        $count++;
      }
      ?>
    </table>
    <?php if ($count > 7): ?>
    <button class="toggle-btn" onclick="toggleRows('donor-row', this)">Show More</button>
    <?php endif; ?>
  </div>

  <!-- All Requesters -->
  <div class="section">
    <div class="section-title">All Requesters</div>
    <table>
      <tr>
        <th>Name</th>
        <th>Blood Needed</th>
        <th>Location</th>
      </tr>
      <?php
      $count = 0;
      $requester_result = $conn2->query("SELECT * FROM requesters");
      while ($row = $requester_result->fetch_assoc()) {
        $hidden = $count >= 7 ? "style='display: none'" : "";
        echo "<tr class='requester-row' $hidden>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bloodgroup']) . "</td>";
        echo "<td>" . htmlspecialchars($row['city']) . "</td>";
        echo "</tr>";
        $count++;
      }
      ?>
    </table>
    <?php if ($count > 7): ?>
    <button class="toggle-btn" onclick="toggleRows('requester-row', this)">Show More</button>
    <?php endif; ?>
  </div>
</div>

<!-- Footer -->
<footer>
  &copy; 2025 LifeLink | Designed with ❤️ for saving lives
</footer>

<!-- Show More / Less Toggle Script -->
<script>
function toggleRows(rowClass, btn) {
  const rows = document.querySelectorAll('.' + rowClass);
  const isHidden = rows[7].style.display === "none";
  rows.forEach((row, i) => {
    if (i >= 7) row.style.display = isHidden ? "table-row" : "none";
  });
  btn.textContent = isHidden ? "Show Less" : "Show More";
}
</script>

</body>
</html>

<?php $conn->close(); ?>
