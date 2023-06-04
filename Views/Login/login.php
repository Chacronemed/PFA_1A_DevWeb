<?php
// ...
require_once 'connection.php';


if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM employes WHERE Email = '$user' AND password = '$pass' AND type_user = 'US'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User with type_user = 'US' found
        // Redirect to demande.php
        header("Location: demande.php");
        exit();
    } else {
        $sql = "SELECT * FROM employes WHERE Email = '$user' AND password = '$pass' AND type_user = 'AD'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // User with type_user = 'AD' found
            // Redirect to SideBar.php
            header("Location: http://localhost/1A_PFA/Views/Dash/Dash4.php");
            exit();
        } else {
            // Invalid username or password
            echo "Invalid username or password";
        }
    }
}

$conn->close();
