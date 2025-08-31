<?php
session_start();

// Protect page
if (!isset($_SESSION['donor_email'])) {
  header("Location: rlogin.php");
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

// Matching donors query
$match_sql = "SELECT name, email, bloodgroup, city, contact FROM donors WHERE bloodgroup = ? AND city = ?";
$match_stmt = $conn->prepare($match_sql);
$match_stmt->bind_param("ss", $bloodgroup, $city);
$match_stmt->execute();
$match_result = $match_stmt->get_result();

// All donors query
$all_sql = "SELECT name, email, bloodgroup, city, contact FROM donors";
$all_result = $conn->query($all_sql);

// Search results
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
  <title>Requester Dashboard - LifeLink</title>
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
    .dropdown {
      display: none;
      position: absolute;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      top: 30px;
      left: 0;
      z-index: 200;
    }
    .dropdown a {
      display: block;
      padding: 10px 15px;
      white-space: nowrap;
      color: #333;
    }
    .dropdown a:hover {
      background-color: #ffe5e5;
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
      box-shadow: 0 12px 24px rgba(0,0,0,0.2);
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
    .matching-donors {
      background-color: #fff0f0;
      border-left: 6px solid crimson;
      box-shadow: 0 16px 24px rgba(255, 0, 0, 0.2);
      animation: pulse 1.5s infinite;
    }
    @keyframes pulse {
      0% { box-shadow: 0 0 0 rgba(255, 0, 0, 0.2); }
      50% { box-shadow: 0 0 25px rgba(255, 0, 0, 0.5); }
      100% { box-shadow: 0 0 0 rgba(255, 0, 0, 0.2); }
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    footer {
      background-color: crimson;
      color: white;
      text-align: center;
      padding: 20px;
    }
    .show-more-btn {
      background-color: #e5093f;
      color: white;
      padding: 10px 25px;
      font-size: 16px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      box-shadow: 0 10px 20px rgba(229, 9, 63, 0.3);
      transition: all 0.3s ease-in-out;
      margin-top: 20px;
    }
    .show-more-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 12px 25px rgba(229, 9, 63, 0.45);
    }
    .center-btn {
      text-align: center;
    }
  </style>
</head>
<body>
<header class="navbar">
  <div class="logo">🩸 LifeLink</div>
  <nav>
    <ul>
      <li><div class="dropdown"><a href="#">Email Us</a><a href="#">Chat Support</a></div></li>
      <li><a href="index.php">Logout</a></li>
    </ul>
  </nav>
</header>

<div class="welcome">
  <h2>Welcome Blood Requester, <?php echo htmlspecialchars($name); ?></h2>
  <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
  <p><strong>Bloodgroup:</strong> <?php echo htmlspecialchars($bloodgroup); ?></p>
  <p><strong>City:</strong> <?php echo htmlspecialchars($city); ?></p>
</div>

<div class="dashboard">

  <!-- Donor Search Section -->
  <div class="section">
    <div class="section-title">Search Donors by Blood Group & City</div>
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
        <select id="search_city" name="search_city" required style="padding: 8px; border-radius: 6px; border: 1px solid #ccc;">
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
        <button type="submit" name="search" class="show-more-btn">Search</button>
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
      <p style="margin-top: 20px; color: crimson;">No matching donors found.</p>
    <?php endif; ?>
  </div>

  <!-- Matching Donors Section -->
  <div class="section matching-donors">
    <div class="section-title">Matching Blood Donors</div>
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
      $rowCount = 0;
      if ($match_result->num_rows > 0):
        while($row = $match_result->fetch_assoc()):
          $rowCount++;
          $hidden = $rowCount > 7 ? "style='display:none' class='match-row'" : "";
      ?>
        <tr <?= $hidden ?>>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['bloodgroup']) ?></td>
          <td><?= htmlspecialchars($row['city']) ?></td>
          <td><?= htmlspecialchars($row['contact']) ?></td>
          <td><button class="call-btn" onclick="window.location.href='tel:<?= $row['contact'] ?>'">Call</button></td>
        </tr>
      <?php endwhile; else: ?>
        <tr><td colspan="6">No matching donors found.</td></tr>
      <?php endif; ?>
    </table>
    <?php if ($rowCount > 7): ?>
      <div class="center-btn">
        <button class="show-more-btn" onclick="toggleRows('match-row', this)">Show More</button>
      </div>
    <?php endif; ?>
  </div>

  <!-- All Donors Section -->
  <div class="section">
    <div class="section-title">All Registered Donors</div>
    <table>
      <tr>
        <th>Name</th>
        <th>Blood Group</th>
        <th>Location</th>
      </tr>
      <?php
      $rowCount = 0;
      if ($all_result->num_rows > 0):
        while($row = $all_result->fetch_assoc()):
          $rowCount++;
          $hidden = $rowCount > 7 ? "style='display:none' class='all-row'" : "";
      ?>
        <tr <?= $hidden ?>>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['bloodgroup']) ?></td>
          <td><?= htmlspecialchars($row['city']) ?></td>
        </tr>
      <?php endwhile; else: ?>
        <tr><td colspan="5">No donors found.</td></tr>
      <?php endif; ?>
    </table>
    <?php if ($rowCount > 7): ?>
      <div class="center-btn">
        <button class="show-more-btn" onclick="toggleRows('all-row', this)">Show More</button>
      </div>
    <?php endif; ?>
  </div>

</div>

<footer>
  &copy; 2025 LifeLink | Designed with ❤️ for saving lives
</footer>

<script>
function toggleRows(rowClass, btn) {
  const rows = document.querySelectorAll('.' + rowClass);
  const isHidden = rows[0].style.display === 'none';
  rows.forEach(row => row.style.display = isHidden ? 'table-row' : 'none');
  btn.textContent = isHidden ? 'Show Less' : 'Show More';
}
</script>
</body>
</html>
<?php $conn->close(); ?>
