<?php
require 'functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Attempt to delete the book
    if (deleteBook($id)) {
        // Show success message and link back to index.php
        $message = "Book successfully deleted.";
    } else {
        $message = "Error: Could not delete the book.";
    }
} else {
    $message = "Invalid request. No book ID provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Book</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f7f7f9; color: #333; text-align: center; padding: 50px; }
        .container { background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: inline-block; }
        .message { font-size: 1.2em; margin-bottom: 20px; color: #27ae60; }
        .error { color: #e74c3c; }
        .button { background-color: #27ae60; color: #fff; padding: 10px 15px; border: none; border-radius: 5px; font-size: 1em; cursor: pointer; text-decoration: none; }
        .button:hover { background-color: #229954; }
    </style>
</head>
<body>
    <div class="container">
        <p class="message <?= isset($message) && strpos($message, 'Error') === 0 ? 'error' : '' ?>">
            <?= htmlspecialchars($message) ?>
        </p>
        <a href="index.php" class="button">Back to Book List</a>
    </div>
</body>
</html>

