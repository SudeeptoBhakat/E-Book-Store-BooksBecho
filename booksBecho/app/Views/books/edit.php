<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksBecho - Admin Panel</title>
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
    justify-content: space-between; /* Distributes space between items */
    align-items: center; /* Vertically centers items */
}

.header-left {
    flex: 1; /* Allows the left section to take available space */
}

.header-right {
    display: flex; /* Align items in the right section horizontally */
    align-items: center; /* Vertically center the items */
    margin-left: auto; /* Pushes the right section to the end */
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

h1 {
    margin: 0;
}

.book-form {
    background: #2a2a2a; /* Darker background for the form */
    border: 1px solid #444;
    border-radius: 8px;
    padding: 20px;
    margin-top: 20px;
}

label {
    display: block;
    margin: 10px 0 5px;
}

input[type="text"],
input[type="file"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #444;
    border-radius: 4px;
    background-color: #333; /* Darker input background */
    color: #f4f4f4;
}

input[type="file"] {
    padding: 5px; /* Reduce padding for file input */
}

button {
    background-color: #28a745; /* Green button */
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button:hover {
    background-color: #218838; /* Darker green on hover */
}

footer {
    text-align: center;
    padding: 20px 0;
    border-top: 2px solid #444; /* Divider */
    margin-top: 20px;
}

.back-btn {
    background-color: #007BFF; /* Blue background for back button */
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 4px;
}

.back-btn:hover {
    background-color: #0056b3; /* Darker blue on hover */
}
        .header-right {
    display: flex;
    align-items: center;
    margin-left: auto;
}

.btn-delete {
    background-color: #dc3545; /* Red background for delete button */
    margin-left: 10px; /* Space between buttons */
}

.btn-delete:hover {
    background-color: #c82333; /* Darker red on hover */
}

.book-cover {
    margin-top: 10px;
    border-radius: 4px;
}
footer {
    background-color: #1e1e1e; /* Match your dark theme */
    color: #f4f4f4; /* Light text color */
    text-align: center; /* Center the text */
    padding: 10px 0; /* Padding for the footer */
}

    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="header-left">
                <h1>Edit Book</h1>
            </div>
            <div class="header-right">
                <a href="<?= site_url('/admin'); ?>" class="btn back-btn">Back</a>
                <a href="<?= site_url('books/delete/' . $book['id']); ?>" class="btn btn-delete">Delete</a>
            </div>
        </header>

        <form method="post" action="<?= site_url('books/update/' . $book['id']); ?>" enctype="multipart/form-data" class="book-form">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?= esc($book['title']); ?>" required>

            <label for="author">Author</label>
            <input type="text" name="author" id="author" value="<?= esc($book['author']); ?>" required>

            <label for="genre">Genre</label>
            <input type="text" name="genre" id="genre" value="<?= esc($book['genre']); ?>" required>

            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="<?= esc($book['price']); ?>" required>

            <label for="description">Description</label>
            <textarea name="description" id="description" required><?= esc($book['description']); ?></textarea>

            <!-- Display the current image if available -->
            <?php if ($book['image']): ?>
                <img src="<?= base_url('uploads/' . $book['image']); ?>" alt="Book Cover" width="100" class="book-cover">
            <?php endif; ?>

            <label for="book_image">Book Cover Image (optional)</label>
            <input type="file" name="book_image" id="book_image">

            <button type="submit" class="btn">Update Book</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 BooksBecho. All rights reserved.</p>
    </footer>
</body>
</html>
