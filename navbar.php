<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse " id="mynavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">About</a>
        </li>
        <div class="dropdown">
  <button type="button" class="btn btn-primary" data-bs-toggle="dropdown">
    Book categories
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Life style</a></li>
    <li><a class="dropdown-item" href="#">Art</a></li>
    <li><a class="dropdown-item" href="#">Academic and Education</a></li>
    <li><a class="dropdown-item" href="#">Biography</a></li>
    <li><a class="dropdown-item" href="#">Technology</a></li>
    <li><a class="dropdown-item" href="#">History</a></li>
</div>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">New release</a>
        </li>
      </ul>
  
      <form class="d-flex">
        <input class="form-control " type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
      <li class="nav-item active">
                            <a class="nav-link" href="login.php">Login / Register</a>
                        </li>
    </div>
  </div>
</nav>
</body>

</html>