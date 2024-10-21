<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksBecho - Login Page</title>
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

.register {
    margin-top: 15px;
}

.register a {
    color: #28a745; /* Green text for the link */
    text-decoration: none;
}

.register a:hover {
    text-decoration: underline;
    color: #218838; /* Darker green on hover */
}


    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="<?= site_url('user/authenticate'); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <p class="register">New user? <a href="<?= site_url('/user/register'); ?>">Click here to register</a></p>
    </div>
</body>
</html>
