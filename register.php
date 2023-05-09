<?php

if (isset($_POST['submit'])) {

  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $user_level = 'user'; 
  $user_status = 'active'; 

  $conn = mysqli_connect('localhost', 'root', '', 'bookhub');

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $email = mysqli_real_escape_string($conn, $email);
  $phone = mysqli_real_escape_string($conn, $phone);

  $query = "SELECT * FROM users WHERE email='$email' OR phone='$phone'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Error: Email or phone number already exists use different'); window.location.href='register.php';</script>";

    mysqli_close($conn);
    exit();
  }

  $password = mysqli_real_escape_string($conn, $password);
  $user_level = mysqli_real_escape_string($conn, $user_level);
  $user_status = mysqli_real_escape_string($conn, $user_status);  

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (email, password, phone, user_level, user_status) VALUES ('$email', '$hashed_password', '$phone', '$user_level', '$user_status')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script>alert('Registration successful');</script>";

  } else {
    echo "Error: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}

?>
<?php include ('navbar.php');?>
<div class="register-form">
<form method="post" action="">
  <label for="email">Email:</label>
  <input type="email" name="email" id="email">
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password" id="password">
  <br>
  <label for="phone">Phone:</label>
  <input type="text" name="phone" id="phone">
  <br>
  <input type="submit" name="submit" value="Register">
</form>
</div>
<?php include ('footer.php');?>