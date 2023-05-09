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
<link rel="icon" type="image/jpeg" href="./img/favicon.jpg">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <script>
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
    }
  </script>
</head>

<body>

  <section>

    <div class="container mt-5 my-section">
      <h3 class="py-4">Popular books</h3>
      <div class="msg"><?php echo $msg; ?></div>
      <div class="row">

        <?php

        // FETCH PRODUCTS
        $sql = "SELECT * from books";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="./img/books/<?php echo $row['cover']; ?>" alt="<?php echo $row['name']; ?>" title="<?php echo $row['name']; ?>"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $row['name']; ?></a>
                    <p><?php echo $row['wname']; ?></p>
                  </h4>
                  <a href="read.php?id=<?= $row['id']; ?>" class="btn btn-dark mt-2">Read More</a>
                </div>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      setTimeout(function() {
        $('#msg').slideUp("slow");
      }, 2000);
    });
  </script>
</body>

</html>
