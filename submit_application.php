<?php
$servername = "localhost";
$username = "UnitedTrustBank";
$dbname = "applicant";

// Create connection
$conn = new mysqli($servername, $username, "", $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission
    $applicantName = mysqli_real_escape_string($conn, $_POST["full-name"]);
    // ... (other form fields)

    // New fields for staff-filled form
    $filledByStaff = mysqli_real_escape_string($conn, $_POST["filled-by-staff"]);
    $staffUsername = mysqli_real_escape_string($conn, $_POST["staff-username"]);

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO loan_applications (applicant_name, filled_by_staff, staff_username) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("sss", $applicantName, $filledByStaff, $staffUsername);
        if ($stmt->execute()) {
            echo "Application submitted successfully";
            // Redirect to personalloanapplicants.html
            header("Location: personalloanapplicants.html");
            exit();
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
