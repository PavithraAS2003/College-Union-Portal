<?php
include 'connect.php';
session_start();

// Get the current user's ID
$userId = $_SESSION['user_id'];

// Get the item ID from the URL
$itemId = $_GET['id'] ?? null;

// Fetch the item details from the database
$itemQuery = "SELECT id, item_name, description, question, image_url FROM lost_and_found WHERE id = $itemId AND user_id = $userId AND item_type = 'lost'";
$itemResult = mysqli_query($con, $itemQuery);
$item = mysqli_fetch_assoc($itemResult);

// Check if the item exists
if (!$item) {
    // Handle invalid item ID or unauthorized access
    echo "Invalid item or unauthorized access.";
    exit();
}
?>

<!DOCTYPE html>
<!-- ... (HTML structure and styles) ... -->

<div class="row">
    <div class="col-md-6">
        <?php if (!empty($item['image_url'])): ?>
            <img src="<?php echo $item['image_url']; ?>" class="img-fluid" alt="Item Image">
        <?php endif; ?>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $item['item_name']; ?></h5>
                <p class="card-text">Description: <?php echo $item['description']; ?></p>
                <p class="card-text">Question: <?php echo $item['question']; ?></p>
                <!-- Add any other relevant details here -->
            </div>
        </div>
    </div>
</div>

<!-- ... (HTML footer and scripts) ... -->