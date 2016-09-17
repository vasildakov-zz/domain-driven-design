<?php

namespace Domain\ValueObject;

/**
 * ValueObjectInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface ValueObjectInterface
{
    /**
     * Returns TRUE if this object equals to another.
     *
     * @param  ValueObjectInterface $another
     * @return bool
     */
    public function equals(ValueObjectInterface $another) : bool;

    /**
     * Compare this object with another
     *
     * @param  ValueObjectInterface $another
     * @return bool
     */
    public function compareTo(ValueObjectInterface $another);
}
