<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - BooksBecho</title>
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
            background-color: white;
            max-width: 800px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #28a745; /* Green for section headings */
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
        <h2>About Us</h2>
        <p>At BooksBecho, we are passionate about connecting book lovers with the latest titles and helping old book sellers find new buyers. Our mission is to provide a platform where new and used books coexist, allowing readers to access a diverse range of literature at minimal prices.</p>
        <p>Located in School Para, Raniganj, West Bengal, we aim to foster a community of book enthusiasts, encouraging the sharing and trading of books. Whether you're looking to buy the latest bestseller or sell your collection of beloved novels, BooksBecho is here to help!</p>
        
        <h2>Our Services</h2>
        <ul>
            <li>New Book Sales: Explore a wide selection of the latest releases.</li>
            <li>Used Book Marketplace: Connect with sellers to find second-hand books at great prices.</li>
            <li>Book Exchange: Trade your old books with others in the community.</li>
        </ul>

        <h2>Terms and Conditions</h2>
        <h3>For Buyers</h3>
        <p>1. All sales are final. Please review the book condition before purchasing.</p>
        <p>2. Prices are subject to change based on market demand and availability.</p>
        <p>3. We are not responsible for lost or damaged items during shipping.</p>

        <h3>For Sellers</h3>
        <p>1. Sellers must provide accurate descriptions of their books.</p>
        <p>2. Books must be in sellable condition. We reserve the right to reject items that do not meet our quality standards.</p>
        <p>3. Sellers are responsible for setting fair prices based on the book’s condition and market value.</p>
    </main>

    <footer>
    <div class="footer-content">
        <div class="address">
            <h3>Contact Us</h3>
            <p>Raniganj, School Para, West Bengal, 713347</p>
        </div>
        <div class="logo-container">
            <img src="uploads\logo\[removal.ai]_2919cdff-3693-4cb8-b073-19c194773e0d-1000172470.png" alt="Brand Logo" class="footer-logo">
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
</body>
</html>
