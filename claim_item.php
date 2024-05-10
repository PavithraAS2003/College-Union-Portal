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
            // Item claimed successfully
            echo json_encode(array("success" => true));
        } else {
            // Error occurred
            echo json_encode(array("success" => false, "message" => "Error: " . mysqli_stmt_error($stmt)));
        }

        mysqli_stmt_close($stmt);
    } else {
        // Invalid item ID
        echo json_encode(array("success" => false, "message" => "Invalid item ID."));
    }
} else {
    // Redirect back to feed.php after a short delay
    header("Refresh: 3; URL=lostandfound.php");
}
?>
