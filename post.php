<?php

// // session_start();

// // if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
// //     header('Location: adminlogin.php');
// //     exit;
// // }

// if(isset($_POST['logout'])) {
//     session_destroy();
//     header('Location: adminlogin.php');
// }


?>


<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/jpeg" href="./img/favicon.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    *{
        margin: 0;
    }
    .navbar {
      background-color: #333;
      overflow: hidden;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar-left {
      display: flex;
      align-items: center;
    }

    .navbar-left img {
      height: 30px;
      margin-right: 10px;
    }

    .navbar-left a {
      color: white;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .navbar-left a:hover {
      background-color: #4CAF50;
    }

    .navbar-right {
      display: flex;
      align-items: center;
    }

    .navbar-right a {
      color: white;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .navbar-right a:hover {
      background-color: #4CAF50;
    }

    .navbar-right img {
      height: 20px;
      margin-right: 10px;
    }

    .logout-button {
      background-color: #4CAF50;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 3px;
  cursor: pointer;
  margin-right: 10px;
    }

    .logout-button:hover {
      background-color: #3e8e41;
    }

 
    @media screen and (max-width: 600px) {
      .navbar-left, .navbar-right {
        flex-direction: column;
        align-items: flex-start;
      }

      .navbar-right {
        margin-top: 10px;
      }

      .navbar-left img {
        margin-right: 0;
        margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="navbar">
    <div class="navbar-left">
      <a href="admin.php">Admin Panel</a>
      <a href="orders.php">Orders</a>
      <a href="post.php">Add Product</a>
      <a href="update_post.php">Update Post</a>
      <a href="delete_post.php">Delete Post</a>
      <a href="product.php">Products</a>
      <a href="users.php">Users</a>
    </div>
    <div class="navbar-right">
      <form method="post">
        <input type="submit" name="logout" value="Logout" class="logout-button">
    </form>
    </div>
  </div>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
}

h1 {
  text-align: center;
  margin-top: 50px;
}

.addproduct {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  padding: 20px;
  width: 330px;
  margin: 0 auto;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type=text], input[type=varchar],input[type=tel],input[type=file] {
  width: 90%;
  padding: 10px;
  border-radius: 3px;
  border: 1px solid #ccc;
  margin-bottom: 20px;
}
.address{
  width: 90%;
  padding: 10px;
  border-radius: 3px;
  border: 1px solid #ccc;
  margin-bottom: 20px;
}

input[type=submit] {
  background-color: #4CAF50;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 3px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #3e8e41;
}

  
    </style>
    <link rel="icon" type="image/png" href="favicon.jpg">
</head>
<body>

    <h1>Add Product</h1>
   
    
    <?php
    
    $name = '';
    $email = '';
    $phone = '';
    $address = '';
    $id_image = '';
    
    
    $servername = "sql105.epizy.com";
    $username = "epiz_33894364";
    $password = "rXuJ9yvpPZyD6g";
    $dbname = "epiz_33894364_giveway";
    
    $conn = new mysqli('localhost','root', '', 'bookhub');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $rname = $_POST["rname"];
        $id_image = $_FILES["id_image"]["name"];
        $id_image_tmp = $_FILES["id_image"]["tmp_name"];
        $book = $_FILES["book"]["name"];
        $book_tmp = $_FILES["book"]["tmp_name"];

        
        $target_dir = "img/books/";
        $target_file = $target_dir . basename($id_image & $book);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        if (move_uploaded_file($id_image_tmp, $target_file)) {
            $sql = "INSERT INTO books (`name`, `rname`) VALUES ('$name', '$rname', '$id_image', '$book')";
            if ($conn->query($sql) === TRUE) {
              echo "<script>alert('Product added successfully')</script>";
              echo "<script type='text/javascript'> document.location = 'post.php'; </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your product image')</script>";
            echo "<script type='text/javascript'> document.location = 'post.php'; </script>";
        }
    }
    
    $conn->close();
    
    ?>
    
    <form class="addproduct" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <label for="name">Name of Book:</label>
        <input type="text" id="name" name="name" required="" value="<?php echo $name;?>"><br>
        <label for="email">Name of Writter</label>
        <input type="varchar" id="email" name="email" required="" value="<?php echo $rname;?>"><br>
        <label for="id_image">Cover Image:</label>
        <input type="file" id="id_image" name="id_image" required=""><br>
        <label for="id_image">PDF Book:</label>
        <input type="file" id="book" name="book" required=""><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>