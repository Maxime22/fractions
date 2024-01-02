<?php

namespace App;

readonly class Fraction
{
    public function __construct(private int $numerator)
    {
    }

    public function getValue() : int
    {
        return $this->numerator;
    }
}
