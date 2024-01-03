<?php

namespace App;

class Fraction
{
    /** @throws \Exception */
    public function __construct(private int $numerator, private int $denominator = 1)
    {
        if ($this->denominator === 0) {
            throw new \Exception('Denominator of a fraction cannot be 0');
        }

        $this->numerator = $this->getSign() * abs($this->numerator);
        $this->denominator = abs($this->denominator);
        $this->simplifyFraction($this->numerator, $this->denominator);
    }

    public function getFractionValue(): string
    {
        if ($this->denominator === 1) {
            return $this->numerator;
        }

        return $this->numerator . "/" . $this->denominator;
    }

    private function simplifyFraction(int $numerator, int $denominator): void
    {
        $greatestCommonDivisor = $this->greatestCommonDivisor($numerator, $denominator);
        $this->numerator = $numerator / $greatestCommonDivisor;
        $this->denominator = $denominator / $greatestCommonDivisor;
    }

    public function getNumerator(): int
    {
        return $this->numerator;
    }

    public function getDenominator(): int
    {
        return $this->denominator;
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

    private function getSign(): int
    {
        return $this->numerator * $this->denominator < 0 ? -1 : 1;
    }
}
