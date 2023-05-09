<?php
// Establish a database connection
$host = "your_host";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = mysqli_connect('localhost', 'root', '', 'bookhub');

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

$num_rows = mysqli_num_rows($result);


$sql = "SELECT * FROM authors";
$result = mysqli_query($conn, $sql);

$num_row = mysqli_num_rows($result);


$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

$books = mysqli_num_rows($result);


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
	list-style: none;
	text-decoration: none;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Open Sans', sans-serif;
}

body{
	background: #f5f6fa;
}



body.active .wrapper .section{
	margin-left: 0;
	width: 100%;
}
.container-card {
  display: grid;
  grid-template-columns: repeat(4, 1fr); 
  gap: 30px;
}

.card {
  background-color: #fff  ;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
  text-align: center;
  height:120px;
  margin-top:10px;
  margin-left:8px;
  margin-right:8px;
}

.card h5 {
  font-size: 24px;
  margin-bottom: 10px;
  color:#4CAF50;
}

.card p {
  font-size: 30px;
  margin-top: 30px;
  font-weight: 10px;
}
#icon{
  color:greenyellow;
  font-size: 40px;
  font-weight: 200px;


}

    </style>
</head>
<body>
   <?php
   include('nav.php');
?>

    <div class="container-card">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Users</h5>
    <i class='bx bx-cart' id="icon"></i>
    <p class="card-text">
      <?php echo " " . $num_rows; ?>
    </p>
    
  </div>
</div>


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Authors</h5>
    <i class='bx bx-cart' id="icon"></i>
    <p class="card-text">
      <?php echo " " . $num_row; ?>
    </p> 
  </div>
</div>



<div class="card">
  <div class="card-body">
    <h5 class="card-title">Books</h5>
    <i class='bx bx-cart' id="icon"></i>
    <p class="card-text">
      <?php echo " " . $books; ?>
    </p> 
  </div>
</div>


</body>
</html>