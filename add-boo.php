<?php
$conn = mysqli_connect('localhost', 'root', '', 'bookhub');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$target_dir = "img/books/"; // the directory where the files will be uploaded
$allowed_types = array("jpg", "jpeg", "png", "pdf"); // allowed file types

// Check if form was submitted
if(isset($_POST['addbook'])) {

  // Get form data
  $name = $_POST["bookname"];
  $wname = $_POST["wname"];
  $pdf_name = basename($_FILES["pdf"]["name"]);
  $cover_name = basename($_FILES["cover"]["name"]);
  $pdf_type = pathinfo($pdf_name, PATHINFO_EXTENSION);
  $cover_type = pathinfo($cover_name, PATHINFO_EXTENSION);

  // Check if file types are allowed
  if(!in_array($pdf_type, $allowed_types) || !in_array($cover_type, $allowed_types)) {
    echo "Error: Only JPG, JPEG, PNG, and PDF files are allowed";
  } else {

    // Generate unique file names to avoid overwriting
    $pdf_name = uniqid() . "." . $pdf_type;
    $cover_name = uniqid() . "." . $cover_type;

    // Set file paths
    $pdf_path = $target_dir . $pdf_name;
    $cover_path = $target_dir . $cover_name;

    // Upload files
    if(move_uploaded_file($_FILES["pdf"]["tmp_name"], $pdf_path) && move_uploaded_file($_FILES["cover"]["tmp_name"], $cover_path)) {

      // Insert book data into database
      $sql = "INSERT INTO `books`(`id`, `name`, `wname`, `pdf`, `cover`) VALUES ('','$name','$wname','$pdf_name','$cover_name')";
      if(mysqli_query($conn, $sql)) {
        echo "Book added successfully";
        header('add.book.php');
      } else {
        echo "Error adding book: " . mysqli_error($conn);
      }
    } else {
      echo "Error uploading files";
    }
  }
}

mysqli_close($conn);
?>