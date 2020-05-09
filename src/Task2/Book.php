<?php

declare(strict_types=1);

namespace App\Task2;
use App\Task2\BooksGenerator;
class Book
{
  public $title;
  public $price;
  public $pagesNumber;

    /**
     * Book constructor.
     * @param $title
     * @param $prise
     * @param $pagesNumber
     */
    public function __construct($title=null, $price , $pagesNumber = null)
    {
        $this->title = $title;
        $this->price = $price;
        $this->pagesNumber = $pagesNumber;
    }

    public function getTitle(): string
    {
        // @todo
            return $this->title;
    }

    public function getPrice(): int
    {
        // @todo
            return $this->price;
    }

    public function getPagesNumber(): int
    {
        //@todo
            return $this->pagesNumber;
    }
}