<?php

namespace App;

readonly class Fraction
{
    public function __construct(private int $numerator, private ?int $denominator = null)
    {
    }

    public function getValue() : string
    {
        if($this->denominator){
            if($this->denominator<0){
                return -$this->numerator."/".$this->denominator*-1;
            }
            return $this->numerator."/".$this->denominator;
        }
        return $this->numerator;
    }
}
