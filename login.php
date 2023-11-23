<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Output the values for debugging
    echo "username: $username<br>";
    echo "password: $password<br>";

    // Check if the entered credentials are admin/admin
    if ($username === "admin" && $password === "admin") {
        // Redirect to the dashboard page
        header("Location: dashboard.html");
        exit();
    } else {
        // Invalid credentials, display an error message or redirect to login page
        echo "Invalid username or password. Please try again.";
    }
}
?>
