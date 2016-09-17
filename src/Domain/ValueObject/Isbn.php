<?php

namespace Domain\ValueObject;

use Domain\ValueObject\Exception;

/**
 * Isbn
 *
 * The International Standard Book Number ISBN is
 * a unique numeric commercial book identifier.
 *
 * @example 978-3-16-148410-0
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class Isbn implements ValueObjectInterface
{
    /**
     * @var string|integer $value
     */
    private $value;


    /**
     * Constructor
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        if (!is_string($value) && !is_int($value)) {
            throw new Exception\InvalidArgumentException(
                '$value must be an string or integer'
            );
        }

        $value = (string) $value;
        $this->setValue($value);
    }

    /**
     * @param  ValueObjectInterface $other
     * @return bool
     */
    public function equals(ValueObjectInterface $other) : bool
    {
        return $this->compareTo($other) === 0;
    }


    /**
     * Compares this ISBN object to another.
     *
     * @param  ValueObjectInterface $other
     * @return bool
     */
    public function compareTo(ValueObjectInterface $other)
    {
        return (strcmp($this->value, $other->getValue()));
    }


    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }


    /**
     * Returns the ISBN value represented by this object.
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }


    /**
     * Creates an Isbn object from a string
     *
     * @param  string $value
     * @return static
     */
    public static function fromString($value)
    {
        return new static($value);
    }


    /**
     * Specify data which should be serialized to JSON
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * @link   http://php.net/manual/en/jsonserializable.jsonserialize.php
     */
    public function jsonSerialize()
    {
        return [
            'value' => $this->value
        ];
    }
}