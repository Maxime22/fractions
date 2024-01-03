<?php

use App\Fraction;
use App\Operations;
use PHPUnit\Framework\TestCase;

class OperationsTest extends TestCase
{
    /** @test */
    public function it_should_calculate_the_addition_of_two_fractions_given_an_identical_denominator(): void
    {
        // GIVEN
        $fractionA = new Fraction(1, 2);
        $fractionB = new Fraction(3, 2);
        $operations = new Operations();

        // WHEN
        $result = $operations->add($fractionA, $fractionB);

        // THEN
        self::assertSame('2', $result);
    }

    /** @test */
    public function it_should_calculate_the_addition_of_two_fractions_given_a_different_denominator(): void
    {
        // GIVEN
        $fractionA = new Fraction(1, 3);
        $fractionB = new Fraction(3, 4);
        $operations = new Operations();

        // WHEN
        $result = $operations->add($fractionA, $fractionB);

        // THEN
        self::assertSame('13/12', $result);
    }
}
