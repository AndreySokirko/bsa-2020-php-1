<?php

declare(strict_types=1);

namespace App\Task2;
class BooksGenerator
{
private $minPagesNumber;
private $libraryBooks=[];
private $maxPrice;
private $storeBooks=[];
private $filteredBooks =[];

    /**
     * BooksGenerator constructor.
     * @param $minPagesNumber
     * @param $libraryBooks
     * @param $maxPrice
     * @param $storeBooks
     * @param $filteredBooks
     */
    //Без цього конструктора  другий тест валиться  не добавляэ  быблыотеку книг
    public function __construct($minPagesNumber, $libraryBooks, $maxPrice, $storeBooks)
    {
        $this->minPagesNumber = $minPagesNumber;
        $this->libraryBooks = $libraryBooks;
        $this->maxPrice = $maxPrice;
        $this->storeBooks = $storeBooks;
    }


    public function generate(): \Generator
    {
        //@todo
        foreach ($this->libraryBooks as $libBook) {
            if ( $libBook->getPagesNumber()>= $this->minPagesNumber) {
                $this->filteredBooks[] = $libBook;
            }
        }
        foreach ($this->storeBooks as $stBook) {
            if ((int)$stBook->getPrice()<= (int)$this->maxPrice ) {
                $this->filteredBooks[] = $stBook;
            }
        }
        foreach ($this->filteredBooks as $flBook) {
            yield $flBook;
        }
    }
}