<?php

namespace App;

class Fraction
{
    public function __construct(private int $numerator, private int $denominator = 1)
    {
        if ($this->denominator === 0) {
            throw new \Exception();
        }
        $this->numerator = $this->getSign() . abs($this->numerator);
        $this->denominator = abs($this->denominator);
    }

    public function getSimplifiedValue(): string
    {
        if (is_int($this->numerator / $this->denominator)) {
            return $this->numerator / $this->denominator;
        }
        $greatestCommonDivisor = $this->greatestCommonDivisor($this->numerator, $this->denominator);
        return ($this->numerator / $greatestCommonDivisor . "/" . $this->denominator / $greatestCommonDivisor);
    }

    private function greatestCommonDivisor($numerator, $denominator): int
    {
        while ($denominator != 0) {
            $temp = $denominator;
            $denominator = $numerator % $denominator;
            $numerator = $temp;
        }
        return abs($numerator);
    }

    private function getSign(): string
    {
        if ($this->numerator < 0 && $this->denominator > 0) {
            return "-";
        }
        if ($this->numerator < 0 && $this->denominator < 0) {
            return "";
        }
        if ($this->numerator > 0 && $this->denominator < 0) {
            return "-";
        }
        return "";
    }
}
