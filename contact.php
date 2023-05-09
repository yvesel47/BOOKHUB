<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php include('navbar.php'); ?>

<form action="" method="post">
<input type="text" name="name" id="name" placeholder="Enter your name"><br>
<input type="text"  name="subject" id="subject" placeholder="Subject" ><br>
<textarea name="message" id="message" ></textarea><br>
<button type="submit">Send message</button>
</form>
<?php include('footer.php');?>
</body>
</html>


<?php
// Database connection settings
$host = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Establish a database connection
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

    // Insert form data into database
    $sql = "INSERT INTO messages (name, subject, message) VALUES ('$name', '$subject', '$message')";
    if (mysqli_query($conn, $sql)) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);

?>













