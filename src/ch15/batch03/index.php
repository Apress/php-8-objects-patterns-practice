<?php
require_once("vendor/autoload.php");

use popp\library\LibraryCatalogue;
use popp\library\inventory\Book;

$catalogue = new LibraryCatalogue();
//$catalogue->addBook(new Ebook());
$catalogue->addBook(new Book());
