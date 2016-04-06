<?php

/**
 * Created by PhpStorm.
 * User: grand
 * Date: 16.4.5
 * Time: 18.18
 */
class BooksList
{
    protected $list = [];

    public function loadList()
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
            array_push($this->list,$one);
        }

        return $this->list;
    }

    /**
     * @return array
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param array $list
     */
    public function setList($list)
    {
        $this->list = $list;
    }
}