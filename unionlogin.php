<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php'; // Assuming this file contains the database connection details
    
    // Fetch form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement with prepared statements for security
    $stmt = $con->prepare("SELECT * FROM `union` WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, set session variable and redirect to union.php
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id']; // Assuming 'id' is the user's unique identifier in the database
        header("Location: union.php");
        exit();
    } else {
        // User not found or password incorrect, show an alert
        echo "<script>alert('Incorrect username or password');</script>";
    }

    // Close the connection
    $stmt->close();
    mysqli_close($con);
}
?>