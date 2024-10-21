<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooskBecho</title>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #28a745; /* Green header */
    color: white;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
}

.brand {
    display: flex;
    align-items: center;
}

.logo {
    height: 50px; /* Adjust logo size */
    margin-right: 10px;
}

.nav-links {
    list-style: none;
    display: flex;
    margin: 0;
}

.nav-links li {
    margin-left: 20px;
}

.nav-links a {
    color: white;
    text-decoration: none;
}

.nav-links a:hover {
    text-decoration: underline;
}

main {
    padding: 20px;
}

.book-list {
    display: flex;
    flex-wrap: wrap;
    /* justify-content: space-between; */
}

.book-card {
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    margin: 10px;
    width: 200px;
    text-align: center;
    transition: transform 0.2s;
}

.book-card:hover {
    transform: scale(1.05);
}

.book-card img {
    max-width: 100%;
    height: auto;
    border-radius: 4px;
}

.btn {
    background-color: #28a745; /* Green button */
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
}

.btn:hover {
    background-color: #218838; /* Darker green on hover */
}

.popup {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
        }

        .popup-content {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            width: 800px; /* Fixed width for popup */
            max-width: 90%; /* Responsive width */
            position: relative;
            margin: 50px auto; /* Center the popup */
            display: flex; /* Flex layout for image and details */
        }

        .close {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #333;
        }

        .book-details {
            display: flex;
            margin-left: 20px;
        }

        .book-details img {
            max-width: 100%; /* Fixed size for book image */
            height: auto;
            margin-right: 20px; /* Space between image and details */
        }

        .book-info {
            flex: 1; /* Take remaining space */
        }

        .btn-add-to-cart {
            background-color: #28a745; /* Green button */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-add-to-cart:hover {
            background-color: #218838; /* Darker green on hover */
        }

footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            width: 100%;
            bottom: 0;
        }

        .footer-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap; /* Ensure items wrap on smaller screens */
    max-width: 1200px; /* Max width for the footer content */
    margin: 0 auto; /* Center the footer content */
}

.address, .social-media {
    flex: 1; /* Equal flex growth for all sections */
    padding: 10px; /* Padding for better spacing */
}

.logo-container {
    flex: 0 0 auto; /* Fixed size for logo container */
}

.footer-logo {
    max-width: 300px; /* Responsive logo size */
    height: auto;
}

.social-media a {
    display: block; /* Block for better click area */
    color: white;
    text-decoration: none;
    margin: 5px 0; /* Space between links */
}

.social-media a:hover {
    text-decoration: underline; /* Underline on hover */
}


        .copyright {
            text-align: center;
            padding: 0; /* Remove padding */
            margin: 0;  /* Remove margin */
        }

</style>
</head>
<body>
    <header>
        <nav>
            <div class="brand">
                <img src="uploads\logo\[removal.ai]_2919cdff-3693-4cb8-b073-19c194773e0d-1000172470.png" alt="Brand Logo" class="logo"> <!-- Replace with your logo path -->
            </div>
            <ul class="nav-links">
        <li><a href="<?= site_url(''); ?>">Home</a></li>
        <li><a href="<?= site_url('about'); ?>">About Us</a></li>
        
        <?php if (session()->get('isLoggedIn')): ?>
            <!-- If user is logged in, show the username and logout option -->
            <li><a href="<?= site_url('user/profile'); ?>"><?= session()->get('username'); ?></a></li>
            <li><a href="<?= site_url('user/logout'); ?>">Logout</a></li>
            <li><a href="<?= site_url('cart'); ?>">Cart</a></li>
        <?php else: ?>
            <!-- If user is not logged in, show login and register buttons -->
            <li><a href="<?= site_url('user/login'); ?>">Login</a></li>
            <li><a href="<?= site_url('user/register'); ?>">Register</a></li>
        <?php endif; ?>
    </ul>
        </nav>
    </header>

    <main>
        <div class="book-list">
            <?php foreach ($books as $book): ?>
                <div class="book-card" onclick="openPopup('<?= htmlspecialchars($book['title']); ?>', '<?= htmlspecialchars($book['author']); ?>', '<?= htmlspecialchars($book['description']); ?>', '<?= htmlspecialchars($book['genre']); ?>', <?= $book['price']; ?>, '<?= base_url('uploads/' . $book['image']); ?>')">
                    <img src="<?= base_url('uploads/' . $book['image']); ?>" alt="Book Cover">
                    <h3><?= $book['title']; ?></h3>
                    <p>Author: <?= $book['author']; ?></p>
                    <p>Price: ₹<?= $book['price']; ?></p>
                    <a href="<?= site_url('cart/addToCart/' . $book['id']); ?>" class="btn">Add to Cart</a>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <div class="book-details">
                    <img id="popupImage" src="" alt="Book Cover">
                    <div class="book-info">
                        <h3 id="popupTitle"></h3>
                        <p><strong>Author:</strong> <span id="popupAuthor"></span></p>
                        <p><strong>Description:</strong> <span id="popupDescription"></span></p>
                        <p><strong>Genre:</strong> <span id="popupGenre"></span></p>
                        <p><strong>Price:</strong> ₹<span id="popupPrice"></span></p>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer>
    <div class="footer-content">
        <div class="address">
            <h3>Contact Us</h3>
            <p>Raniganj, School Para, West Bengal, 713347</p>
        </div>
        <div class="logo-container">
            <img src="uploads/logo/[removal.ai]_2919cdff-3693-4cb8-b073-19c194773e0d-1000172470.png" alt="Brand Logo" class="footer-logo">
        </div>
        <div class="social-media">
            <h3>Follow Us</h3>
            <a href="https://youtube.com" target="_blank">YouTube</a>
            <a href="https://instagram.com" target="_blank">Instagram</a>
            <a href="https://linkedin.com" target="_blank">LinkedIn</a>
        </div>
    </div>
        <div class="copyright">
        <p>&copy; 2024 BooksBecho. All rights reserved.</p>
    </div>
    </footer>

    <script>
        function openPopup(title, author, description, genre, price, image) {
            document.getElementById('popupTitle').innerText = title;
            document.getElementById('popupAuthor').innerText = author;
            document.getElementById('popupDescription').innerText = description;
            document.getElementById('popupGenre').innerText = genre;
            document.getElementById('popupPrice').innerText = price.toFixed(2);
            document.getElementById('popupImage').src = image;
            document.getElementById('popup').style.display = 'flex'; // Show popup
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none'; // Hide popup
        }

        // To close the popup when clicking outside of it
        window.onclick = function(event) {
            const popup = document.getElementById('popup');
            if (event.target === popup) {
                closePopup();
            }
        };

        function addToCart() {
            // Implement the add to cart functionality
            alert('Book added to cart!');
        }
    </script>
</body>
</html>
