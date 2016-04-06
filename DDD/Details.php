<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 16.4.5
 * Time: 17.27
 */
require('BooksRepository.php');

$repository = new BooksRepository();
$book = $repository->getById($_GET['id']);

echo "Knygos pavadinimas: " . $book->getTitle() . "<br/>";
echo "Isleidimo metai: " . $book->getYear() . "<br/>";
echo "Knygos autorius/autoriai: " . $book->getAuthors() . "<br/>";
echo "Knygos zanras:" . $book->getGenre() . "<br/>";