<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="register_process.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <label for="isAdmin">Admin:</label>
        <input type="checkbox" id="isAdmin" name="isAdmin" value="1"><br>
        <button type="submit">Register</button>
    </form>
    <p><a href="user_login.php">Login as User</a></p>
    <p><a href="Admin_login.php">Login as Admin</a></p>
</body>
</html>
