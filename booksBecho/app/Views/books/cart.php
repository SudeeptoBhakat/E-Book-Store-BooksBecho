<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksBecho - Cart</title>
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

        .cart-items {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: space-between; */
            margin: 20px;
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
            background-color: #dc3545; /* Red background for remove button */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #c82333; /* Darker red on hover */
        }

        .total-price {
    font-size: 1.5em; /* Larger font for emphasis */
    font-weight: bold; /* Bold text */
    color: #333; /* Dark gray color for better readability */
    margin-top: 20px; /* Space above */
    padding: 10px; /* Padding for better spacing */
    background-color: #f8f9fa; /* Light background for contrast */
    border-radius: 8px; /* Rounded corners */
    display: flex; /* Flexbox for alignment */
    justify-content: space-between; /* Space between total label and amount */
}

.place-order {
    background-color: #28a745; /* Green background */
    color: white; /* White text */
    padding: 15px 20px; /* Padding for button */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 1em; /* Font size */
    margin-top: 20px; /* Space above the button */
    transition: background-color 0.3s ease; /* Smooth background color transition */
}

.place-order:hover {
    background-color: #218838; /* Darker green on hover */
}

        .place-order {
            display: block;
            margin: 20px auto;
            padding: 15px 25px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
        }

.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
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
        .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.5); /* Black w/ opacity */
}

.modal-content {
    background-color: white;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    border-radius: 8px;
    width: 300px; /* Could be more or less, depending on screen size */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

h2 {
    margin-bottom: 20px;
    color: #28a745; /* Green color */
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box; /* Include padding and border in element's total width and height */
}

button {
    background-color: #28a745; /* Green color */
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 50%;
    font-size: 16px;
}

button:hover {
    background-color: #218838; /* Darker green */
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
    <?php if (!empty($books)): ?>
        <div class="cart-items">
        <?php foreach ($books as $book): ?>
            <div class="book-card" data-price="<?= $book['price']; ?>">
            <img src="<?= base_url('uploads/' . $book['image']); ?>" alt="Book Cover">
            <h3><?= $book['title']; ?></h3>
            <p>Author: <?= $book['author']; ?></p>
            <p>Price: ₹<?= $book['price']; ?></p>
            <a href="<?= site_url('cart/removeFromCart/' . $book['id']); ?>" class="btn btn-danger">Remove</a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
        <div class="total-price">
    Total: ₹<span id="totalAmount">0</span>
</div>

<button class="place-order" onclick="openModal()">Place Order</button>

<!-- Address Modal -->
<div id="addressModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Enter Address Details</h2>
        <form id="addressForm" method="POST" action="<?= site_url('/cart/submitOrder'); ?>">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
            <label for="zipcode">Zip Code:</label>
            <input type="text" id="zipcode" name="zipcode" required>
            <button type="submit">Proceed To Pay</button>
        </form>
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
        <p>&copy; 2024 BooksBecho. All rights reserved.</p>
    </footer>

    <script>
        function openModal() {
    document.getElementById("addressModal").style.display = "block";
}

function closeModal() {
    document.getElementById("addressModal").style.display = "none";
}

// Close modal when clicking outside of it
window.onclick = function(event) {
    if (event.target == document.getElementById("addressModal")) {
        closeModal();
    }
}
        function calculateTotal() {
            let totalAmount = 0;
            const bookCards = document.querySelectorAll('.book-card');
            
            bookCards.forEach(card => {
                const price = parseInt(card.getAttribute('data-price'));
                totalAmount += price;
            });

            document.getElementById('totalAmount').innerText = totalAmount;
        }

        function removeFromCart(button) {
            const bookCard = button.closest('.book-card');
            bookCard.remove();  // Remove the book card from the DOM
            calculateTotal();   // Recalculate the total after removing the item
        }

        // Calculate total on page load
        window.onload = calculateTotal;
    </script>
</body>
</html>
