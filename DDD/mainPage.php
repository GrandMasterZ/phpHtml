<?php require_once('connectToDb.php'); ?>
<html>
<head>
<title> Books list </title>
</head>
<body>

<?php
	require ('BooksRepository.php');
	require ('Book.php');

	$repository = new BooksRepository();
	$books = $repository->getAll();
	foreach ($books as $book)
	{
		echo "<a href=Details.php?id=" . $book->getBookId() . ">" . $book->getTitle() . "</a>";
		echo "<br/>";
	}
?>

</body>
</html>

