<?php

namespace App;

readonly class Fraction
{
    public function __construct(private int $numerator, private ?int $denominator = null)
    {
        if ($this->denominator === 0){
            throw new \Exception();
        }
    }

    public function getValue() : string
    {
        if($this->denominator){
            if($this->denominator<0){
                return -$this->numerator."/".$this->denominator*-1;
            }
            if (is_int($this->numerator/$this->denominator)){
                return $this->numerator/$this->denominator;
            }
            if (is_int($this->denominator/$this->numerator)){
                return $this->numerator/$this->numerator . "/" . $this->denominator/$this->numerator;
            }
            return $this->numerator."/".$this->denominator;
        }
        return $this->numerator;
    }
}
