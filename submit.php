<?php
// Connect to DB
$conn = mysqli_connect("localhost", "root", "", "lifeline");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from 'web' table
$sql = "SELECT * FROM web ORDER BY registered_at DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2 style='margin-top: 60px; color: crimson; text-align: center;'>Registered Donors</h2>";
    echo "<div style='overflow-x:auto;'><table border='1' cellspacing='0' cellpadding='10' style='width: 100%; margin-top: 20px; border-collapse: collapse;'>
            <tr style='background-color: crimson; color: white;'>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Age</th>
              <th>Blood Group</th>
              <th>City</th>
              <th>Gender</th>
              <th>Registered At</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr style='text-align:center;'>
                <td>" . $row["id"] . "</td>
                <td>" . htmlspecialchars($row["username"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["number"]) . "</td>
                <td>" . $row["age"] . "</td>
                <td>" . htmlspecialchars($row["blood"]) . "</td>
                <td>" . htmlspecialchars($row["city"]) . "</td>
                <td>" . htmlspecialchars($row["gender"]) . "</td>
                <td>" . $row["registered_at"] . "</td>
              </tr>";
    }

    echo "</table></div>";
} else {
    echo "<p style='text-align: center; margin-top: 40px;'>No donor records found.</p>";
}

mysqli_close($conn);
?>
