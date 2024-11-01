<?php
require 'functions.php';

if (isset($_GET['id'])) {
    $book = getBookById($_GET['id']);
    if (!$book) {
        die("Book not found!");
    }
} else {
    die("Invalid request!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $available = $_POST['available'];
    $pages = $_POST['pages'];
    $isbn = $_POST['isbn'];

    updateBook($id, $title, $author, $available, $pages, $isbn);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Book</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f7f7f9; 
            color: #333; 
            line-height: 1.6;
        }
        
        .container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        h2 {
            text-align: center;
            color: #27ae60; /* Green */
            margin-bottom: 20px;
            font-size: 2em;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="number"], select {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            background-color: #27ae60; /* Green */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        button:hover {
            background-color: #229954; /* Darker green */
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #27ae60; /* Green */
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Book</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($book['id']) ?>">

            <label>Title:</label>
            <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>

            <label>Author:</label>
            <input type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>" required>

            <label>Available:</label>
            <select name="available" required>
                <option value="Yes" <?= $book['available'] === 'Yes' ? 'selected' : '' ?>>Yes</option>
                <option value="No" <?= $book['available'] === 'No' ? 'selected' : '' ?>>No</option>
            </select>

            <label>Pages:</label>
            <input type="number" name="pages" value="<?= htmlspecialchars($book['pages']) ?>" required>

            <label>ISBN:</label>
            <input type="text" name="isbn" value="<?= htmlspecialchars($book['isbn']) ?>" required>

            <button type="submit">Update Book</button>
        </form>
        <a href="index.php" class="back-link">Back to Book List</a>
    </div>
</body>
</html>
