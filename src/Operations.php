<?php

namespace App;

class Operations
{
    public function add(Fraction $fractionA, Fraction $fractionB): string
    {
        $numeratorResult = ($fractionA->getNumerator() * $fractionB->getDenominator()) + ($fractionB->getNumerator() * $fractionA->getDenominator());
        $denominatorResult = $fractionA->getDenominator() * $fractionB->getDenominator();

        $simplifiedResult = new Fraction($numeratorResult, $denominatorResult);
        return $simplifiedResult->getFractionValue();
    }

    public function subtract(Fraction $fractionA, Fraction $fractionB): string
    {
        $numeratorResult = ($fractionA->getNumerator() * $fractionB->getDenominator()) - ($fractionB->getNumerator() * $fractionA->getDenominator());
        $denominatorResult = $fractionA->getDenominator() * $fractionB->getDenominator();

        $simplifiedResult = new Fraction($numeratorResult, $denominatorResult);
        return $simplifiedResult->getFractionValue();
    }

    public function multiply(Fraction $fractionA, Fraction $fractionB): string
    {
        $numeratorResult = $fractionA->getNumerator() * $fractionB->getNumerator();
        $denominatorResult = $fractionA->getDenominator() * $fractionB->getDenominator();

        $simplifiedResult = new Fraction($numeratorResult, $denominatorResult);
        return $simplifiedResult->getFractionValue();
    }

    public function divide(Fraction $fractionA, Fraction $fractionB): string
    {
        $numeratorResult = $fractionA->getNumerator() * $fractionB->getDenominator();
        $denominatorResult = $fractionA->getDenominator() * $fractionB->getNumerator();

        $simplifiedResult = new Fraction($numeratorResult, $denominatorResult);
        return $simplifiedResult->getFractionValue();
    }

}
