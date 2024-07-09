<?php
include 'connect.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Unauthorized access";
    exit();
}

$answerId = $_GET['id'] ?? null;
$action = $_GET['action'] ?? null;

if (!$answerId || !in_array($action, ['approve', 'reject'])) {
    echo "Invalid request.";
    exit();
}

$newStatus = ($action == 'approve') ? 'approved' : 'rejected';
$updateQuery = "UPDATE lost_and_found SET status = '$newStatus' WHERE id = $answerId";
$updateResult = mysqli_query($con, $updateQuery);

if ($updateResult) {
    echo "Answer status updated to $newStatus.";
} else {
    echo "Error updating answer status: " . mysqli_error($con);
}
?>