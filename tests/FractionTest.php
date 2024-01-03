<?php

use App\Fraction;
use PHPUnit\Framework\TestCase;

class FractionTest extends TestCase
{
    /** @test */
    public function fraction_returns_0_when_numerator_is_1(): void
    {
        // GIVEN
        $numerator = 0;
        $fraction = new Fraction($numerator, 4);

        // WHEN
        $result = $fraction->getFractionValue();

        // THEN
        self::assertSame('0', $result);
    }

    /**
     * @test
     * @dataProvider integerNumberPositiveProvider
     */
    public function fraction_returns_the_given_positive_number_when_denominator_is_1($number): void
    {
        // GIVEN
        $fraction = new Fraction($number, 1);

        // WHEN
        $result = $fraction->getFractionValue();

        // THEN
        self::assertSame((string)$number, $result);
    }

    public static function integerNumberPositiveProvider(): array
    {
        return array_map(fn($number) => [$number], range(0, 3));
    }

    /** @test */
    public function fraction_returns_the_fraction_value_with_the_fraction_slash_given_a_denominator_greater_than_1(
    ): void
    {
        // GIVEN
        $numerator = 3;
        $denominator = 4;
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getFractionValue();

        // THEN
        $expectedResult = "3/4";
        self::assertSame($expectedResult, $result);
    }

    /** @test */
    public function fraction_with_negative_numerator_and_positive_denominator_should_return_negative_fraction_result(
    ): void
    {
        // GIVEN
        $numerator = -3;
        $denominator = 4;
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getFractionValue();

        // THEN
        $expectedResult = "-3/4";
        self::assertSame($expectedResult, $result);
    }

    /** @test */
    public function fraction_with_positive_numerator_and_negative_denominator_should_return_negative_fraction_result(
    ): void
    {
        // GIVEN
        $numerator = 3;
        $denominator = -4;
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getFractionValue();

        // THEN
        $expectedResult = "-3/4";
        self::assertSame($expectedResult, $result);
    }

    /** @test */
    public function fraction_with_negative_numerator_and_negative_denominator_should_return_positive_fraction_result(
    ): void
    {
        // GIVEN
        $numerator = -3;
        $denominator = -4;
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getFractionValue();

        // THEN
        $expectedResult = "3/4";
        self::assertSame($expectedResult, $result);
    }

    /** @test */
    public function fraction_should_return_an_exception_when_denominator_is_0(): void
    {
        // THEN
        $this->expectException(\Exception::class);

        // GIVEN
        $anyNumber = 2;
        $zero = 0;

        // WHEN
        new Fraction($anyNumber, $zero);
    }

    /**
     * @test
     * @dataProvider fractionProvider
     */
    public function fraction_should_be_simplified_to_its_simplest_form_when_numerator_and_denominator_have_common_factors(
        int $numerator,
        int $denominator,
        string $expectedResult
    ): void {
        // GIVEN
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getFractionValue();

        // THEN
        self::assertSame($expectedResult, $result);
    }

    public static function fractionProvider(): array
    {
        return [
            [
                'numerator' => 2,
                'denominator' => 4,
                'expectedResult' => "1/2",
            ],
            [
                'numerator' => 2,
                'denominator' => 8,
                'expectedResult' => "1/4",
            ],
            [
                'numerator' => 6,
                'denominator' => 8,
                'expectedResult' => "3/4",
            ],
            [
                'numerator' => 8,
                'denominator' => 6,
                'expectedResult' => "4/3",
            ],
            [
                'numerator' => 8,
                'denominator' => -6,
                'expectedResult' => "-4/3",
            ],
            [
                'numerator' => -8,
                'denominator' => 6,
                'expectedResult' => "-4/3",
            ],
        ];
    }
}
