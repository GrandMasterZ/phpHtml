<html>
<head>
<title> Books list </title>
</head>
<body>

<?php
	require ('BooksList.php');
	require ('Book.php');
	$books = new BooksList();
	$books->loadList();
	foreach ($books->getList() as $book)
	{
		echo "<a href=Details.php?id=" . $book->getBookId() . ">" . $book->getTitle() . "</a>";
		echo "<br/>";
	}
?>

</body>
</html>

