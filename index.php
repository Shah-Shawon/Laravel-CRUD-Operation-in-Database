<?php
require 'functions.php';

$searchTerm = $_GET['search'] ?? '';
$books = getBooks($searchTerm);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Book Management</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f9;
            color: #333;
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        .header h1 {
            text-align: center;
            color: #27ae60;
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        .search-box {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-box input[type="text"] {
            padding: 10px;
            flex: 1;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        .button {
            background-color: #27ae60;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .button:hover {
            background-color: #229954;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #27ae60;
            color: white;
            font-weight: bold;
            font-size: 1.1em;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a.action-link {
            color: #27ae60;
            text-decoration: none;
            font-weight: bold;
        }

        a.action-link:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }

        .back-link {
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Library Book Management</h1>
    </div>
    <div class="search-box">
        <form method="GET" style="flex: 1; display: flex; gap: 10px;">
            <input type="text" name="search" placeholder="Search by title or author" value="<?= htmlspecialchars($searchTerm) ?>">
            <button type="submit" class="button">Search</button>
        </form>
        <a href="create_book.php" class="button">Add New Book</a>
    </div>
    <?php if ($searchTerm): ?>
        <div class="back-link">
            <a href="index.php" class="button">Back to Book List</a>
        </div>
    <?php endif; ?>
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Available</th>
            <th>Pages</th>
            <th>ISBN</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($books)): ?>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= htmlspecialchars($book['author']) ?></td>
                <td><?= htmlspecialchars($book['available']) ?></td>
                <td><?= htmlspecialchars($book['pages']) ?></td>
                <td><?= htmlspecialchars($book['isbn']) ?></td>
                <td>
    <a href="update_book.php?id=<?= $book['id'] ?>" class="action-link">Update</a> |
    <a href="delete_book.php?id=<?= $book['id'] ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
</td>

            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No books found.</td>
            </tr>
        <?php endif; ?>
    </table>
    <div class="footer">
        &copy; <?= date('Y'); ?> Library Book Management System
    </div>
</div>
</body>
</html>
