<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksBecho - Admin</title>
  <style>
    body {
    background-color: #1e1e1e; /* Dark background */
    color: #f4f4f4; /* Light text */
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: auto;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #444; /* Divider */
    padding-bottom: 20px;
}

h1 {
    margin: 0;
}

.btn {
    background-color: #28a745; /* Green button */
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 4px;
}

.btn:hover {
    background-color: #218838; /* Darker green on hover */
}

.book-list {
    list-style: none;
    padding: 0;
}

.book-item {
    background: #2a2a2a; /* Darker background for book items */
    border: 1px solid #444;
    border-radius: 8px;
    padding: 15px;
    margin: 10px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.book-item strong {
    margin-right: 10px;
}

.book-cover {
    width: 50px;
    height: auto;
    border-radius: 4px;
    margin-left: 10px;
}

.btn-edit, .btn-delete {
    margin-left: 10px;
    background-color: #007BFF; /* Blue for edit */
}

.btn-edit:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

.btn-delete {
    background-color: #dc3545; /* Red for delete */
}

.btn-delete:hover {
    background-color: #c82333; /* Darker red on hover */
}

footer {
    text-align: center;
    padding: 20px 0;
    border-top: 2px solid #444; /* Divider */
    margin-top: 20px;
}

.logo-container {
    flex: 0 0 auto; /* Fixed size for logo container */
}

.header-logo {
    max-width: 300px; /* Responsive logo size */
    height: auto;
}
  </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo-container">
            <img src="uploads/logo/[removal.ai]_2919cdff-3693-4cb8-b073-19c194773e0d-1000172470.png" alt="Brand Logo" class="header-logo">
        </div>
            <a href="<?= site_url('admin/create'); ?>" class="btn">Add New Book</a>
        </header>

        <ul class="book-list">
            <?php foreach ($books as $book): ?>
                <li class="book-item">
                    <strong><?= $book['title']; ?></strong> by <?= $book['author']; ?> - ₹<?= $book['price']; ?>
                    <img src="<?= base_url('uploads/' . $book['image']); ?>" alt="Book Cover" class="book-cover">
                    <a href="<?= site_url('admin/edit/' . $book['id']); ?>" class="btn btn-edit">Edit</a>
                    <a href="<?= site_url('books/delete/' . $book['id']); ?>" class="btn btn-delete">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <footer>
        <p>&copy; 2024 BooksBecho. All rights reserved.</p>
    </footer>
</body>
</html>
