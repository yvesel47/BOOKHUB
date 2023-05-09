<form action="add-boo.php" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Name of Book" name="bookname" id="bookname"><br>
    <input type="text" placeholder="Name of Book writter" name="wname" id="wname"><br>
    <label for="">Book as PDF</label><br>
    <input type="file" name="pdf" id="pdf"><br>
    <label for="">Book cover</label><br>
    <input type="file" name="cover" id="cover"><br>
    <button type="submit" name="addbook">Add Book</button><br>
</form>