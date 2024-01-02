<?php

use App\Fraction;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{

    /**
     * @test
     * @dataProvider integerNumberPositiveProvider
     */
    public function fraction_returns_the_given_positive_number($number): void
    {
        // GIVEN
        $fraction = new Fraction($number);

        // WHEN
        $result = $fraction->getValue();

        // THEN
        self::assertEquals($number, $result);
    }

    public static function integerNumberPositiveProvider(): array
    {
        return array_map(fn($number) => [$number], range(1, 3));
    }

    /**
     * @test
     */
    public function fraction_with_a_numerator_and_a_denominator_should_return_both(): void
    {
        // GIVEN
        $numerator= 3;
        $denominator= 4;
        $fraction = new Fraction($numerator,$denominator);

        // WHEN
        $result = $fraction->getValue();

        // THEN
        $expectedResult = "3/4";
        self::assertSame($expectedResult, $result);
    }

    /**
     * @test
     */
    public function fraction_with_negative_numerator_and_positive_denominator_should_return_negative_result(): void
    {
        // GIVEN
        $numerator= -3;
        $denominator= 4;
        $fraction = new Fraction($numerator,$denominator);

        // WHEN
        $result = $fraction->getValue();

        // THEN
        $expectedResult = "-3/4";
        self::assertSame($expectedResult, $result);
    }

    /**
     * @test
     */
    public function fraction_with_positive_numerator_and_negative_denominator_should_return_negative_result(): void
    {
        // GIVEN
        $numerator= 3;
        $denominator= -4;
        $fraction = new Fraction($numerator,$denominator);

        // WHEN
        $result = $fraction->getValue();

        // THEN
        $expectedResult = "-3/4";
        self::assertSame($expectedResult, $result);
    }

    /**
     * @test
     */
    public function fraction_with_negative_numerator_and_negative_denominator_should_return_positive_result(): void
    {
        // GIVEN
        $numerator= -3;
        $denominator= -4;
        $fraction = new Fraction($numerator,$denominator);

        // WHEN
        $result = $fraction->getValue();

        // THEN
        $expectedResult = "3/4";
        self::assertSame($expectedResult, $result);
    }

}
