<?php
require 'db.php';

function getBooks($searchTerm = '') {
    global $pdo;
    $query = "SELECT * FROM books";
    $params = [];
    if ($searchTerm) {
        $query .= " WHERE title LIKE :term OR author LIKE :term";
        $params[':term'] = "%$searchTerm%";
    }
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBookById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function createBook($title, $author, $available, $pages, $isbn) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO books (title, author, available, pages, isbn) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$title, $author, $available, $pages, $isbn]);
}

function updateBook($id, $title, $author, $available, $pages, $isbn) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE books SET title = ?, author = ?, available = ?, pages = ?, isbn = ? WHERE id = ?");
    return $stmt->execute([$title, $author, $available, $pages, $isbn, $id]);
}

// Delete a book
function deleteBook($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
    return $stmt->execute([$id]);
}
?>
