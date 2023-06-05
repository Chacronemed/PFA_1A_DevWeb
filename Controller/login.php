<?php
session_start();

require_once '../Model/EmployeeModel.php';
require_once './AuthControlle.php';

// Create instances of the model and controller
$model = new EmployeeModel();
$authController = new AuthController($model);

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the appropriate page based on user type
    if ($_SESSION['user_type'] === 'AD') {
        header('Location: ../Views/Dash/dash4.php');
    } else {
        header('Location: user_dashboard.php');
    }
    exit();
}

// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($authController->login($email, $password)) {
        // Redirect to the appropriate page based on user type
        if ($_SESSION['user_type'] === 'AD') {
            header('Location: admin_dashboard.php');
        } else {
            header('Location: user_dashboard.php');
        }
        exit();
    } else {
        echo 'Invalid email or password.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
