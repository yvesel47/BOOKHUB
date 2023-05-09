<?php
session_start();
error_reporting(E_ALL);

$msg = '';

$conn = mysqli_connect('localhost', 'root', '', 'bookhub');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        iframe{
            width:100%;
            height: 650px;
        }
    </style>
</head>
<body>
<div class="container mt-5 my-section">
      <h3 class="py-4">Popular books</h3>
      <div class="msg"><?php echo $msg; ?></div>
      <div class="row">

        <?php

        $sql = "SELECT * from books ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card h-100">
              <iframe src="./img/books/<?php echo $row['book']; ?>" alt="<?php echo $row['book']; ?>" title="<?php echo $row['name']; ?>"</iframe>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $row['name']; ?></a>
                    <p><?php echo $row['description']; ?></p>
                  </h4>
                </div>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
    </div>


</body>
</html>