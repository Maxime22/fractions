<?php

namespace App;

class Operations
{
    public function add(Fraction $fractionA, Fraction $fractionB): string
    {
        $numeratorResult = ($fractionA->getNumerator() * $fractionB->getDenominator()) + ($fractionB->getNumerator(
                ) * $fractionA->getDenominator());
        $denominatorResult = $fractionA->getDenominator() * $fractionB->getDenominator();

        return $this->calculateResult($numeratorResult, $denominatorResult);
    }

    public function subtract(Fraction $fractionA, Fraction $fractionB): string
    {
        $numeratorResult = ($fractionA->getNumerator() * $fractionB->getDenominator()) - ($fractionB->getNumerator(
                ) * $fractionA->getDenominator());
        $denominatorResult = $fractionA->getDenominator() * $fractionB->getDenominator();

        return $this->calculateResult($numeratorResult, $denominatorResult);
    }

    public function multiply(Fraction $fractionA, Fraction $fractionB): string
    {
        $numeratorResult = $fractionA->getNumerator() * $fractionB->getNumerator();
        $denominatorResult = $fractionA->getDenominator() * $fractionB->getDenominator();

        return $this->calculateResult($numeratorResult, $denominatorResult);
    }

    public function divide(Fraction $fractionA, Fraction $fractionB): string
    {
        $numeratorResult = $fractionA->getNumerator() * $fractionB->getDenominator();
        $denominatorResult = $fractionA->getDenominator() * $fractionB->getNumerator();

        return $this->calculateResult($numeratorResult, $denominatorResult);
    }

    private function calculateResult(int $numeratorResult, int $denominatorResult): string
    {
        $simplifiedResult = new Fraction($numeratorResult, $denominatorResult);
        return $simplifiedResult->getFractionValue();
    }

}
