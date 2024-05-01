<?php
include 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemId = $_POST['itemId'];
    $answer = $_POST['answer'];
    $userId = $_SESSION['user_id']; // Replace with the logic to get the current user's ID

    // Fetch the lost item details from the database
    $lostItemQuery = "SELECT item_name, description, question, user_id AS poster_id FROM lost_and_found WHERE id = $itemId AND item_type = 'lost'";
    $lostItemResult = mysqli_query($con, $lostItemQuery);
    $lostItem = mysqli_fetch_assoc($lostItemResult);

    if ($lostItem) {
        // Insert the found item record
        $insertQuery = "INSERT INTO lost_and_found (item_name, description, item_type, question, answer, user_id, status, claimed_by) VALUES (?, ?, 'found', ?, ?, ?, 'pending', ?)";
        $stmt = mysqli_prepare($con, $insertQuery);
        mysqli_stmt_bind_param($stmt, 'ssssii', $lostItem['item_name'], $lostItem['description'], $lostItem['question'], $answer, $userId, $lostItem['poster_id']);

        if (mysqli_stmt_execute($stmt)) {
            echo "Item claimed successfully. Your answer is pending review.";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Invalid item ID.";
    }
}

// Redirect back to feed.php after a short delay
header("Refresh: 3; URL=lostandfound.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim Item</title>
    <!-- Include any necessary CSS or JS files -->
</head>
<body>
    <!-- You can display a message or any additional content here -->
</body>
</html>