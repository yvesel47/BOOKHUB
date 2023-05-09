<?php
$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'bookhub');
$sql = "DELETE FROM `images` WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);
if($result)
{
    header("location: add-bo.php");
}

?>