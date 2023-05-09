<?php
session_start();
if(isset($_POST['login'])){
    $email= trim($_POST['email']);
 
    $password = $_POST['password'];

    // Connect to MySQL database
    $conn = mysqli_connect('localhost', 'root', '', 'bookhub');

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    

    // Query the database for the user
    $query = "SELECT * FROM users WHERE email ='$email'";
    $result = mysqli_query($conn, $query);
    // echo $email;
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        echo $row['phone'];
        if($password = $row['password']) {
            // Login successful, set session variables
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_phone'] = $row['phone'];
            header('Location: dashboard.php');
            // exit();
        } else {
            // Password incorrect
            $error = "Invalid username or password";
        }
    } else {
        // Username not found
        $error = "Invalid username or password";
    }
}
?>