<?php
// Step 1: Connect to the database
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$dbname = "authors";

$conn = mysqli_connect('localhost', 'root', '', 'bookhub');

// Step 2: Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 3: Insert data into the "authors" table
if (isset($_POST['addauthor'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];

    $sql = "INSERT INTO authors (name, email, bio) VALUES ('$name', '$email', '$bio')";

    if (mysqli_query($conn, $sql)) {
        echo "New author record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Step 4: Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <input type="text" placeholder="Author name" id="name" name="name">
    <input type="email" placeholder="Autor Email "  id="email" name="email">
    <textarea name="bio" id="bio" ></textarea> 
  </form>
  
</body>
</html>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Author</title>
    <style>

</style>
</head>
<body>


</body>
</html>



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

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 50px;
  background-color: #fff;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
  width:500px;
  margin-left:30%;
  height:400px;
  border-radius: 7px;
}
p{
    font-weight: bold;
    font-size: 20px;  
}

label {
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="text"],
input[type="email"],
textarea {
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 4px;
  width: 50%;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

    </style>
</head>
<body>
   
    <div class="wrapper">
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
             
        </div>
        <div class="sidebar">
            <div class="profile">
                <img src="https://1.bp.blogspot.com/-vhmWFWO2r8U/YLjr2A57toI/AAAAAAAACO4/0GBonlEZPmAiQW4uvkCTm5LvlJVd_-l_wCNcBGAsYHQ/s16000/team-1-2.jpg" alt="profile_picture">
         <?php include('nav.php');?>
    <div class="form">
    <form method="POST" action="add-author.php"> 
    <p>Add Author</p>
  <label for="name">Author Name:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Author Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="bio">Author Bio:</label>
  <textarea id="bio" name="bio"></textarea>

  <input type="submit" name="addauthor">
</form>

    </div>
  <script>
       var hamburger = document.querySelector(".hamburger");
	hamburger.addEventListener("click", function(){
		document.querySelector("body").classList.toggle("active");
	})
  </script>
</body>
</html>