<?php

/**
 * Created by PhpStorm.
 * User: grand
 * Date: 16.4.5
 * Time: 17.30
 */

class BooksRepository
{
    protected $book;
    protected $books = [];
    
    public function getById($id)
    {
        require ('connectToDb.php');
        require ('Book.php');

        $query = "SELECT Books.bookId,Genre.title as genre,Books.title,year,group_concat(name) as authors 
		FROM Authors_Books 
		LEFT JOIN Books ON Authors_Books.bookId=Books.bookId 
		LEFT JOIN Authors ON Authors_Books.authorId=Authors.authorId 
		LEFT JOIN Genre ON Books.genreId=Genre.genreId
		WHERE Books.title IS NOT NULL AND Books.bookId=". $id . " group by title";
        
        $book = $conn->query($query);

        $row = mysqli_fetch_assoc($book);

        $this->book = new Book();

        $this->book->setGenre($row['genre']);
        $this->book->setAuthors($row['authors']);
        $this->book->setTitle($row['title']);
        $this->book->setYear($row['year']);

        return $this->book;
    }
    
    public function getAll()
    {
        require ('connectToDb.php');

        $query = "SELECT title, Books.bookId FROM Authors_Books 
        LEFT JOIN Books on Books.bookId=Authors_Books.bookId WHERE title is NOT NULL group by title";

        $books = $conn->query($query);

        foreach ($books as $book)
        {
            $one = new Book();
            $one->setTitle($book['title']);
            $one->setBookId($book['bookId']);
            array_push($this->books,$one);
        }

        return $this->books;
    }
}