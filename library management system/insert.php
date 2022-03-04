<html>
<body bgcolor="Yellowgreen">
<form method="post" action="main.html">
<center>
<br>
<br>
<?php
include_once 'conn.php';
if(isset($_POST['submit']))
{
	 $bookid=$_POST['id'];
	 $title = $_POST['title'];
	$author=$_POST['author'];
	$publisher = $_POST['pub'];
	$price=$_POST['price'];
	$quantity = $_POST['qty'];
	
	 
	 $sql = "INSERT INTO books (bookid,title,author,publisher,price,quantity) 
		VALUES ('$bookid','$title','$author','$publisher','$price','$quantity')";

	 if (mysqli_query($conn, $sql)) {
		echo "<br>New Book added !<br>";
	 } 
	else
	 {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

?>
<br><br><input type="submit" value="Back to home page"name="submit">
</center>
</body>
</html>