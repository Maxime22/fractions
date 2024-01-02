<?php

use App\Fraction;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
//    private Fraction $sut;


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
        self::assertSame($number, $result);
    }

    public static function integerNumberPositiveProvider(): array
    {
        return array_map(fn($number) => [$number], range(1, 3));
    }
}
