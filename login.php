<?php include ('navbar.php');?>
<form method="POST" action="logme.php">
    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <button type="submit" name="login">Login</button>
    <p>Not a member? <a href="register.php">Register</a></p>
</form>
<?php include ('footer.php');