<?php

$conn = mysqli_connect('localhost', 'root', '', 'bookhub');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

    $sql = "INSERT INTO message (name, email, feedback) VALUES ('$name', '$subject', '$message')";
    if (mysqli_query($conn, $sql)) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);

?>