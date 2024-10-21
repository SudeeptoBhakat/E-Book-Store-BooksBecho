<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksBecho - Register Page</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

h2 {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    text-align: left;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

button {
    background-color: #28a745; /* Green background */
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button:hover {
    background-color: #218838; /* Darker green on hover */
}

.login {
    margin-top: 15px;
}

.login a {
    color: #28a745; /* Green text for the link */
    text-decoration: none;
}

.login a:hover {
    text-decoration: underline;
    color: #218838; /* Darker green on hover */
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="<?= site_url('user/create'); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="name">Role:</label>
            <input type="text" id="role" name="name" placeholder="Optional">
            
            <button type="submit">Register</button>
        </form>
        <p class="login">Already have an account? <a href="<?= site_url('user/login'); ?>">Click here to login</a></p>
    </div>
</body>
</html>
