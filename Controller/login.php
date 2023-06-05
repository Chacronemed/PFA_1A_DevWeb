<?php
session_start();

require_once '../Model/EmployeeModel.php';
require_once './AuthControlle.php';

// Create instances of the model and controller
$model = new EmployeeModel();
$authController = new AuthController($model);

// // Check if the user is already logged in
// if (isset($_SESSION['user_id'])) {
//     // Redirect to the appropriate page based on user type
//     if ($_SESSION['user_type'] === 'AD') {
//         header('Location: ../Views/Dash/dash4.php');
//     } else {
//         header('Location: user_dashboard.php?al');
//     }
//     exit();
// }

// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['user'];
    $password = $_POST['pass'];

    if ($authController->login($email, $password)) {
        // Redirect to the appropriate page based on user type
        if ($_SESSION['user_type'] === 'AD') {
            header('Location: ../Views/Dash/dash4.php');
        } else {
            header('Location: ./ControllerEmploye.php?action=EmployeProduit');
        }
        exit();
    } else {
        echo 'Invalid email or password.';
        echo $email;
        echo $password;
    }
}
?>

