<?php

use App\Fraction;
use App\Operations;
use PHPUnit\Framework\TestCase;

class OperationsTest extends TestCase
{
    /**
     * @test
     * @dataProvider fractionsWithSameDenominatorForAdditionProvider
     */
    public function it_should_calculate_the_addition_of_two_fractions_given_an_identical_denominator($numeratorA, $numeratorB, $denominator, $expectedResult): void
    {
        // GIVEN
        $fractionA = new Fraction($numeratorA, $denominator);
        $fractionB = new Fraction($numeratorB, $denominator);
        $operations = new Operations();

        // WHEN
        $result = $operations->add($fractionA, $fractionB);

        // THEN
        self::assertSame($expectedResult, $result);
    }

    public static function fractionsWithSameDenominatorForAdditionProvider(): array
    {
        return [
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominator' => 2,
                'expectedResult' => "2",
            ],
            [
                'numeratorA' => 4,
                'numeratorB' => 2,
                'denominator' => 1,
                'expectedResult' => "6",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 4,
                'denominator' => 2,
                'expectedResult' => "5/2",
            ],
            [
                'numeratorA' => -1,
                'numeratorB' => 3,
                'denominator' => 2,
                'expectedResult' => "1",
            ],
            [
                'numeratorA' => -1,
                'numeratorB' => -3,
                'denominator' => 2,
                'expectedResult' => "-2",
            ],
        ];
    }


    /**
     * @test
     * @dataProvider fractionsWithDifferentDenominatorForAdditionProvider
     */
    public function it_should_calculate_the_addition_of_two_fractions_given_a_different_denominator($numeratorA, $numeratorB, $denominatorA, $denominatorB, $expectedResult): void
    {
        // GIVEN
        $fractionA = new Fraction($numeratorA, $denominatorA);
        $fractionB = new Fraction($numeratorB, $denominatorB);
        $operations = new Operations();

        // WHEN
        $result = $operations->add($fractionA, $fractionB);

        // THEN
        self::assertSame($expectedResult, $result);
    }

    public static function fractionsWithDifferentDenominatorForAdditionProvider(): array
    {
        return [
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominatorA' => 3,
                'denominatorB' => 4,
                'expectedResult' => "13/12",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominatorA' => 1,
                'denominatorB' => 4,
                'expectedResult' => "7/4",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 2,
                'denominatorA' => 2,
                'denominatorB' => -3,
                'expectedResult' => "-1/6",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => -2,
                'denominatorA' => 2,
                'denominatorB' => 3,
                'expectedResult' => "-1/6",
            ],
            [
                'numeratorA' => 0,
                'numeratorB' => 3,
                'denominatorA' => 1,
                'denominatorB' => 2,
                'expectedResult' => "3/2",
            ],
        ];
    }

    /**
     * @test
     * @dataProvider fractionsWithDifferentDenominatorForSubtractionProvider
     */
    public function it_should_calculate_the_subtraction_of_two_fractions($numeratorA, $numeratorB, $denominatorA, $denominatorB, $expectedResult): void
    {
        // GIVEN
        $fractionA = new Fraction($numeratorA, $denominatorA);
        $fractionB = new Fraction($numeratorB, $denominatorB);
        $operations = new Operations();

        // WHEN
        $result = $operations->subtract($fractionA, $fractionB);

        // THEN
        self::assertSame($expectedResult, $result);
    }

    public static function fractionsWithDifferentDenominatorForSubtractionProvider(): array
    {
        return [
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "-1",
            ],
            [
                'numeratorA' => 4,
                'numeratorB' => 2,
                'denominatorA' => 1,
                'denominatorB' => 1,
                'expectedResult' => "2",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 4,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "-3/2",
            ],
            [
                'numeratorA' => -1,
                'numeratorB' => 3,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "-2",
            ],
            [
                'numeratorA' => -1,
                'numeratorB' => -3,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "1",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominatorA' => 3,
                'denominatorB' => 4,
                'expectedResult' => "-5/12",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominatorA' => 1,
                'denominatorB' => 4,
                'expectedResult' => "1/4",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 2,
                'denominatorA' => 2,
                'denominatorB' => -3,
                'expectedResult' => "7/6",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => -2,
                'denominatorA' => 2,
                'denominatorB' => 3,
                'expectedResult' => "7/6",
            ],
            [
                'numeratorA' => 0,
                'numeratorB' => 3,
                'denominatorA' => 1,
                'denominatorB' => 2,
                'expectedResult' => "-3/2",
            ],
        ];
    }

    /**
     * @test
     * @dataProvider fractionsWithDifferentDenominatorForMultiplicationProvider
     */
    public function it_should_calculate_the_multiplication_of_two_fractions($numeratorA, $numeratorB, $denominatorA, $denominatorB, $expectedResult): void
    {
        // GIVEN
        $fractionA = new Fraction($numeratorA, $denominatorA);
        $fractionB = new Fraction($numeratorB, $denominatorB);
        $operations = new Operations();

        // WHEN
        $result = $operations->multiply($fractionA, $fractionB);

        // THEN
        self::assertSame($expectedResult, $result);
    }

    public static function fractionsWithDifferentDenominatorForMultiplicationProvider(): array
    {
        return [
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "3/4",
            ],
            [
                'numeratorA' => 4,
                'numeratorB' => 2,
                'denominatorA' => 1,
                'denominatorB' => 1,
                'expectedResult' => "8",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 4,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "1",
            ],
            [
                'numeratorA' => -1,
                'numeratorB' => 3,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "-3/4",
            ],
            [
                'numeratorA' => -1,
                'numeratorB' => -3,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "3/4",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominatorA' => 3,
                'denominatorB' => 4,
                'expectedResult' => "1/4",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominatorA' => 1,
                'denominatorB' => 4,
                'expectedResult' => "3/4",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 2,
                'denominatorA' => 2,
                'denominatorB' => -3,
                'expectedResult' => "-1/3",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => -2,
                'denominatorA' => 2,
                'denominatorB' => 3,
                'expectedResult' => "-1/3",
            ],
            [
                'numeratorA' => 0,
                'numeratorB' => 3,
                'denominatorA' => 1,
                'denominatorB' => 2,
                'expectedResult' => "0",
            ],
        ];
    }

    /**
     * @test
     * @dataProvider fractionsWithDifferentDenominatorForDivisionProvider
     */
    public function it_should_calculate_the_division_of_two_fractions($numeratorA, $numeratorB, $denominatorA, $denominatorB, $expectedResult): void
    {
        // GIVEN
        $fractionA = new Fraction($numeratorA, $denominatorA);
        $fractionB = new Fraction($numeratorB, $denominatorB);
        $operations = new Operations();

        // WHEN
        $result = $operations->divide($fractionA, $fractionB);

        // THEN
        self::assertSame($expectedResult, $result);
    }

    public static function fractionsWithDifferentDenominatorForDivisionProvider(): array
    {
        return [
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "1/3",
            ],
            [
                'numeratorA' => 4,
                'numeratorB' => 2,
                'denominatorA' => 1,
                'denominatorB' => 1,
                'expectedResult' => "2",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 4,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "1/4",
            ],
            [
                'numeratorA' => -1,
                'numeratorB' => 3,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "-1/3",
            ],
            [
                'numeratorA' => -1,
                'numeratorB' => -3,
                'denominatorA' => 2,
                'denominatorB' => 2,
                'expectedResult' => "1/3",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominatorA' => 3,
                'denominatorB' => 4,
                'expectedResult' => "4/9",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 3,
                'denominatorA' => 1,
                'denominatorB' => 4,
                'expectedResult' => "4/3",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => 2,
                'denominatorA' => 2,
                'denominatorB' => -3,
                'expectedResult' => "-3/4",
            ],
            [
                'numeratorA' => 1,
                'numeratorB' => -2,
                'denominatorA' => 2,
                'denominatorB' => 3,
                'expectedResult' => "-3/4",
            ],
            [
                'numeratorA' => 0,
                'numeratorB' => 3,
                'denominatorA' => 1,
                'denominatorB' => 2,
                'expectedResult' => "0",
            ],
        ];
    }
}
