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
        $this->simplifyFraction($this->numerator,$this->denominator);
    }

    public function getFractionValue(): string
    {
        if ($this->denominator === 1 || $this->numerator === 0) {
            return $this->numerator;
        }

        return $this->numerator . "/" . $this->denominator;
    }

    private function simplifyFraction(int $numerator, int $denominator): void
    {
        $this->numerator = $this->getSimplifiedNumerator($numerator, $denominator);
        $this->denominator = $this->getSimplifiedDenominator($numerator, $denominator);
    }

    public function getSimplifiedNumerator(int $numerator, int $denominator): int
    {
        return $numerator / $this->greatestCommonDivisor($numerator, $denominator);
    }

    public function getSimplifiedDenominator(int $numerator, int $denominator): int
    {
        return $denominator / $this->greatestCommonDivisor($numerator, $denominator);
    }

    public function getNumerator(): int
    {
        return $this->numerator;
    }

    public function getDenominator(): int
    {
        return $this->denominator;
    }

    private function greatestCommonDivisor(int $numerator, int $denominator): int
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
