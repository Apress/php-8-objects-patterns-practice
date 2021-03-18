<?php

/* listing 15.19 */
// mylib/LibraryCatalogue.php

namespace popp\library;

use popp\library\inventory\Book;

class LibraryCatalogue
{
    private array $books = [];

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }
}
/* /listing 15.19 */
