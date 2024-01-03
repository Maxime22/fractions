<?php

namespace App;

class Operations
{
    public function add(Fraction $fractionA, Fraction $fractionB): string
    {

        $numeratorResult =  $fractionA->getNumerator() + $fractionB->getNumerator();
        $denominatorResult = $fractionA->getDenominator();

        $result = new Fraction($numeratorResult, $denominatorResult);
        return $result->getFractionValue();
    }
}
