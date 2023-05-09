<?php
session_start();

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
  
    $conn = mysqli_connect('localhost', 'root', '', 'bookhub');
  
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
  
    $email = mysqli_real_escape_string($conn, $email);
  
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

      $row = mysqli_fetch_assoc($result);
      $hashed_password = $row['password'];

      if (password_verify($password, $hashed_password)) {
        $user_level = $row['user_level'];

        $_SESSION['user_level'] = $user_level;

        if ($user_level == 'admin') {
          header('Location: admin.php');
          exit();
        } else if ($user_level == 'user') {
          header('Location: user.php');
          exit();
        } else {
          header('Location: index.php');
          exit();
        }
      } else {
        echo "Invalid password.";
      }
    } else {
      echo "Invalid username.";
    }
    mysqli_close($conn);
}
?>