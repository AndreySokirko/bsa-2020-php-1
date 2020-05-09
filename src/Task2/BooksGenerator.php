<?php

declare(strict_types=1);

namespace App\Task2;
class BooksGenerator
{
public $minPagesNumber;
public $libraryBooks=[];
public $maxPrice;
public $storeBooks=[];
public $filteredBooks =[];

    /**
     * BooksGenerator constructor.
     * @param $minPagesNumber
     * @param $libraryBooks
     * @param $maxPrice
     * @param $storeBooks
     * @param $filteredBooks
     */
    public function __construct($minPagesNumber, $libraryBooks, $maxPrice, $storeBooks)
    {
        $this->minPagesNumber = $minPagesNumber;
        $this->libraryBooks = $libraryBooks;
        $this->maxPrice = $maxPrice;
        $this->storeBooks = $storeBooks;
//        $this->filteredBooks = $filteredBooks;
    }


    public function generate(): \Generator
    {
        //@todo
//        $filteredBooks = [];
//        $book = new Book("");
//        if ($book->getPrice()<= $this->maxPrice && $book->getPagesNumber()>= $this->minPagesNumber){
//            array_push($this->filteredBooks, ["title" => $book->title, "price" => $book->price, "pagesNumber" => $book->pagesNumber]);
//        }

        foreach ($this->libraryBooks as $libBook) {
            if ( $libBook->getPrice()<= $this->maxPrice && $libBook->getPagesNumber()>= $this->minPagesNumber) {
                $this->filteredBooks[] = new Book($libBook->title, $libBook->price,$libBook->pagesNumber);
            }
        }
        foreach ($this->storeBooks as $stBook) {
            if ($stBook->getPrice()<= $this->maxPrice && $stBook->getPagesNumber()>= $this->minPagesNumber) {
                //array_push($this->filteredBooks, ["title" => $stBook->title, "price" => $stBook->price, "pagesNumber" => $stBook->pagesNumber]);
                $this->filteredBooks[] = new Book($stBook->title, $stBook->price,$stBook->pagesNumber);
            }
        }
        foreach ($this->filteredBooks as $flBook) {
            yield $flBook;
        }
//        return $filteredBooks;
    }
}