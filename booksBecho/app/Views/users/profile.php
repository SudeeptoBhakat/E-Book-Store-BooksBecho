<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksBecho - User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
            height: 50px;
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
            flex: 1;
        }

        .profile-info {
            text-align: center;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #218838;
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
        /* border-radius: 10px; */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Subtle shadow */
        width: 350px;
        max-width: 90%; /* Responsive width */
        position: relative;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 24px;
        cursor: pointer;
        color: #333;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-size: 14px;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    .form-actions {
        text-align: center;
        margin-top: 20px;
    }

    .btn {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }   

    .btn:hover {
        background-color: #218838;
    }

    .popup-content input:focus {
        outline: none;
        border-color: #28a745; /* Highlight on focus */
    }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover, .close:focus {
            color: dark;
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
                    <li><a href="<?= site_url('user/profile'); ?>"><?= session()->get('username'); ?></a></li>
                    <li><a href="<?= site_url('user/logout'); ?>">Logout</a></li>
                    <li><a href="<?= site_url('cart'); ?>">Cart</a></li>
                <?php else: ?>
                    <li><a href="<?= site_url('user/login'); ?>">Login</a></li>
                    <li><a href="<?= site_url('user/register'); ?>">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <h2 style="text-align: center;">User Profile</h2>
        <div class="profile-info">
            <p><strong>Name:</strong> <?= $user['username']; ?></p>
            <p><strong>Email:</strong> <?= $user['email']; ?></p>
            <button onclick="togglePopup()">Update</button>
        </div>

<div id="popupForm" class="popup">
    <div class="popup-content">
        <span class="close" onclick="togglePopup()">&times;</span>
        <h2>Update Profile</h2>
        <form action="<?= site_url('user/profile'); ?>" method="post">
            <label>Name:</label>
            <input type="text" name="username" value="<?= $user['username']; ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?= $user['email']; ?>" required>

            <label>Password:</label>
            <input type="password" name="password" placeholder="Leave blank to keep current password">

            <button type="submit">Update</button>
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
        <div class="copyright">
            <p>&copy; 2024 BooksBecho. All rights reserved.</p>
        </div>
    </footer>

    <script>
function togglePopup() {
    const popup = document.getElementById('popupForm');
    // Toggle display only on button click
    if (popup.style.display === 'flex') {
        popup.style.display = 'none'; // Hide popup
    } else {
        popup.style.display = 'flex'; // Show popup
    }
}

// To close the popup when clicking outside of it
window.onclick = function(event) {
    const popup = document.getElementById('popupForm');
    if (event.target === popup) {
        popup.style.display = 'none'; // Hide popup if clicking outside
    }
};

    </script>
</body>
</html>
