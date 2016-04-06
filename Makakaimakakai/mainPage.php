<?php require_once('connectToDb.php'); ?>
<html>
<head>
<title> Books list </title>
</head>
<body>

<?php
	$query = "SELECT title, Books.bookId FROM Authors_Books LEFT JOIN Books on Books.bookId=Authors_Books.bookId WHERE title is NOT NULL group by title";
    if($books = $conn->query($query))
	{
		printf("Is viso yra %d knygos.\n", $books->num_rows);
	}
	echo "<br/>";
	foreach ($books as $book)
	{
		echo "<a href=showOne.php?id=" . $book['bookId'] . ">" . $book['title'] . "</a>";
		echo "<br/>";
	}
?>

</body>
</html>

