<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createBook($_POST['title'], $_POST['author'], $_POST['available'], $_POST['pages'], $_POST['isbn']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Book</title>
    <style>
        /* General Reset */
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
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        .header h1 {
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
            margin-bottom: 15px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            width: 100%;
        }

        button {
            background-color: #27ae60; /* Green */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
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
        <div class="header">
            <h1>Add a New Book</h1>
        </div>
        <form method="POST">
            <label>
                Title:
                <input type="text" name="title" required>
            </label>
            <label>
                Author:
                <input type="text" name="author" required>
            </label>
            <label>
                Available:
                <select name="available">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </label>
            <label>
                Pages:
                <input type="number" name="pages" required>
            </label>
            <label>
                ISBN:
                <input type="text" name="isbn" required>
            </label>
            <button type="submit">Submit</button>
        </form>
        <a href="index.php" class="back-link">Back to Book List</a>
    </div>
</body>
</html>
