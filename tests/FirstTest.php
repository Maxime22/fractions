<?php

use App\Fraction;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    private Fraction $sut;

    protected function setUp(): void
    {
        $this->sut = new Fraction();
    }

    /** @test */
    public function it_should_return_4_when_numerator_is_4()
    {
        // GIVEN
        $num = 4;

        // WHEN
        $result = $this->sut->getValue();

        // THEN
        self::assertSame($num, $result);
    }
}
