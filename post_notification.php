<?php
session_start();

include 'connect.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["heading"]) && isset($_POST["text"])) {
        $heading = $_POST["heading"];
        $text = $_POST["text"];

        // Insert notification into the database
        $query = "INSERT INTO notifications (heading, text) VALUES ('$heading', '$text')";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Redirect back to notificationsunion.php after successful submission
            header("Location: notificationsunion.php");
            exit;
        } else {
            // Handle error
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>
