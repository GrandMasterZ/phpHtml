<?php
	function getOneBookData($id, $conn)
	{
		$query = "SELECT Books.bookId,Genre.title as genre,Books.title,year,group_concat(name) as authors 
		FROM Authors_Books 
		LEFT JOIN Books ON Authors_Books.bookId=Books.bookId 
		LEFT JOIN Authors ON Authors_Books.authorId=Authors.authorId 
		LEFT JOIN Genre ON Books.genreId=Genre.genreId
		WHERE Books.title IS NOT NULL AND Books.bookId=". $id . " group by title";
		$book = $conn->query($query);
		return $book;
	}
?>
