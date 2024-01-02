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
        $result = $fraction->getSimplifiedValue();

        // THEN
        self::assertEquals($number, $result);
    }

    public static function integerNumberPositiveProvider(): array
    {
        return array_map(fn($number) => [$number], range(0, 3));
    }

    /**
     * @test
     */
    public function fraction_with_a_numerator_and_a_denominator_should_return_both(): void
    {
        // GIVEN
        $numerator = 3;
        $denominator = 4;
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getSimplifiedValue();

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
        $numerator = -3;
        $denominator = 4;
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getSimplifiedValue();

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
        $numerator = 3;
        $denominator = -4;
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getSimplifiedValue();

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
        $numerator = -3;
        $denominator = -4;
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getSimplifiedValue();

        // THEN
        $expectedResult = "3/4";
        self::assertSame($expectedResult, $result);
    }

    /** @test */
    public function fraction_with_denominator_1_should_return_the_numerator_value(): void
    {
        // GIVEN
        $numerator = 2;
        $denominator = 1;
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getSimplifiedValue();

        // THEN
        $expectedResult = "2";
        self::assertSame($expectedResult, $result);
    }

    /** @test */
    public function fraction_should_return_an_exception_when_denominator_is_0(): void
    {
        $this->expectException(\Exception::class);

        // GIVEN
        $numerator = 2;
        $denominator = 0;
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getSimplifiedValue();
    }

    /** @test */
    public function fraction_should_return_2_given_numerator_4_and_denominator_2(): void
    {
        // GIVEN
        $numerator = 4;
        $denominator = 2;
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getSimplifiedValue();

        // THEN
        $expectedResult = "2";
        self::assertSame($expectedResult, $result);
    }

    /**
     * @test
     * @dataProvider fractionProvider
     */
    public function fraction_should_be_simplified_to_its_minimum_value($numerator, $denominator, $expectedResult): void
    {
        // GIVEN
        $fraction = new Fraction($numerator, $denominator);

        // WHEN
        $result = $fraction->getSimplifiedValue();

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
        ];
    }
}
