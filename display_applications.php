<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "UnitedTrustBank";
$dbname = "applicant";

// Create connection
$conn = new mysqli($servername, $username, "", $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch and display loan applications
$sql = "SELECT * FROM loan_applications";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Applicant Name</th><th>Filled By Staff</th><th>Staff Username</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row["applicant_name"]) . "</td><td>" . ($row["filled_by_staff"] ? "Yes" : "No") . "</td><td>" . htmlspecialchars($row["staff_username"]) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No applications found";
}

// Close the connection
$conn->close();
?>
