<?php

/**
 * Created by PhpStorm.
 * User: grand
 * Date: 16.4.5
 * Time: 17.25
 */
class Book
{
    /**
     * @return mixed
     */
    protected $bookId;
    protected $title;
    protected $year;
    protected $genreId;
    protected $authors;

    public function load($id)
    {
        require ('connectToDb.php');
        
        $query = "SELECT Books.bookId,Genre.title as genre,Books.title,year,group_concat(name) as authors 
		FROM Authors_Books 
		LEFT JOIN Books ON Authors_Books.bookId=Books.bookId 
		LEFT JOIN Authors ON Authors_Books.authorId=Authors.authorId 
		LEFT JOIN Genre ON Books.genreId=Genre.genreId
		WHERE Books.title IS NOT NULL AND Books.bookId=". $id . " group by title";
        
        $book = $conn->query($query);
        $row = mysqli_fetch_assoc($book);

        $this->setBookId($row['bookId']);
        $this->setGenreId($row['genre']);
        $this->setTitle($row['title']);
        $this->setYear($row['year']);
        $this->setAuthors($row['authors']);

        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param mixed $authors
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;
    }
    
    public function getBookId()
    {
        return $this->bookId;
    }
    
    /**
     * @param mixed $bookId
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getGenreId()
    {
        return $this->genreId;
    }

    /**
     * @param mixed $genreId
     */
    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;
    }
}