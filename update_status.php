<?php
include 'connect.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or display an error message
    header("Location: signin.php");
    exit();
}

// Get the answer ID and action (approve or reject) from the URL
$answerId = $_GET['id'] ?? null;
$action = $_GET['action'] ?? null;

// Validate the input
if (!$answerId || !in_array($action, ['approve', 'reject'])) {
    // Handle invalid input
    echo "Invalid request.";
    exit();
}

// Fetch the answer details from the database
$answerQuery = "SELECT id, user_id, status FROM lost_and_found WHERE id = $answerId AND item_type = 'found'";
$answerResult = mysqli_query($con, $answerQuery);
$answer = mysqli_fetch_assoc($answerResult);


// Update the answer status
$newStatus = ($action == 'approve') ? 'approved' : 'rejected';
$updateQuery = "UPDATE lost_and_found SET status = '$newStatus' WHERE id = $answerId";
$updateResult = mysqli_query($con, $updateQuery);

if ($updateResult) {
    // Answer status updated successfully
    echo "Answer status updated to $newStatus.";
} else {
    // Handle database error
    echo "Error updating answer status: " . mysqli_error($con);
}

// Redirect back to mylistings.php after a short delay
header("Refresh: 3; URL=mylistings.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Answer Status</title>
    <!-- Include any necessary CSS or JS files -->
</head>
<body>
    <!-- You can display a message or any additional content here -->
</body>
</html>