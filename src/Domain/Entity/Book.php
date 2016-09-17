<?php

namespace Domain\Entity;

use Ramsey\Uuid\Uuid;
use Domain\ValueObject\Isbn;

/**
 * Book
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Book extends AbstractEntity
{
    /**
     * @var Uuid $id
     */
    private $id;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var ValueObject\Isbn $isbn
     */
    private $isbn;

    /**
     * @var array $chapters
     */
    private $chapters;

    /**
     * Constructor
     *
     * @param string $id
     * @param string $title
     * @param Isbn $isbn
     */
    public function __construct(Uuid $id, String $title, Isbn $isbn)
    {
        $this->id    = $id;
        $this->title = $title;
        $this->isbn  = $isbn;
    }


    /**
     * @param Isbn $isbn
     */
    public function setIsbn(Isbn $isbn)
    {
        $this->isbn = $isbn;
        return $this;
    }
}
